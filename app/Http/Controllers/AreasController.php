<?php
/**
 * Created by PhpStorm.
 * User: wuyading1993
 * Date: 2017/4/19
 * Time: 11:54
 */
namespace App\Http\Controllers;


class AreasController extends HttpBaseController
{
    /**
     * 两地风貌
     */
    public function index(){
        return $this->render('areas');
    }
}