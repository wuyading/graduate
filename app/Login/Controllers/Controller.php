<?php
/**
 * Created by PhpStorm.
 * User: lilei
 * Date: 16-11-4
 * Time: 上午10:56
 */

namespace App\Login\Controllers;


use Zilf\System\Controller as BaseController;

class Controller extends BaseController
{
    function __construct()
    {
        parent::__construct();
        $this->theme = 'login';
    }
}