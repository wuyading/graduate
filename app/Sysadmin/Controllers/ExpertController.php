<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-4-6
 * Time: 下午5:50
 */

namespace App\Sysadmin\Controllers;


use App\Category\Controllers\CategoryController;
use App\Category\Models\Category;
use App\Models\Expert;
use Zilf\HttpFoundation\File\UploadedFile;
use Zilf\Facades\Request;
use Zilf\Facades\Validator;

class ExpertController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    /**
     * 动态资讯列表页
     */
    function index()
    {
        $currentPage = Request::query()->getInt('zget0');
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        $urlPattern = toRoute('expert/index/(:num)');
        $data = Expert::getPageList('', $urlPattern, $currentPage);
        foreach ($data['list'] as $key => $value){
            $cat = Category::find()->select('name')->where(['id'=>$value['category_id']])->asArray()->one();
            $data['list'][$key]['cateInfo'] = isset($cat['name']) ? $cat['name'] : '';
        }
        return $this->render('expert/list', $data);
    }

    /**
     * 添加或修改 页面
     *
     * @return \Zilf\HttpFoundation\Response
     */
    function add()
    {
        $id = Request::query()->getInt('zget0');
        if ($id) {
            $data = [
                'info' => Expert::findOne($id)->toArray(),
            ];
        }

        //获取分类信息
        $data['list'] = (new CategoryController())->get_category(13);
        return $this->render('expert/add', $data);
    }

    /**
     * 保存提交的数据
     */
    public function ajax_save_data()
    {
        $data = Request::request()->all();
        $data['name'] = isset($data['name']) ? filter_var($data['name'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $data['role'] = isset($data['role']) ? filter_var($data['role'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $data['add_time'] = date('Y-m-d H:i:s',time());
        $data['user_id'] = $this->userInfo['id'];

        /**
         * @var $img UploadedFile 上传文件
         */
        $img = Request::files()->get('file');
        if($img){
            $upload_dir = '/upload/expert';
            $file_name = md5(microtime()).'.'.$img->guessExtension();
            $img->move(ROOT_PATH.$upload_dir,$file_name);
            if($img->getError()){
                return $this->json_callback($img->getErrorMessage());
            }
            $data['logo'] = $upload_dir.'/'.$file_name;
        }


        $rules = [
            'id' => 'integer|min:1',
            'name' => 'required',
            'role' => 'required',
            'category_id' => 'required|integer|min:1',
        ];
        $message = [
            'id.numeric' => '参数错误，非法操作',
            'name.required' => '请完善姓名！',
            'role.required' => '请完善职位！',
            'category_id.required' => '请选择分类！',
            'category_id.numeric' => '请选择分类！',
        ];

        $validation = Validator::make($data,$rules,$message);
        if(!$validation->failed()){

            if(isset($data['id']) && !empty($data['id']) ){ //修改内容
                $news = Expert::findOne($data['id']);
                if($news){
                    $news->setAttributes($data);
                    $is_success = $news->save();
                }else{
                    $is_success = false;
                }
            }else{ //添加内容
                $news_model = new Expert();
                $news_model->setAttributes($data);
                $is_success = $news_model->save();
            }

            if($is_success){
                $msg = ['status'=>1001,'msg'=>'保存成功！'];
            }else{
                $msg = ['status'=>3001,'msg'=>'保存失败！'];
            }
        }else{
            $message  = $validation->errors()->first();
            $msg = ['status'=>2001,'msg'=>$message];
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
     * 删除专家风采
     */
    public function ajax_delete_expert()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }else{
            $where['id'] = ['eq',$id];
            $expert = Expert::findOne($id);
            $is_success = $expert->delete();
            if ($is_success) {
                $msg = ['status'=>1001,'msg'=>'删除成功！'];
            } else {
                $msg = ['status'=>1002,'msg'=>'删除失败！'];
            }
        }
        return $this->json($msg);
    }
}