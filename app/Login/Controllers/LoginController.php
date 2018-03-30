<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-27
 * Time: 下午7:07
 */

namespace App\Login\Controllers;

use App\Login\Models\Sysadmin;
use App\Login\Services\UserService;
use Zilf\Facades\Request;

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
        return $this->render('index');
    }

    /**
     * 用户登录
     */
    public function login_in()
    {
        $username = Request::request()->filter('username',FILTER_SANITIZE_SPECIAL_CHARS);
        $password = Request::request()->get('password');
        $back_url = Request::request()->get('back_url');

        if (empty($username)) {
        }

        if (empty($password)) {
        }

//        $hashing_pwd = password_make($password);
        $result = Sysadmin::find()->where(['username' => $username])->asArray()->one();
        if (!empty($result)) {
            if(password_check($password,$result['password'])){
                //设置登录状态
                (new UserService())->setLoginCookie($result,config_helper('cookie.cookie_expire'));
                $msg = array('code' => 1001, 'message' => '登录成功', 'data' => $result);
            }else{
                $msg = array('code' => 2001, 'message' => '登录失败');
            }
        } else {
            $msg = array('code' => 2001, 'message' => '登录失败');
        }

        if($back_url){
            $back_url = urldecode(base64_decode($back_url));
            $this->redirect($back_url);
        }else{
            $this->redirect('/sysadmin');
        }
    }

    /**
     * 退出登录
     */
    public function loginout()
    {
        (new UserService())->clearLoginInfo();
        $this->redirect(toRoute('login'));
    }

    /**
     * 判断用户是否已经登录
     *
     * 使用方法
     * 1/ isLogin()  如果没有登录则会跳转到登录页面并加上当前的url
     * 2/ isLogin($url) 会跳转到$url的网址
     * 3/ isLogin(false) 则不会跳转直接返回当前的用户信息，没有登录则返回空
     *
     * @param string $back_url
     * @return bool|mixed
     */
    public function checkUserIsLogin($back_url = '')
    {
        $info = (new UserService())->checkLoginToken();
        if (empty($info)) {
            if($back_url === false || $back_url == 'false'){
            }else{
                if ($back_url) {
                    if (stripos('?', $back_url) === false) {
                        $back_url = '?back_url=' . urlencode($back_url);
                    } else {
                        $back_url = '&back_url=' . urlencode($back_url);
                    }
                }else{
                    $back_url = '?back_url='.urlencode(current_url());
                }
                $this->redirect('/sysadmin/login'.$back_url);
            }
        }

        return json_decode($info,true);
    }
}