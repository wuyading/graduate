<?php
/**
 * Created by PhpStorm.
 * User: wuyading1993
 * Date: 2017/4/19
 * Time: 11:54
 */
namespace App\Http\Controllers;

use App\Models\Activity;

class ActivityController extends HttpBaseController
{
    /**
     * 活动剪影
     */
    public function index(){
        $data['info']  = Activity::find()->orderBy('sortid desc,id desc')->asArray()->one();
        return $this->render('activity',$data);
    }
}