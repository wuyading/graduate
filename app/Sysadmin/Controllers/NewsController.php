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
use App\Models\News;
use Zilf\Facades\Request;
use Zilf\Facades\Validator;

class NewsController extends Controller
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
        $urlPattern = toRoute('news/index/(:num)');
        $data = News::getPageList('', $urlPattern, $currentPage,['select'=>'id,type,category_id,title,add_time,sortid']);
        foreach ($data['list'] as $key => $value){
            $cat = Category::find()->select('name')->where(['id'=>$value['category_id']])->asArray()->one();
            $data['list'][$key]['cateInfo'] = isset($cat['name']) ? $cat['name'] : '';
        }

        return $this->render('news/list', $data);
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
                'info' => News::findOne($id)->toArray(),
            ];
        }

        //获取分类信息
        $data['list'] = (new CategoryController())->get_category(2);
        return $this->render('news/add', $data);
    }

    /**
     * 保存提交的数据
     */
    public function ajax_save_data()
    {
        $data = Request::request()->all();
        $data['title'] = isset($data['title']) ? filter_var($data['title'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $data['content'] = isset($data['content']) ? filter_var($data['content'],FILTER_SANITIZE_SPECIAL_CHARS) : '';
        $data['add_time'] = time();
        $data['user_id'] = $this->userInfo['id'];
        $data['type'] = isset($data['type']) ? $data['type'] : 0;
        /**
         * @var $img UploadedFile 上传文件
         */
        $img = Request::files()->get('file');
        if($img){
            $upload_dir = '/upload/project';
            $file_name = md5(microtime()).'.'.$img->guessExtension();
            $img->move(ROOT_PATH.$upload_dir,$file_name);
            if($img->getError()){
                return $this->json_callback($img->getErrorMessage());
            }
            $data['logo'] = $upload_dir.'/'.$file_name;
        }

        $rules = [
            'id' => 'integer|min:1',
            'category_id' => 'required|integer|min:1',
            'title' => 'required',
            'content' => 'required',
            'user_id' => 'required',
            'type' => 'integer',
        ];
        $message = [
            'id.numeric' => '参数错误，非法操作',
            'category_id.required' => '请选择分类！',
            'category_id.numeric' => '请选择分类！',
            'category_id.min' => '请选择分类！',
            'type.numeric' => '参数错误！',
        ];

        $validation = Validator::make($data,$rules,$message);
        if(!$validation->failed()){

            if(isset($data['id']) && !empty($data['id']) ){ //修改内容
                $news = News::findOne($data['id']);
                if($news){
                    $news->setAttributes($data);
                    $is_success = $news->save();
                }else{
                    $is_success = false;
                }
            }else{ //添加内容
                $news_model = new News();
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
     * 删除动态资讯
     */
    public function ajax_delete_news()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }else{
            $where['id'] = ['eq',$id];
            $news = News::findOne($id);
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