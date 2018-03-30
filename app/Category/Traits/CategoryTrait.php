<?php

namespace App\Category\Traits;

use App\Category\Models\Category;
use Zilf\Facades\Request;

trait CategoryTrait
{
    public function test(){
        die('test_trait');
    }

    /**
     * 保存节点信息
     */
    public function ajax_save_add(){
        $category_id = Request::request()->getInt('pid');
        $category_name = Request::request()->get('name');
        $level = Request::request()->getInt('level');;

        if($category_id !== 0 && empty($category_id)){
            return $this->json(['status'=>2110,'message'=>'请选择分类!']);
        }
        if(empty($category_name)){
            return $this->json(['status'=>2110,'message'=>'分类名称不能为空!']);
        }

        /*$data = [
            'name'=>$category_name,
            'parent_id'=>$category_id,
            'level'=>$level+2,
        ];*/

        $category = new Category();
        $category->name = $category_name;
        $category->parent_id = $category_id;
        $category->level = $level+2;
        $is_success = $category->save();
        if($is_success){
            $insert_id = $category->attributes['id'];
            return $this->json(['status'=>1001,'message'=>'保存成功!','data'=>$insert_id]);
        }else{
            return $this->json(['status'=>2110,'message'=>'保存失败!']);
        }
    }



    /**
     * 更新节点信息
     */
    public function ajax_save_update(){
        $update_id = Request::request()->getInt('id');//I('post.id','','int');
        $category_name = Request::request()->get('name'); //I('post.name');

        if(empty($update_id)){
            return $this->json(['status'=>2001,'message'=>'请选择分类!']);
        }
        if(empty($category_name)){
            return $this->json(['status'=>2002,'message'=>'分类名称不能为空!']);
        }

        $category = Category::findOne($update_id);
        $category->name = $category_name;
        $is_success = $category->save();
        if($is_success){
            return $this->json(['status'=>1001,'message'=>'保存成功!']);
        }else{
            return $this->json(['status'=>2003,'message'=>'保存失败，请重试！!']);
        }
    }

    /**
     * 删除节点
     */
    public function ajax_delete(){
        $id = Request::request()->getInt('id');

        if(empty($id)){
            return $this->json(['status'=>2001,'message'=>'请选择分类!']);
        }

        $category = Category::findOne($id);
        $category->is_delete = 2;
        $is_success = $category->save();
        if($is_success){
            return $this->json(['status'=>1001,'message'=>'删除成功!']);
        }else{
            return $this->json(['status'=>2003,'message'=>'删除失败，请重试!']);
        }
    }
}