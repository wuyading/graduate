<?php
/**
 * Created by PhpStorm.
 * User: wuyading1993
 * Date: 2017/4/19
 * Time: 11:54
 */
namespace App\Http\Controllers;

use App\Models\ApplyCooperate;
use App\Models\Project;
use App\Category\Models\Category;
use Zilf\Facades\Request;
use Zilf\Facades\Validator;

class ProjectController extends HttpBaseController
{
    /**
     * 对接项目
     */
    public function index(){
        $type = Request::query()->getAlnum('zget0');
        $type = $type ? hashids_decode($type) : 23;
        if (empty($type)) {
            return $this->render('@errors/404');
        }
        $keywords = Request::query()->filter('keywords','',FILTER_SANITIZE_SPECIAL_CHARS);
        $keywords = trim($keywords);

        $currentPage = Request::query()->getInt('zget1');
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        if($keywords){
            $where = ['like','title',$keywords];
            $urlPattern = toRoute('/project/index/(:num)');
        }else{
            $where['category_id'] = $type;
            $urlPattern = toRoute('/project/index/'.hashids_encode($type).'/(:num)');
        }
        $datas = Project::getPageList($where, $urlPattern, $currentPage,['select'=>'id,category_id,logo,title,summary,add_time','orderBy'=>'sortid desc,id desc']);

        foreach($datas['list'] as $key=>$data){
            $category = Category::find()->select('name')->where(['id'=>$data['category_id']])->asArray()->one();
            $datas['list'][$key]['category'] = $category['name']?$category['name']:'';
        }

        $datas['type'] = $type;
            if($type == 23){
                //金融财税
                $datas['seo'] = [
                    'title' => '【苏州铜仁对接金融财税项目介绍|项目对接咨询】——智缘桥',
                    'keywords' => '苏州铜仁金融财税项目对接,金融财税项目介绍,智缘桥新窗口',
                    'description' => '智缘桥展示了苏州在金融财税项目中帮持铜仁，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }elseif($type == 24){
                //大数据产业
                $datas['seo'] = [
                    'title' => '【苏州铜仁对接大数据产业项目介绍|项目对接咨询】——智缘桥',
                    'keywords' => '苏州铜仁大数据产业项目对接,大数据产业项目介绍,智缘桥新窗口',
                    'description' => '智缘桥展示了苏州在大数据产业项目中帮持铜仁，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }elseif($type == 25){
                //医疗卫生
                $datas['seo'] = [
                    'title' => '【苏州铜仁医疗卫生专家风采|人物介绍】——智缘桥',
                    'keywords' => '医疗卫生专家风采,医疗卫生专家介绍,智缘桥新窗口',
                    'description' => '智缘桥为您展示了苏州在医疗卫生方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];

            }elseif($type == 26){
                //建筑工程
                $datas['seo'] = [
                    'title' => '【苏州铜仁对接建筑工程项目介绍|项目对接咨询】——智缘桥',
                    'keywords' => '苏州铜仁建筑工程项目对接,建筑工程项目介绍,智缘桥新窗口',
                    'description' => '智缘桥展示了苏州在建筑工程项目中帮持铜仁，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }else{
                //旅游开发
                $datas['seo'] = [
                    'title' => '【苏州铜仁对接旅游开发项目介绍|项目对接咨询】——智缘桥',
                    'keywords' => '苏州铜仁旅游开发项目对接,旅游开发项目介绍,智缘桥新窗口',
                    'description' => '智缘桥展示了苏州在旅游开发项目中帮持铜仁，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }
        return $this->render('project',$datas);
    }

    /**
     * 详情页
     */
    public function detail()
    {
        $id = Request::query()->getAlnum('zget0');
        $id = hashids_decode($id);
        if (empty($id)) {
            return $this->render('@errors/404');
        }

        $data['info'] = Project::findOne($id)->toArray();

        return $this->render('project_detail', $data);
    }

    /**
     * 项目合作
     */
    public function invitation()
    {
        $project_id = Request::query()->getAlnum('zget0');
        if (empty($project_id)) {
            return $this->render('@errors/404');
        }
        $info = Project::findOne(hashids_decode($project_id))->toArray();
        return $this->render('project_invitation',['project_id'=>$project_id,'info'=>$info]);
    }

    /**
     * 保存数据
     */
    public function ajax_save()
    {
        $id = Request::request()->getAlnum('project_id');
        $contactName = Request::request()->filter('userName','',FILTER_SANITIZE_SPECIAL_CHARS);  //姓名
        $content = Request::request()->filter('ideas','',FILTER_SANITIZE_SPECIAL_CHARS);//合作思路
        $mobile = Request::request()->filter('contactNumber','',FILTER_SANITIZE_SPECIAL_CHARS);//联系方式

        $project_id = hashids_decode($id);
        $data = [
            'name' => $contactName,
            'phone' => $mobile,
            'desc' => $content,
            'project_id' => $project_id,

            'ip' => Request::getClientIp(),
            'user_agent' => Request::server()->get('HTTP_USER_AGENT'),
            'add_time' => time(),
        ];


        $result = $this->check_params($data);
        if($result['status'] == 1001){

            $apply_cooperate = new ApplyCooperate();
            $apply_cooperate->setAttributes($data);
            $is_success = $apply_cooperate->save();

            if($is_success){
                $msg = ['status'=>1001,'msg'=>'提交成功！'];
            }else{
                $msg = ['status'=>3001,'msg'=>'提交失败，请稍候再试！'];
            }
        }else{
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
    private function check_params($data){
        $rules = [
            'id' => 'integer|min:1',
            'project_id' => 'required|integer|min:1',
            'name' => 'required',
            'phone' => 'required',
            'desc' => 'required',
        ];
        $message = [
            'id.required' => '参数错误，非法操作！',
            'project_id.required' => '参数错误，非法操作！',
            'project_id.numeric' => '参数错误，非法操作！',
            'project_id.min' => '参数错误，非法操作！',
            'name.required' => '请输入姓名！',
            'phone.required' => '请输入联系方式！',
            'desc.required' => '请输入合作思路！',
        ];

        $validation = Validator::make($data,$rules,$message);
        if(!$validation->failed()){
            $msg = ['status'=>1001,'msg'=>'success'];
        }else{
            $message  = $validation->errors()->first();
            $msg = ['status'=>2001,'msg'=>$message];
        }

        return $msg;
    }

}