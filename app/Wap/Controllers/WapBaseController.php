<?php

namespace App\Wap\Controllers;

use Zilf\Facades\MobileDetect;
use Zilf\Facades\Cache;
use Zilf\Facades\Request;
use Zilf\System\Controller as BaseController;

class WapBaseController extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->theme = 'wap';

        if(!MobileDetect::isMobile()){
            $this->redirect('/');
        }

    }

    public function getSignPackage() {
        $jsapiTicket = $this->getJsApiTicket();
        // 注意 URL 一定要动态获取，不能 hardcode.
        // $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        // $url = "$protocol$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $url = Request::getSchemeAndHttpHost().Request::getRequestUri();
        $timestamp = time();
        $nonceStr = $this->createNonceStr();

        // 这里参数的顺序要按照 key 值 ASCII 码升序排序
        $string = "jsapi_ticket=$jsapiTicket&noncestr=$nonceStr&timestamp=$timestamp&url=$url";

        $signature = sha1($string);

        $signPackage = array(
            "debug"     =>false,
            "appId"     => $this->config->get('wechat.AppID'),
            "nonceStr"  => $nonceStr,
            "timestamp" => $timestamp,
            "signature" => $signature,
            "jsApiList" =>[
                'onMenuShareAppMessage',
                'onMenuShareTimeline',
                'onMenuShareQQ',
                'onMenuShareQZone',
                'onMenuShareWeibo'
                ]
        );
        return json_encode($signPackage);
    }

    //获取微信access_token
    public function get_token(){
        $appid = $this->config->get('wechat.AppID');
        $secret = $this->config->get('wechat.Secret');

        $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$appid."&secret=".$secret;
        $access_token = json_decode(file_get_contents($url),true);
        $token = $access_token['access_token'];

        return $token;
    }
    //获取签名随机串
    private function createNonceStr($length = 16) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return $str;
    }

    //获取getJsApiTicket
    public function getJsApiTicket(){
        $ticket = Cache::get('ticket');
        if(!isset($ticket)){
            $token = $this->get_token();
            $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$token";
            $res = json_decode($this->httpGet($url),true);
            Cache::put('ticket',$res['ticket'],$res['expires_in']/60);
            $ticket = $res['ticket'];
        }
        return $ticket;
    }

    private function httpGet($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 500);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, $url);

        $res = curl_exec($curl);
        curl_close($curl);

        return $res;
    }
}