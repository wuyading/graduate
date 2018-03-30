<?php
/**账户信息控制器
 * Created by PhpStorm.
 * Author:Tmc
 * User: Administrator
 * Date: 2016/5/27
 * Time: 10:00
 */
namespace App\Login\Controller;


use App\Login\Controllers\Controller;

class ApiController extends Controller
{
    const LOGIN_DIRECTLY = 'directly';  //同域名直接登录
    const LOGIN_CROSSDOMAIN = 'cross_domain'; //跨域登录
    const LOGIN_JSONP = 'jsonp'; //jsonp跨域登录

//    const LOGIN_TYPE3 = 'jump';   //跳转登录

    ////////////////////////////////// 二级域名登录接口 start ///////////////////////////////////////////////////////////////////////////
    /**
     * 用户登录
     */
    public function login()
    {
        $type = I('login_type');
        $domain = I('domain', '', 'trim');
        $callback = I('callback', 'show_message', 'htmlspecialchars');

        if (in_array($type, array(self::LOGIN_DIRECTLY, self::LOGIN_CROSSDOMAIN, self::LOGIN_JSONP))) {
            if ($_SERVER['REQUEST_METHOD'] == "POST" || $_SERVER['REQUEST_METHOD'] == "GET") {//判断请求方式
                $refer = $_SERVER['HTTP_REFERER'];
                if (!empty($refer)) {
                    $parse_arr = parse_url($refer);
                    if(APP_DEBUG){  //测试环境不判断域名来源
                        $msg_arr = $this->userLogin();
                    }else{
                        if (isset($parse_arr['host']) && in_array($parse_arr['host'], C('LOGIN_SITE_URL'))) {
                            $msg_arr = $this->userLogin();
                        } else {
                            $msg_arr = messageFormat(3005, '非法请求！', 'array');
                        }
                    }
                } else {
                    $msg_arr = messageFormat(3004, '非法请求，不允许直接请求登录！', 'array');
                }
            } else {
                $msg_arr = messageFormat(3003, '请求方式错误，请用POST请求方式！', 'array');
            }
        } else {
            $msg_arr = messageFormat(3001, '参数错误！', 'array');
        }

        $this->showBackJsonMessage($type, $msg_arr, $callback, $domain);
    }

    public function login_out(){
        $token = I('token', '', 'trim');

        (new UserService())->clearLoginInfo($token);
        $msg = messageFormat(1001, '退出登录成功');

        $this->showBackJsonMessage(self::LOGIN_DIRECTLY, $msg, '', '');
    }

    /**
     * 判断是否已经登录
     */
    public function is_login()
    {
        $type = I('login_type');
        $back_url = I('back_url', '', 'trim');
        $callback = I('callback', 'show_message', 'htmlspecialchars');
        $domain = I('domain', '', 'trim');

        //验证是否已经登录
        if ($type == self::LOGIN_JSONP) {
            $info = $this->isLogin(false);
        } else {
            $info = $this->isLogin($back_url);
        }

        if (empty($info)) {
            $msg = messageFormat(2001, '你还没有登录！');
        } else {
            $msg = messageFormat(1001, '登录成功',base64_encode($info['userBaseId']));
        }

        $this->showBackJsonMessage($type, $msg, $callback, $domain);
    }

    /**
     * 获取用户的id信息
     */
    public function get_user_id()
    {
        $token = I('token', '', 'trim');
        if(empty($token)){
            $msg = messageFormat(2001, '你还没有登录！');
        }else{
            $info = $this->redis->get($token . '_userInfo');
            if (empty($info)) {
                $msg = messageFormat(2002, '你还没有登录！');
            } else {
                $msg = messageFormat(1001, '', $info['userBaseId']);
            }
        }

        $this->showBackJsonMessage(self::LOGIN_DIRECTLY, $msg, '', '');
    }

    /**
     * 验证用户登录数据，并写入登录cookie
     * @return array|string
     */
    private function userLogin()
    {
        $loginName = I('username', '', 'htmlspecialchars');
        $password = I('password', '', 'htmlspecialchars');
        $auto_login = I('auto_login', '', 'int');

        if (empty($loginName)) {
            $message = messageFormat(2001, '请输入用户名！', 'array');
        } else {
            if (empty($password)) {
                $message = messageFormat(2002, '请输入密码！', 'array');
            } else {
                $length = strlen($password);
                if ($length >= 6 && $length <= 20) {
                    //验证用户登录是否存在
                    $result = $this->curl_post(C('j_user_loginIn'), array('loginName' => $loginName, 'password' => $password));
                    if ($result['result']) {
                        //设置登录状态
                        $response_arr = (new UserService())->setLoginCookie($result['data'], $auto_login);

                        //返回登录的cookie信息
                        $msg = [
                            'status' => 1001,
                            'message' => $result['message'],
                            'data' => $response_arr
                        ];
                        $message = messageFormat(1001, $msg, 'array');
                    } else {
                        $message = messageFormat(2004, $result['message'], 'array');
                    }
                } else {
                    $message = messageFormat(2003, '密码不正确，必须是6-20位的字符！', 'array');
                }
            }
        }

        return $message;
    }

    /**
     * 输出格式化的字符串
     *
     * @param string $type
     * @param $data
     * @param string $callback
     * @param string $domain
     */
    private function showBackJsonMessage($type = '', $data, $callback = '', $domain = '')
    {
        $type = $type ? $type : self::LOGIN_DIRECTLY;
        if (is_array($data)) {
            $json_msg = json_encode($data);
        } else {
            $json_msg = $data;
        }

        if ($type == self::LOGIN_DIRECTLY) {
            //不支持跨域
            echo $json_msg;
        } elseif ($type == self::LOGIN_CROSSDOMAIN) {
            $domain = $domain ? $domain : ltrim(C('COOKIE_DOMAIN'), '.');
            if (preg_match('/[\w_]/', $callback)) {  //验证请求的callback参数，防止js注入
                echo $this->getScriptHtml($callback, $json_msg, $domain);
            } else {
                $msg = messageFormat(3006, '非法请求,callback参数非法，不允许！');
                echo $this->getScriptHtml($callback, $msg, $domain);
            }
        } elseif ($type == self::LOGIN_JSONP) {
            echo $callback . '(' . $json_msg . ')';
        } else {
            die('请求的方式不存在！');
        }
    }

    private function getScriptHtml($callback, $json_str, $domain)
    {
        return <<<EOT
<script type="text/javascript">
    document.domain = '{$domain}';
    parent.{$callback}($json_str);
</script>
EOT;
    }
    ////////////////////////////////// 二级域名登录接口 end ///////////////////////////////////////////////////////////////////////////
}