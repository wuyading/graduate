<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-4-6
 * Time: 下午5:50
 */

namespace App\Sysadmin\Controllers;

use App\Models\Slide;
use Zilf\Facades\Request;

class SlideController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    /**
     * 列表页
     */
    function index()
    {
        $currentPage = Request::query()->getInt('zget0');
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        $urlPattern = toRoute('slide/index/(:num)');
        $data = Slide::getPageList('', $urlPattern, $currentPage);

        return $this->render('slide/list', $data);
    }

    /**
     * 添加或修改 页面
     *
     * @return \Zilf\HttpFoundation\Response
     */
    function add()
    {
        $data = [];
        $id = Request::query()->getInt('zget0');
        if ($id) {
            $data = [
                'info' => Slide::findOne($id)->toArray(),
            ];
        }
        return $this->render('slide/add', $data);
    }

    /**
     * 保存提交的数据
     */
    public function ajax_save_data()
    {
        $data = Request::request()->all();
        /**
         * @var $img UploadedFile 上传文件
         */
        $img = Request::files()->get('file');
        if($img){
            $upload_dir = '/upload/slide';
            $file_name = md5(microtime()).'.'.$img->guessExtension();
            $img->move(ROOT_PATH.$upload_dir,$file_name);
            if($img->getError()){
                return $this->json_callback($img->getErrorMessage());
            }
            $data['img'] = $upload_dir.'/'.$file_name;
        }
            $data['title'] = '轮播图';
            $data['add_time'] = time();
            if(isset($data['id']) && !empty($data['id']) ){ //修改内容
                $slide = Slide::findOne($data['id']);
                if($slide){
                    $slide->setAttributes($data);
                    $is_success = $slide->save();
                }else{
                    $is_success = false;
                }
            }else{ //添加内容
                $slide_model = new Slide();
                $slide_model->setAttributes($data);
                $is_success = $slide_model->save();
            }

            if($is_success){
                $msg = ['status'=>1001,'msg'=>'保存成功！'];
            }else{
                $msg = ['status'=>3001,'msg'=>'保存失败！'];
            }

        return $this->json_callback($msg);
    }

    private function json_callback($data,$parent='parent',$method='show_message'){
        if(is_array($data)){
            $data = json_encode($data);
        }

        echo <<<EOT
        <script type="text/javascript">
            {$parent}.{$method}($data);
        </script>
EOT;
        die();
    }

    /**
     * 删除幻灯片
     */
    public function ajax_delete_slide()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }else{
            $where['id'] = ['eq',$id];
            $news = Slide::findOne($id);
            $is_success = $news->delete();
            if ($is_success) {
                $msg = ['status'=>1001,'msg'=>'删除成功！'];
            } else {
                $msg = ['status'=>1002,'msg'=>'删除失败！'];
            }
        }

        return $this->json($msg);
    }
}