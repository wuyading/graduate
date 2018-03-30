<?php

namespace App\Http\Controllers;

use App\Models\ApplyExpert;
use App\Models\ApplyProject;
use App\Models\News;
use App\Models\Project;
use App\Models\Activity;
use App\Models\Expert;
use App\Category\Models\Category;
use App\Models\Slide;
use Zilf\Facades\Validator;
use Zilf\HttpFoundation\File\UploadedFile;
use Zilf\HttpFoundation\Response;

use Zilf\Facades\Request;


/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-8-28
 * Time: 下午3:13
 */
class IndexController extends HttpBaseController
{
    public $name;

    /**
     * 首页
     */
    function index()
    {
        //轮播图片
        $banner = Slide::find()->select('img')->where(['type'=>1])->orderBy('id desc')->asArray()->all();
        //铜人行快讯
        $news1_hot = News::find()->select('id,title,logo,content,add_time,type')->where(['category_id' => 14, 'type' => 1])->orderBy('sortid desc,id desc')->asArray()->one();
        $news1 = News::find()->select('id,title,add_time')->where(['category_id' => 14])->orderBy('sortid desc,id desc')->asArray()->limit(5)->all();
        foreach ($news1 as $k => $new1) {
            if ($new1['id'] == $news1_hot['id']) {
                unset($news1[$k]);
            }
        }
        //铜仁动态
        $news2_hot = News::find()->select('id,title,logo,content,add_time,type')->where(['category_id' => 15, 'type' => 1])->orderBy('sortid desc,id desc')->asArray()->one();
        $news2 = News::find()->select('id,title,add_time')->where(['category_id' => 15])->orderBy('sortid desc,id desc')->asArray()->limit(5)->all();
        foreach ($news2 as $k => $new2) {
            if ($new2['id'] == $news2_hot['id']) {
                unset($news2[$k]);
            }
        }
        //苏州资讯
        $news3_hot = News::find()->select('id,title,logo,content,add_time,type')->where(['category_id' => 16, 'type' => 1])->orderBy('sortid desc,id desc')->asArray()->one();
        $news3 = News::find()->select('id,title,add_time')->where(['category_id' => 16])->orderBy('sortid desc,id desc')->asArray()->limit(5)->all();
        foreach ($news3 as $k => $new3) {
            if ($new3['id'] == $news3_hot['id']) {
                unset($news3[$k]);
            }
        }
        //专家风采
        $experts = Expert::find()->select('id,name,role,simple_intro,category_id,logo')->orderBy('sortid desc,id desc')->asArray()->limit(4)->all();
        foreach ($experts as $k => $expert) {
            $experts[$k]['category'] = Category::find()->select('name')->where(['id' => $expert['category_id']])->asArray()->one();
        }
        //对接项目
        $projects = Project::find()->select('id,title,summary,logo')->orderBy('sortid desc')->asArray()->limit(4)->all();
        //活动剪影
        $activitys = Activity::find()->select('id,title,images')->orderBy('sortid desc')->orderBy('add_time')->asArray()->one();
        $activitys['images'] = json_decode($activitys['images'], true);
        return $this->render('index', ['banner'=>$banner,'news1_hot' => $news1_hot, 'news1' => $news1, 'news2' => $news2, 'news2_hot' => $news2_hot, 'news3' => $news3, 'news3_hot' => $news3_hot, 'experts' => $experts, 'projects' => $projects, 'activitys' => $activitys]);
    }

    /**
     * 申请加入专家库
     *
     * @return Response
     */
    public function join_expert()
    {
        return $this->render('join_expert');
    }

    /**
     * 保存数据
     */
    public function ajax_save_expert()
    {
        $info = Request::request()->get('info');

        /**
         * @var $img UploadedFile 上传文件
         */
        $img = Request::files()->get('file');
        if($img){

            $md5_name = md5_file($img->getRealPath());
            $dir1 = $md5_name[0].$md5_name[1];
            $dir2 = $md5_name[2].$md5_name[3];
            $upload_dir = '/upload/project/'.$dir1.'/'.$dir2.'/';

            $mimeType =  $img->getMimeType();
            if(!in_array($mimeType,['image/jpeg','image/jpg','image/gif','image/png','image/gif'])){
                $msg = ['status' => 3001, 'msg' => '你上传的图片类型不支持'];
                cookie_helper('return_msg',json_encode($msg));
                return $this->redirect(toRoute('index/join_expert'));
            }

            $file_name = $md5_name.'.'.$img->guessExtension();
            $img->move(ROOT_PATH.$upload_dir,$file_name);

            if($img->getError()){
                $msg = ['status' => 3002, 'msg' => $img->getErrorMessage()];
                return $this->json($msg);
            }
            $info['logo'] = $upload_dir.'/'.$file_name;
        }


        $result = $this->check_params($info,1);

        if ($result['status'] == 1001) {

            $info['add_time'] = time();
            $info['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
            $info['ip'] = Request::getClientIp();

            $apply_expert = new ApplyExpert();
            $apply_expert->setAttributes($info);
            $is_success = $apply_expert->save();

            if ($is_success) {
                $msg = ['status' => 1001, 'msg' => '提交成功！'];
            } else {
                $msg = ['status' => 3001, 'msg' => '提交失败，请稍候再试！'];
            }
        } else {
            $msg = $result;
        }

        cookie_helper('return_msg',json_encode($msg));
        return $this->redirect(toRoute('index/join_expert'));
    }

    /**
     * 发布我的项目
     */
    public function my_project()
    {
        return $this->render('my_project');
    }

    /**
     * 保存信息
     */
    public function ajax_save_project()
    {
        $name = Request::request()->filter('proName', '', FILTER_SANITIZE_SPECIAL_CHARS);  //项目名称
        $contactName = Request::request()->filter('contactName', '', FILTER_SANITIZE_SPECIAL_CHARS);  //项目联系人
        $content = Request::request()->filter('proMsg', '', FILTER_SANITIZE_SPECIAL_CHARS);
        $mobile = Request::request()->filter('contactNumber', '', FILTER_SANITIZE_SPECIAL_CHARS);

        $data = [
            'name' => $name,
            'linkman' => $contactName,
            'mobile' => $mobile,
            'desc' => $content,

            'ip' => Request::getClientIp(),
            'user_agent' => Request::server()->get('HTTP_USER_AGENT'),
            'add_time' => time(),
        ];

        $result = $this->check_params($data,2);
        if ($result['status'] == 1001) {

            $apply_expert = new ApplyProject();
            $apply_expert->setAttributes($data);
            $is_success = $apply_expert->save();

            if ($is_success) {
                $msg = ['status' => 1001, 'msg' => '提交成功！'];
            } else {
                $msg = ['status' => 3001, 'msg' => '提交失败，请稍候再试！'];
            }
        } else {
            $msg = $result;
        }

        return $this->json($msg);
    }


    /**
     * 验证参数的输入
     *
     * @param $data
     * @return array
     */
    private function check_params($data, $type)
    {
        if ($type == 1) {  //加入专家库

            $rules = [
                'name' => 'required',
                'profession' => 'required',
                'mobile' => 'required',
                'west_experience' => 'required',
                'email' => 'email',
            ];
            $message = [
                'name.required' => '请填写姓名！',
                'profession.required' => '请填写你的从事专业！',
                'mobile.required' => '请填写手机号！',
                'west_experience.required' => '请填写帮扶西部地区的经历！',
                'email.email' => '请填写正确的邮箱',
            ];

        } elseif ($type == 2) {  //发布我的项目
            $rules = [
                'name' => 'required',
                'linkman' => 'required',
                'mobile' => 'required',
                'desc' => 'required',
            ];
            $message = [
                'name.required' => '请输入项目名称！',
                'linkman.required' => '请输入项目联系人！',
                'mobile.required' => '请输入项目联系方式！',
                'desc.required' => '请输入项目描述！',
            ];
        }

        $validation = Validator::make($data, $rules, $message);
        if (!$validation->failed()) {
            $msg = ['status' => 1001, 'msg' => 'success'];
        } else {
            $message = $validation->errors()->first();
            $msg = ['status' => 2001, 'msg' => $message];
        }

        return $msg;
    }


    /**
     *
     */
    private function memory()
    {
        $size = memory_get_usage();
        $unit = array('b', 'kb', 'mb', 'gb', 'tb', 'pb');
        echo @round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . ' ' . $unit[$i];
    }
}