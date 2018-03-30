<?php

namespace App\Sysadmin\Controllers;

use App\Category\Controllers\CategoryController;
use App\Category\Traits\CategoryTrait;

class CateController extends Controller
{
    use CategoryTrait;

    function __construct()
    {
        parent::__construct();
        $this->isLogin();
    }

    /**
     * 分类首页
     */
    public function index(){
        $category = new CategoryController();
        return $category->index();
    }
}