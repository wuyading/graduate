<?php
/**
 * Created by PhpStorm.
 * User: wuyading1993
 * Date: 2017/4/19
 * Time: 11:54
 */
namespace App\Http\Controllers;

use App\Models\News;
use App\Category\Models\Category;
use Zilf\Facades\Request;


class NewsController extends HttpBaseController
{
    /**
     * 动态资讯
     */
    public function index(){
        $type = Request::query()->getAlnum('zget0');
        $type = $type ? hashids_decode($type) : 14;
        $keywords = Request::query()->filter('keywords','',FILTER_SANITIZE_SPECIAL_CHARS);
        $keywords = trim($keywords);
        if (empty($type)) {
            return $this->render('@errors/404');
        }
        if($keywords){
            $where = ['like','title',$keywords];
            $urlPattern = toRoute('/news/index/(:num)');
        }else{
            $where['category_id'] = $type;
            $urlPattern = toRoute('/news/index/'.hashids_encode($type).'/(:num)');
        }
        $currentPage = Request::query()->getInt('zget1');
        $currentPage = $currentPage > 0 ? $currentPage : 1;
        $data = News::getPageList($where, $urlPattern, $currentPage,['select'=>'id,title,logo,content','orderBy'=>'id desc']);
        $data['type'] = $type;
        $data['hot'] = News::find()->orderBy('id desc')->limit(6)->select('id,title')->asArray()->all();
        if($type){
            if($type == 14){
                //铜仁行快讯
                $data['seo'] = [
                    'title' => '【智缘桥苏州铜仁行快讯|最新资讯报道】——智缘桥',
                    'keywords' => '智缘桥苏州铜仁行快讯,最新动态报道,智缘桥新窗口',
                    'description' => '智缘桥苏州铜仁行快讯实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！'
                ];
            }elseif($type == 15){
                //铜仁动态
                $data['seo'] = [
                    'title' => '【智缘桥铜仁动态|最新资讯报道】——智缘桥',
                    'keywords' => '智缘桥苏州铜仁行快讯,最新动态报道,智缘桥新窗口',
                    'description' => '智缘桥苏州铜仁动态实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！'
                ];
            }else{
                //苏州动态
                $data['seo'] = [
                    'title' => '【智缘桥苏州铜仁动态|最新资讯报道】——智缘桥',
                    'keywords' => '智缘桥苏州铜仁行快讯,最新动态报道,智缘桥新窗口',
                    'description' => '智缘桥苏州铜仁资讯实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！'
                ];
            }
        }else{
            $data['seo'] = [
                'title' => '【智缘桥新闻资讯|最新动态报道】——智缘桥',
                'keywords' => '智缘桥新闻资讯,最新动态报道,智缘桥新窗口',
                'description' => '智缘桥动态资讯实时更新展示苏州铜仁行快讯和苏州帮扶铜仁动态，以及苏州铜仁友好交往的新事迹等。上智缘桥了解最新最全的苏州铜仁友好交往的信息！'
            ];
        }

        return $this->render('news',$data);
    }

    /*
     * 新闻详情
     */
    public function detail(){
        $id = Request::query()->getAlnum('zget0');
        $id = hashids_decode($id);
        if (empty($id)) {
            return $this->render('@errors/404');
        }

        $data['info'] = News::findOne($id)->toArray();
        $category = Category::find()->where(['id'=>$data['info']['category_id']])->select('name')->asArray()->one();
        $data['info']['category'] = $category['name'];
        //上一条内容
        $data['prev'] = News::find()->where(['and','id<'.$data['info']['id'],'category_id='.$data['info']['category_id']])->orderBy('id desc')->asArray()->one();
        //下一条内容
        $data['next'] = News::find()->where(['and','id>'.$data['info']['id'],'category_id='.$data['info']['category_id']])->orderBy('id asc')->asArray()->one();
        //最新资讯
        $data['hot'] = News::find()->orderBy('id desc')->limit(6)->select('id,title')->asArray()->all();
        $data['seo'] = [
            'title' => $data['info']['title'],
            'keywords' => $data['info']['title'],
            'description' => str_limit(strip_tags(htmlspecialchars_decode($data['info']['content'])),110)

        ];
        return $this->render('news_detail', $data);
    }
}