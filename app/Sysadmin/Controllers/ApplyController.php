<?php
namespace App\Sysadmin\Controllers;


use App\Models\Project;
use App\Models\Expert;
use App\Models\ApplyCooperate as Apply_cooperate;
use App\Models\ApplyExpert as Apply_expert;
use App\Models\ApplyProject as Apply_project;
use App\Models\ApplyTutor as Apply_tutor;
use Zilf\Facades\Request;

class ApplyController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    /**
     * 项目合作申请
     */
    public function cooperate(){
        $currentPage = Request::query()->getInt('zget0');
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        $urlPattern = toRoute('apply/cooperate/(:num)');
        $data = Apply_cooperate::getPageList('', $urlPattern, $currentPage,['select'=>'id,project_id,desc,name,phone,add_time']);
        //根据项目ID查询项目名称
        if($data){
            foreach($data['list'] as $key=>$project){
                $data['list'][$key]['project'] = Project::findOne($project['project_id'])->getAttribute('title');
            }
        }
        return $this->render('apply/cooperate',$data);
    }

    /**
     * 申请加入专家库
     */
    public function expert(){
        $currentPage = Request::query()->getInt('zget0');
        $currentPage = $currentPage >= 0 ? $currentPage : 1;
        $urlPattern = toRoute('apply/expert/(:num)');
        $data = Apply_expert::getPageList('', $urlPattern, $currentPage);
        return $this->render('apply/expert',$data);
    }

    //申请的专家详情
    public function detail()
    {
        $id = Request::query()->getInt('zget0');
        if ($id) {
            $info = Apply_expert::findOne($id)->toArray();
            if($info['use_way']){
                $info['use_way'] = str_replace('1',"技术咨询",$info['use_way']);
                $info['use_way'] = str_replace('2',"学术交流",$info['use_way']);
                $info['use_way'] = str_replace('3',"培训授课",$info['use_way']);
                $info['use_way'] = str_replace('4',"发展顾问",$info['use_way']);
                $info['use_way'] = str_replace('5',"特聘教授(教师、医生)",$info['use_way']);

            }
            $data['info'] = $info;
        }
        return $this->render('apply/detail',$data);
    }

    /**
     * 项目发布
     */
    public function project(){
        $currentPage = Request::query()->getInt('zget0');
        $currentPage = $currentPage >= 0 ? $currentPage : 1;
        $urlPattern = toRoute('apply/project/(:num)');
        $data = Apply_project::getPageList('', $urlPattern, $currentPage,['select'=>'id,name,linkman,mobile,desc,add_time']);
        return $this->render('apply/project',$data);
    }

    /**
     * 导师邀请
     */
    public function tutor(){
        $currentPage = Request::query()->getInt('zget0');
        $currentPage = $currentPage >= 0 ? $currentPage : 1;
        $urlPattern = toRoute('apply/tutor/(:num)');
        $data = Apply_tutor::getPageList('', $urlPattern, $currentPage,['select'=>'id,name,linkman,phone,desc,tutor_id,add_time']);
        //根据导师id获取导师信息
        if($data){
            foreach($data['list'] as $key=>$tutor){
                $data['list'][$key]['tutor'] = Expert::findOne($tutor['tutor_id'])->getAttribute('name');
            }
        }
        return $this->render('apply/tutor',$data);
    }

    /**
     * 删除项目申请
     */
    public function ajax_delete_cooperate()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }else{
            $where['id'] = ['eq',$id];
            $cooperate = Apply_cooperate::findOne($id);
            $is_success = $cooperate->delete();
            if ($is_success) {
                $msg = ['status'=>1001,'msg'=>'删除成功！'];
            } else {
                $msg = ['status'=>1002,'msg'=>'删除失败！'];
            }
        }

        return $this->json($msg);
    }

    /**
     * 删除专家库申请
     */
    public function ajax_delete_expert()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }else{
            $where['id'] = ['eq',$id];
            $expert = Apply_expert::findOne($id);
            $is_success = $expert->delete();
            if ($is_success) {
                $msg = ['status'=>1001,'msg'=>'删除成功！'];
            } else {
                $msg = ['status'=>1002,'msg'=>'删除失败！'];
            }
        }

        return $this->json($msg);
    }

    /**
     * 删除项目信息发布
     */
    public function ajax_delete_project()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }else{
            $where['id'] = ['eq',$id];
            $project = Apply_project::findOne($id);
            $is_success = $project->delete();
            if ($is_success) {
                $msg = ['status'=>1001,'msg'=>'删除成功！'];
            } else {
                $msg = ['status'=>1002,'msg'=>'删除失败！'];
            }
        }

        return $this->json($msg);
    }

    /**
     * 删除导师邀请
     */
    public function ajax_delete_tutor()
    {
        $id = Request::request()->get('id');

        if (empty($id)) {
            $msg = ['status'=>1002,'msg'=>'删除失败！'];
        }else{
            $where['id'] = ['eq',$id];
            $tutor = Apply_tutor::findOne($id);
            $is_success = $tutor->delete();
            if ($is_success) {
                $msg = ['status'=>1001,'msg'=>'删除成功！'];
            } else {
                $msg = ['status'=>1002,'msg'=>'删除失败！'];
            }
        }

        return $this->json($msg);
    }
}