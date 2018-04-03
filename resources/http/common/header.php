<?php
use Zilf\System\Zilf;
?>
<header>
    <div class="header">
        <div class="header-info clearfix">
            <a class="header-log" href="">
                <img src="/web/base/images/logo.png">
            </a>
            <div class="header-search">
                <div class="search-nav">
                    <a class="<?=route_info('controller') == 'news' ? 'active' : ''?>" data-item="0">搜资讯</a>
                    <a class="<?=route_info('controller') == 'expert' ? 'active' : ''?>" data-item="1">搜专家</a>
                    <a class="<?=route_info('controller') == 'project' ? 'active' : ''?>" data-item="2">搜项目</a>
                </div>
                <div class="search-input">
                    <input type="text" placeholder="请输入关键词搜索"/>
                    <a class="btn-search">搜索</a>
                </div>
            </div>
        </div>
    </div>
    <div class="nav-bg">
        <ul class="nav-info other clearfix">
            <li><a href="<?=toRoute('/')?> ">首页</a></li>
            <li><a href=<?=toRoute('/news/index')?> >动态资讯</a></li>
            <li><a href=<?=toRoute('/areas/index')?> >公司介绍</a></li>
            <li><a href=<?=toRoute('/expert/index')?> >专家风采</a></li>
            <li><a href=<?=toRoute('/project/index')?> >对接项目</a></li>
            <li><a href=<?=toRoute('/activity/index')?> >产品中心</a></li>
        </ul>
    </div>
</header>
<?=asset_js('/web/base/js/plugins/header.js')?>