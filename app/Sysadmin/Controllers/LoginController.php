<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-27
 * Time: 下午7:07
 */

namespace App\Sysadmin\Controllers;

class LoginController extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    /**
     * 登录首页
     *
     * @return \Zilf\HttpFoundation\Response
     */
    public function index()
    {
        $login = new \App\Login\Controllers\LoginController();
        return $login->index();
    }

    /**
     * 用户登录
     */
    public function login_in(){
        $login = new \App\Login\Controllers\LoginController();
        return $login->login_in();
    }

    public function login_out(){
        $login = new \App\Login\Controllers\LoginController();
        $login->loginOut();
    }
}