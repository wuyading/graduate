<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 17-4-7
 * Time: 下午7:47
 */

namespace App\Sysadmin\Controllers;


class MemberController extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }
}