<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-4
 * Time: 上午10:56
 */

namespace App\Category\Controllers;


use App\Login\Controllers\LoginController;
use Zilf\System\Controller as BaseController;

class CatebaseController extends BaseController
{
    public $userInfo;

    function __construct()
    {
        parent::__construct();
        $this->theme = 'category';
    }

    function isLogin(){
        //判断是否已经登陆
        $login = new LoginController();
        $this->userInfo =  $login->checkUserIsLogin();
    }
}