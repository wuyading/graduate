<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-3-30
 * Time: 下午1:31
 */

namespace App\Category\Controllers;

use App\Category\Models\Category;

class CategoryController extends CatebaseController
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 分类首页
     */
    public function index(){
        //获取所有分类
        $category_arr = Category::find()
            ->select('id,parent_id as pId,name,level')
            ->where(['is_delete'=>1])
            ->asArray()
            ->all();
        foreach ($category_arr as $key=>$row){
            if($row['level'] <= 3){
                $category_arr[$key]['open'] = true;
            }
            unset($category_arr[$key]['pid']);
        }

        $data = [
            'category_json' => json_encode($category_arr)
        ];
        return $this->render('index/index',$data);
    }

    /**
     * 获取分类列表信息
     *
     * @param $id
     * @return array|bool|\Zilf\Db\ActiveRecord[]
     */
    public function get_category($id){
        $cat = $this->get_sub_category($id);
        if(empty($cat)){
            return false;
        }else{
            foreach($cat as $key => $value){
                $cat[$key]['children'] = $this->get_category($value['id']);
            }
        }
        return $cat;
    }

    /**
     * 获取分类节点的信息
     *
     * @param $id
     * @return array|\Zilf\Db\ActiveRecord[]
     */
    public function get_sub_category($id){
        return Category::find()->where(['parent_id'=>$id,'is_delete'=>1])->asArray()->all();
    }
}