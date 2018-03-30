<?php
namespace App\Sysadmin\Controllers;

use App\Models\Activity;
use Zilf\HttpFoundation\File\UploadedFile;
use Zilf\Facades\Request;
use Zilf\Facades\Validator;

class ActivityController extends Controller
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
        $urlPattern = toRoute('project/index/(:num)');
        $data = Activity::getPageList('', $urlPattern, $currentPage);
        return $this->render('activity/list', $data);
    }

    /**
     * 添加或修改 页面
     *
     * @return \Zilf\HttpFoundation\Response
     */
    function add()
    {
        $id = Request::query()->getInt('zget0');

        $data = [];
        if ($id) {
            $data['info'] =  Activity::findOne($id)->toArray();
        }
        return $this->render('activity/add', $data);
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

        //文件上传
        $img_arr = [];
        if(!empty($data['attach_path'])){
            foreach ($data['attach_path'] as $key => $val){
                $img_arr[] = [
                    'path'=> $val,
                    'title' => $data['attach_title'][$key],
                ];
            }
        }

        /**
         * @var $img UploadedFile 上传文件
         */
        $img = Request::files()->get('attach_file');
        if($img){
            foreach ($img as $k => $item){
                if($item){
                    $upload_dir = '/upload/activity';
                    //TODO 过滤重复的图片
                    $file_name = md5(microtime()).'.'.$item->guessExtension();
                    $item->move(ROOT_PATH.$upload_dir,$file_name);
                    if($item->getError()){
                        return $this->json_callback($item->getErrorMessage());
                    }
                    $img_arr[] = [
                        'path'=>$upload_dir.'/'.$file_name,
                        'title' => $data['attach_name'][$k],
                    ];
                }
            }
            $data['images'] = json_encode($img_arr);
        }

        $rules = [
            'id' => 'integer|min:1',
            'title' => 'required',
            'content' => 'required',
        ];
        $message = [
            'id.numeric' => '参数错误，非法操作',
            'title.required' => '请填写标题！',
            'content.required' => '请填写内容！',
        ];

        $validation = Validator::make($data,$rules,$message);
        if(!$validation->failed()){

            if(isset($data['id']) && !empty($data['id']) ){ //修改内容
                $news = Activity::findOne($data['id']);
                if($news){
                    $news->setAttributes($data);
                    $is_success = $news->save();
                }else{
                    $is_success = false;
                }
            }else{ //添加内容
                $news_model = new Activity();
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
     * 删除活动剪影
     */
    public function ajax_delete_activity()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }
        $where['id'] = ['eq',$id];
        $activity = Activity::findOne($id);
        $is_success = $activity->delete();
        if ($is_success) {
            $msg = ['status'=>1001,'msg'=>'删除成功！'];
        } else {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }
        return $this->json($msg);
    }
}