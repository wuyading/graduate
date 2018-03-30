<?php

namespace App\Wap\Controllers;

use App\Category\Controllers\CategoryController;
use App\Models\Activity;
use App\Models\ApplyExpert;
use App\Models\Expert;
use App\Models\News;
use App\Models\Slide;
use Zilf\Facades\Cache;
use Zilf\Facades\Request;
use Zilf\Facades\Validator;

/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-5-3
 * Time: 上午9:37
 */
class IndexController extends WapBaseController
{
    private $cache_time = 0.5;

    /**
     * 首页
     */
    public function index()
    {
        //获取资讯信息
        $data['news'] = $this->getNews([], 3);

        //专家风采
        $data['experts'] = $this->getExpert([], 3);

        //获取幻灯片信息
        $data['slide'] = Slide::find()->where(['type' => 2])->asArray()->all();

        return $this->render('index', $data);
    }


    /**
     * 申请加入专家库
     *
     * @return Response
     */
    public function join_expert()
    {
        $data['seo'] = [];
        return $this->render('join_expert',$data);
    }

    public function cache_del()
    {
        Cache::flush();
        die();
    }

    /**
     * 动态资讯
     */
    public function news()
    {
        $where = [];
        $type = Request::query()->getAlnum('zget0');
        $type = $type ? hashids_decode($type) : '';

        $keywords = Request::query()->filter('keywords', '', FILTER_SANITIZE_SPECIAL_CHARS);
        $keywords = trim($keywords);

        if ($type) {
            $where['category_id'] = $type;
            if ($type == 14) {
                //铜人行快讯
                $seo = [
                    'title' => "【智缘桥苏州铜仁行快讯|最新资讯报道】——智缘桥",
                    'keywords' => "智缘桥苏州铜仁行快讯,最新动态报道,智缘桥新窗口",
                    'description' => "智缘桥苏州铜仁行快讯实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！"
                ];
            } elseif ($type == 15) {
                //铜仁动态
                $seo = [
                    'title' => "【智缘桥铜仁动态|最新资讯报道】——智缘桥",
                    'keywords' => "智缘桥苏州铜仁行快讯,最新动态报道,智缘桥新窗口",
                    'description' => "智缘桥苏州铜仁动态实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！"
                ];

            } else {
                //苏州资讯
                $seo = [
                    'title' => "【智缘桥苏州铜仁动态|最新资讯报道】——智缘桥",
                    'keywords' => "智缘桥苏州铜仁行快讯,最新动态报道,智缘桥新窗口",
                    'description' => "智缘桥苏州铜仁资讯实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！"
                ];

            }
        } else {
            $seo = [
                'title' => "【智缘桥新闻资讯|最新动态报道】——智缘桥",
                'keywords' => "智缘桥新闻资讯,最新动态报道,智缘桥新窗口",
                'description' => "智缘桥动态资讯实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！"
            ];
        }

        if ($keywords) {
            $where = ['like', 'title', $keywords];
        }

        $data = $this->getNews($where);
        return $this->render('news', ['list' => $data, 'seo' => $seo]);
    }

    /**
     * @return String
     */
    public function ajax_get_news()
    {
        $data = $this->getNews($this->getWhere());
        return $this->json(['status' => 1001, 'msg' => 'success', 'data' => $data]);
    }

    /**
     * 两地风貌
     */
    public function areas()
    {
        return $this->render('areas');
    }

    /**
     * 专家风采
     */
    public function expert()
    {
        $type = Request::query()->getAlnum('zget0');
        $type = $type ? hashids_decode($type) : '';
        $data = $this->getExpert($this->getWhere('expert'));

        //获取专家分类
        $category = new CategoryController();
        $expert_category = $category->get_category(13);

        if ($type) {
            if ($type == 17) {
                //专家-金融财税
                $seo = [
                    'title' => "【苏州铜仁金融财税专家风采|人物介绍】——智缘桥",
                    'keywords' => "金融财税专家风采,金融财税专家介绍,智缘桥新窗口",
                    'description' => "智缘桥为您展示了苏州在金融财税方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。"
                ];
            } elseif ($type == 18) {
                //专家-大数据产业
                $seo = [
                    'title' => "【苏州铜仁大数据产业专家风采|人物介绍】——智缘桥",
                    'keywords' => "大数据产业专家风采,大数据产业专家介绍,智缘桥新窗口",
                    'description' => "智缘桥为您展示了苏州在大数据产业方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。"
                ];
            } elseif ($type == 19) {
                //专家-医疗卫生
                $seo = [
                    'title' => "【苏州铜仁医疗卫生专家风采|人物介绍】——智缘桥",
                    'keywords' => "医疗卫生专家风采,医疗卫生专家介绍,智缘桥新窗口",
                    'description' => "智缘桥为您展示了苏州在医疗卫生方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。"
                ];
            } elseif ($type == 20) {
                //专家-建筑工程
                $seo = [
                    'title' => "【苏州铜仁建筑工程专家风采|人物介绍】——智缘桥",
                    'keywords' => "建筑工程专家风采,建筑工程专家介绍,智缘桥新窗口",
                    'description' => "智缘桥为您展示了苏州在建筑工程方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。"
                ];
            } else {
                //专家-旅游开发
                $seo = [
                    'title' => "【苏州铜仁旅游开发专家风采|人物介绍】——智缘桥",
                    'keywords' => "旅游开发专家风采,旅游开发专家介绍,智缘桥新窗口",
                    'description' => "智缘桥为您展示了苏州在旅游开发方面的专家教授对于铜仁行的支持，有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。"
                ];
            }
        } else {
            //专家
            $seo = [
                'title' => "【苏州铜仁专家风采|人物介绍】——智缘桥",
                'keywords' => "苏州铜仁专家风采,任务介绍,智缘桥新窗口",
                'description' => "智缘桥全程跟踪报道百名教授专家铜仁行，苏州铜仁行有助于铜仁提升人才规模水平、促进科技成果转化、推进产转型升级、促进地方经济发展、促进两地文化交流发展。"
            ];
        }
        return $this->render('expert', ['list' => $data, 'seo' => $seo, 'type' => $type, 'expert_category' => $expert_category]);
    }

    /**
     * @return String
     */
    public function ajax_get_expert()
    {
        $data = $this->getExpert($this->getWhere('expert'));
        return $this->json(['status' => 1001, 'msg' => 'success', 'data' => $data]);
    }

    /**
     * 活动剪影
     */
    public function activity()
    {
        $where = [];
        $id = Request::query()->getInt('zget0');
        if (empty($id) || $id <= 0) {
        } else {
            $where['id'] = $id;
        }

        $data['info'] = Activity::find()->where($where)->orderBy('sortid desc,id desc')->asArray()->one();
        if ($data['info']) {
            $data['list'] = Activity::find()->where('id <' . $data['info']['id'])->limit(3)->orderBy('sortid desc,id desc')->asArray()->all();
        } else {
            return $this->render('@errors/wap_404');
        }

        return $this->render('activity', $data);
    }

    /**
     * 搜索
     */
    public function search()
    {
        return $this->render('search');
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


        $result = $this->check_params($info);

        if ($result['status'] == 1001) {

            $info['add_time'] = time();
            $info['user_agent'] = $_SERVER['HTTP_USER_AGENT'] ?? '';
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
     * 验证参数的输入
     *
     * @param $data
     * @return array
     */
    private function check_params($data)
    {
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
     * 获取搜索条件
     *
     * @param string $searchType
     * @return array
     */
    private function getWhere($searchType = 'news')
    {
        $where = [];
        $type = Request::query()->getAlnum('zget0');
        $type = $type ? hashids_decode($type) : '';

        $keywords = Request::query()->filter('keywords', '', FILTER_SANITIZE_SPECIAL_CHARS);
        $keywords = trim($keywords);

        if ($type) {
            $where['category_id'] = $type;
        }

        if ($keywords) {
            if ($searchType == 'news') {
                $where = ['like', 'title', $keywords];
            } else {
                $where = ['like', 'expert.name', $keywords];
            }
        }

        return $where;
    }

    /**
     * @param array $where
     * @param integer $itemsPerPage
     * @return array|mixed|\Zilf\Db\ActiveRecord[]
     */
    private function getNews($where = [], $itemsPerPage = 10)
    {
        $currentPage = Request::query()->getInt('p');
        $currentPage = $currentPage > 0 ? $currentPage : 1;

        $key = md5('news_list_' . json_encode($where) . $currentPage);
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = News::find()
                ->select('news.id,title,news.add_time,logo,category_id')
                ->innerJoinWith('category')
                ->where($where)
                ->offset(($currentPage - 1) * $itemsPerPage)
                ->limit($itemsPerPage)
                ->orderBy('news.sortid desc,news.id desc')
                ->asArray()
                ->all();
            foreach ($data as $key => $row) {
                $data[$key]['category_url'] = toRoute('index/news/' . hashids_encode($row['category_id']));
                $data[$key]['category_id'] = hashids_encode($row['category_id']);
                $data[$key]['detail_url'] = toRoute('detail/news/' . hashids_encode($row['id']));
                $data[$key]['id'] = hashids_encode($row['id']);
            }
            Cache::put($key, $data, $this->cache_time);
        }

        return $data;
    }

    /**
     * @param array $where
     * @param integer $itemsPerPage
     * @return array|mixed|\Zilf\Db\ActiveRecord[]
     */
    private function getExpert($where = [], $itemsPerPage = 10)
    {
        $currentPage = Request::query()->getInt('p');
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        $key = md5('expert_list_' . json_encode($where) . $currentPage);
        if (Cache::has($key)) {
            $data = Cache::get($key);
        } else {
            $data = Expert::find()
                ->select('expert.id,expert.name,logo,role,category_id')
                ->innerJoinWith('category')
                ->where($where)
                ->offset(($currentPage - 1) * $itemsPerPage)
                ->limit($itemsPerPage)
                ->orderBy('expert.sortid desc,expert.id desc')
                ->asArray()
                ->all();
            foreach ($data as $key => $row) {
                $data[$key]['category_url'] = toRoute('index/expert/' . hashids_encode($row['category_id']));
                $data[$key]['category_id'] = hashids_encode($row['category_id']);
                $data[$key]['detail_url'] = toRoute('detail/expert/' . hashids_encode($row['id']));
                $data[$key]['id'] = hashids_encode($row['id']);
            }
            Cache::put($key, $data, $this->cache_time);
        }

        return $data;
    }
}