<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-5-3
 * Time: 下午2:52
 */

namespace App\Wap\Controllers;


use App\Category\Models\Category;
use App\Models\Expert;
use App\Models\News;
use Zilf\Facades\Request;

class DetailController extends WapBaseController
{
    /**
     * 资讯详情页
     * @return \Zilf\HttpFoundation\Response
     */
    public function news(){
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
        $data['hot'] = News::find()->orderBy('id desc')->limit(2)->select('id,title,category_id,add_time,logo')->asArray()->all();
        foreach($data['hot'] as $key=>$hots){
            $category_name = Category::find()->where(['id'=>$hots['category_id']])->select('name')->asArray()->one();
            $data['hot'][$key]['category'] = $category_name['name'];
        }
        $data['seo'] = [
            'title' => $data['info']['title'],
            'keywords' => $data['info']['title'],
            'description' => str_limit(strip_tags(htmlspecialchars_decode($data['info']['content'])),110)

        ];

        return $this->render('news-detail', $data);
    }

    /**
     * 专家详情页
     * @return \Zilf\HttpFoundation\Response
     */
    public function expert(){
        $id = Request::query()->getAlnum('zget0');
        $id = hashids_decode($id);
        if (empty($id)) {
            return $this->render('@errors/404');
        }

        $data['info'] = Expert::findOne($id)->toArray();
        $category = Category::find()->where(['id'=>$data['info']['category_id']])->select('name')->asArray()->one();
        $data['info']['category'] = $category['name'];
        return $this->render('expert-detail', $data);
    }
}