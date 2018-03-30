<?php
namespace App\Sysadmin\Controllers;

use Zilf\Facades\Request;
use App\Login\Models\Sysadmin;


/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-4
 * Time: 上午10:53
 */
class IndexController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    function index(){
        return $this->render('index/index');
    }

    function edit_pwd(){
        $user = $this->userInfo;
        return $this->render('member/update_pwd',['userInfo'=>$user]);
    }

    /**
     * 修改管理员的账号，密码
     */
    function update_pwd(){
        $id = $this->userInfo['id'];
        $username = Request::request()->get('username');
        $password = Request::request()->get('pwd');
        $re_password = Request::request()->get('re_pwd');

        if(empty($username) || empty($password) || empty($re_password)){
            $msg = ['status'=>2001,'message'=>'请填写完整的参数！'];
        }elseif($password != $re_password){
            $msg = ['status'=>2002,'message'=>'请保持两次输入的密码是一致的！'];
        }else{
            $password = password_hash($password,PASSWORD_DEFAULT);
            $data['username'] = $username;
            $data['password'] = $password;
            $users = Sysadmin::findOne($id);
            $users->setAttributes($data);
            $re = $users->save();
            if($re){
                $msg = ['status'=>1001,'message'=>'保存成功！'];
            }else{
                $msg = ['status'=>1002,'message'=>'保存失败！'];
            }
        }
        return $this->json($msg);
    }
}