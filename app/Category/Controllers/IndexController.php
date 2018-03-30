<?php
namespace App\Category\Controllers;

/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-4
 * Time: 上午10:53
 */
class IndexController extends CatebaseController
{
    function __construct()
    {
        parent::__construct();
    }

    function index(){
        return $this->render('index/index');
    }
}