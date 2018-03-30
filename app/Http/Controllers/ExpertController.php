<?php
/**
 * Created by PhpStorm.
 * User: wuyading1993
 * Date: 2017/4/19
 * Time: 11:54
 */

namespace App\Http\Controllers;

use App\Category\Controllers\CategoryController;
use App\Models\ApplyTutor;
use App\Models\Expert;
use Zilf\Facades\Request;
use Zilf\Facades\Validator;

class ExpertController extends HttpBaseController
{
    /**
     * 专家风采
     */
    public function index()
    {
        //获取专家的分类
        $category = new CategoryController();
        $expert_category = $category->get_category(13);

        $type = Request::query()->get('zget0', 17);
        $type = hashids_decode($type) ? hashids_decode($type) : 17;

        $currentPage = Request::query()->getInt('zget1');
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        $key = Request::query()->filter('keywords','',FILTER_SANITIZE_SPECIAL_CHARS);
        $key = trim($key);

        if($key){
            $where['andwhere'] = ['or',['like','name',$key],['like','simple_intro',$key]];
            $urlPattern = toRoute('expert/index/(:num)');
        }else{
            $where['where'] = [
                'category_id' => $type ? $type : 1
            ];
            $urlPattern = toRoute('expert/index/' . $type . '/(:num)');
        }

        $where['orderBy'] = 'sortid desc,id desc';
        $data = Expert::getPageList('', $urlPattern, $currentPage, $where);

        if($data['list']){
            foreach ($data['list'] as $key => $row){
                $data['list'][$key]['expertType'] = $this->getExpertType($row['category_id'],$expert_category);
            }
        }

        $data['expert'] = $expert_category;
        $data['type'] = $type;
        $data['seo'] = $this->getSeo($type);

        return $this->render('expert', $data);
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

        $data['info'] = Expert::findOne($id)->toArray();
        return $this->render('expert_detail', $data);
    }

    /**
     * 专家邀请
     */
    public function invitation()
    {
        $expert_id = Request::query()->getAlnum('zget0');
        if (empty($expert_id)) {
            return $this->render('@errors/404');
        }

        //获取专家信息
        $info = Expert::findOne(hashids_decode($expert_id))->toArray();
        
        return $this->render('expert_invitation',['expert_id'=>$expert_id,'info'=>$info]);
    }

    /**
     * 专家邀请 保存数据
     */
    public function ajax_save()
    {
        $id = Request::request()->getAlnum('expert_id');
        $name = Request::request()->filter('proName','',FILTER_SANITIZE_SPECIAL_CHARS);  //项目名称
        $contactName = Request::request()->filter('contactName','',FILTER_SANITIZE_SPECIAL_CHARS);  //项目联系人
        $content = Request::request()->filter('proMsg','',FILTER_SANITIZE_SPECIAL_CHARS);
        $mobile = Request::request()->filter('contactNumber','',FILTER_SANITIZE_SPECIAL_CHARS);

        $expert_id = hashids_decode($id);
        $data = [
            'name' => $name,
            'linkman' => $contactName,
            'phone' => $mobile,
            'desc' => $content,
            'tutor_id' => $expert_id,

            'ip' => Request::getClientIp(),
            'user_agent' => Request::server()->get('HTTP_USER_AGENT'),
            'add_time' => time(),
        ];


        $result = $this->check_params($data);
        if($result['status'] == 1001){

            $apply_expert = new ApplyTutor();
            $apply_expert->setAttributes($data);
            $is_success = $apply_expert->save();

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

    private function getSeo($type=''){
        if($type){
            if($type == 17){
                //金融财税
                $data['seo'] = [
                    'title' => '【苏州铜仁金融财税专家风采|人物介绍】——智缘桥',
                    'keywords' => '金融财税专家风采,金融财税专家介绍,智缘桥新窗口',
                    'description' => '智缘桥为您展示了苏州在金融财税方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }elseif($type == 18){
                //大数据产业
                $data['seo'] = [
                    'title' => '【苏州铜仁大数据产业专家风采|人物介绍】——智缘桥',
                    'keywords' => '大数据产业专家风采,大数据产业专家介绍,智缘桥新窗口',
                    'description' => '智缘桥为您展示了苏州在大数据产业方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }elseif($type == 19){
                //医疗卫生
                $data['seo'] = [
                    'title' => '【苏州铜仁医疗卫生专家风采|人物介绍】——智缘桥',
                    'keywords' => '医疗卫生专家风采,医疗卫生专家介绍,智缘桥新窗口',
                    'description' => '智缘桥为您展示了苏州在医疗卫生方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];

            }elseif($type == 20){
                //建筑工程
                $data['seo'] = [
                    'title' => '【苏州铜仁建筑工程专家风采|人物介绍】——智缘桥',
                    'keywords' => '建筑工程专家风采,建筑工程专家介绍,智缘桥新窗口',
                    'description' => '智缘桥为您展示了苏州在建筑工程方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }else{
                //旅游开发
                $data['seo'] = [
                    'title' => '【苏州铜仁旅游开发专家风采|人物介绍】——智缘桥',
                    'keywords' => '旅游开发专家风采,旅游开发专家介绍,智缘桥新窗口',
                    'description' => '智缘桥为您展示了苏州在旅游开发方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
                ];
            }
        }else{
            //专家
            $data['seo'] = [
                'title' => '【苏州铜仁专家风采|人物介绍】——智缘桥',
                'keywords' => '苏州铜仁专家风采,任务介绍,智缘桥新窗口',
                'description' => '智缘桥全程跟踪报道百名教授专家铜仁行，苏州铜仁行有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。'
            ];
        }

        return $data['seo'];
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
            'tutor_id' => 'required|integer|min:1',

            'name' => 'required',
            'linkman' => 'required',
            'phone' => 'required',
            'desc' => 'required',
        ];
        $message = [
            'id.numeric' => '参数错误，非法操作',

            'tutor_id.required' => '参数错误，非法操作！',
            'tutor_id.numeric' => '参数错误，非法操作！',
            'tutor_id.min' => '参数错误，非法操作！',

            'name.required' => '请输入项目名称！',
            'linkman.required' => '请输入项目联系人！',
            'phone.required' => '请输入项目联系方式！',
            'desc.required' => '请输入项目描述！',
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

    private function getExpertType($category_id,$category){
        $name = '';
        foreach ($category as $row){
            if($row['id'] == $category_id){
                $name = $row['name'];
            }
        }

        return $name;
    }
}