<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/index.css')?>
</head>
<body>
<header>
    <div class="header header-index">
        <div class="header-info clearfix">
            <a class="header-log" href="">
                <img src="/web/base/images/logo.png">
            </a>
            <div class="header-search">
                <div class="search-nav">
                    <a class="active" data-item="0">搜资讯</a>
                    <a data-item="1">搜专家</a>
                    <a data-item="2">搜项目</a>
                </div>
                <div class="search-input">
                    <input type="text" placeholder="请输入关键词搜索"/>
                    <a class="btn-search">搜索</a>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav-info index clearfix">
        <li><a href="<?=toRoute('/')?> ">首页</a></li>
        <li><a href=<?=toRoute('/news/index')?> >动态资讯</a></li>
        <li><a href=<?=toRoute('/areas/index')?> >两地风貌</a></li>
        <li><a href=<?=toRoute('/expert/index')?> >专家风采</a></li>
        <li><a href=<?=toRoute('/project/index')?> >对接项目</a></li>
        <li><a href=<?=toRoute('/activity/index')?> >活动剪影</a></li>
    </ul>
</header>

<div class="banner">
    <ul>
        <?php foreach($banner as $ban):?>
            <li>
                <a href="#">
                    <img src=<?=$ban['img'];?> >
                </a>
            </li>
        <?php endforeach;?>
    </ul>
    <div class="img-btn-list"></div>
</div>

<div class="dynamic-info">
    <div class="title-area">
        <p class="area-title">动态资讯</p>
        <div class="title-line"></div>
    </div>
    <ul class="dynamic-nav clearfix">
        <li class="nav-fast active">铜仁行快讯</li>
        <li class="nav-dy">铜仁动态</li>
        <li class="nav-su">苏州资讯</li>
    </ul>
    <div class="dynamic-content itme1 clearfix">
        <div class="dynamic-img pull-left">
            <img src=<?=$news1_hot['logo']?> >
            <p><?=$news1_hot['title'];?></p>
        </div>
        <div class="dynamic-msg pull-left">
            <div class="msg-top">
                <a href=<?=toRoute('/news/detail/'.hashids_encode($news1_hot['id']));?> class="top-title"><?=str_limit(strip_tags(htmlspecialchars_decode($news1_hot['title'])),50)?></a>
                <p class="top-content"><?=str_limit(strip_tags(htmlspecialchars_decode($news1_hot['content'])),170)?></p>
            </div>
            <ul class="msg-list">
                <?php foreach($news1 as $news):?>
                    <li>
                        <a href=<?=toRoute('/news/detail/'.hashids_encode($news['id']));?> ><span>-</span><?=$news['title'];?></a>
                        <span class="pull-right"></span>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div class="dynamic-content itme2 hidden clearfix">
        <div class="dynamic-img pull-left">
            <img src=<?=$news2_hot['logo']?> >
            <p><?=$news2_hot['title'];?></p>
        </div>
        <div class="dynamic-msg pull-left">
            <div class="msg-top">
                <a href=<?=toRoute('/news/detail/'.hashids_encode($news2_hot['id']));?> class="top-title"><?=str_limit(strip_tags(htmlspecialchars_decode($news2_hot['title'])),50)?></a>
                <p class="top-content"><?=str_limit(strip_tags(htmlspecialchars_decode($news2_hot['content'])),170)?></p>
            </div>
            <ul class="msg-list">
                <?php foreach($news2 as $news):?>
                    <li>
                        <a href=<?=toRoute('/news/detail/'.hashids_encode($news['id']));?> ><span>-</span><?=$news['title'];?></a>
                        <span class="pull-right"></span>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>

    <div class="dynamic-content itme3 hidden clearfix">
        <div class="dynamic-img pull-left">
            <img src=<?=$news3_hot['logo']?> >
            <p><?=$news3_hot['title'];?></p>
        </div>
        <div class="dynamic-msg pull-left">
            <div class="msg-top">
                <a href=<?=toRoute('/news/detail/'.hashids_encode($news3_hot['id']));?> class="top-title"><?=str_limit(strip_tags(htmlspecialchars_decode($news3_hot['title'])),50)?></a>
                <p class="top-content"><?=str_limit(strip_tags(htmlspecialchars_decode($news3_hot['content'])),170)?></p>
            </div>
            <ul class="msg-list">
                <?php foreach($news3 as $news):?>
                    <li>
                        <a href=<?=toRoute('/news/detail/'.hashids_encode($news['id']));?> ><span>-</span><?=$news['title'];?></a>
                        <span class="pull-right"></span>
                    </li>
                <?php endforeach;?>
            </ul>
        </div>
    </div>
</div>

<div class="grey-bg">
    <div class="expert-style">
        <div class="title-area">
            <p class="area-title">专家风采</p>
            <div class="title-line"></div>
        </div>
        <div class="expert-list clearfix">

            <?php foreach($experts as $expert):?>
                <a href="<?=toRoute('/expert/detail/'.hashids_encode($expert['id']))?>">
                    <div class="expert-item">
                        <div class="item-top">
                            <img src=<?=$expert['logo'];?> >
                        </div>
                        <p class="export-info">
                            <a><?=$expert['name'];?></a>
                            <span><?=$expert['category']['name'];?>专家</span>
                        </p>
                        <p class="export-msg"><?=$expert['role'];?></p>
                    </div>
                </a>

            <?php endforeach;?>

        </div>
        <div class="export-join">
            <a href="<?=toRoute('/index/join_expert')?>">我也要加入专家库</a>
        </div>
    </div>
</div>

<div class="docking-project">
    <div class="title-area">
        <p class="area-title">对接项目</p>
        <div class="title-line"></div>
    </div>
    <div class="project-list clearfix">
        <?php foreach($projects as $project):?>
            <a href="<?=toRoute('/project/detail/'.hashids_encode($project['id']))?>">
                <div class="project-item">
                    <p class="project-title"><?=$project['title']?></p>
                    <p class="project-content"><?=str_limit(strip_tags(htmlspecialchars_decode($project['summary'])),80)?></p>
                    <img src=<?=$project['logo']?> >
                </div>
            </a>

        <?php endforeach;?>
    </div>
    <div class="export-join">
        <a href="<?=toRoute('/index/my_project')?>">我有项目在铜仁</a>
    </div>
</div>

<div class="grey-bg">
    <div class="activity-photos">
        <div class="title-area">
            <p class="area-title">活动剪影</p>
            <div class="title-line"></div>
        </div>
        <p class="activity-title"><?=$activitys['title'];?></p>
        <div class="banner-photos">
            <?php
            $listImgs = $activitys['images'];
            $num = ceil(count($listImgs)/3);
            ?>
            <ul>
                <?php for($i=0;$i<$num;$i++): ?>
                    <?php $list = array_slice($listImgs,$i*3,3); ?>
                    <li>
                        <div class="clearfix activity-list">
                            <?php if($list):   foreach ($list as $key => $row) : ?>
                                <div class="activity-item">
                                    <div class="img-H">
                                        <img src="<?=$row['path']?>">
                                    </div>
                                    <p><?=$row['title']?></p>
                                </div>
                            <?php endforeach; endif; ?>
                        </div>
                    </li>
                <?php endfor; ?>
            </ul>
            <div class="btn-list"></div>
        </div>
    </div>
</div>

<div class="overlay"></div>
<div class="overPicture">
    <div class="close">
        <img src="/web/tongren/images/close.png">
    </div>
</div>


<script type="text/javascript" src="/web/base/js/plugins/bannerList.js"></script>
<script type="text/javascript" src="/web/base/js/plugins/maxPicture.js"></script>
<script type="text/javascript" src="/web/tongren/js/index.js"></script>
<script type="text/javascript" src="/web/base/js/plugins/header.js"></script>
<?=$app->view('@http/common/footer');?>
</body>
</html>
