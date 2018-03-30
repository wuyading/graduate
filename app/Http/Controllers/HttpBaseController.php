<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-4
 * Time: 上午10:56
 */

namespace App\Http\Controllers;

use Zilf\Facades\MobileDetect;
use Zilf\System\Controller as BaseController;

class HttpBaseController extends BaseController
{
    function __construct()
    {
        parent::__construct();

        $this->theme = 'http';

        if(MobileDetect::isMobile()){
//            $this->redirect('/wap');
        }
    }

}