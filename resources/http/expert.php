<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('web/tongren/css/expert-style.css')?>
</head>
<body>
<header>
    <?=$app->view('@http/common/header');?>

<div class="expert-content">
    <div class="title-area">
        <p>专家风采</p>
        <?php if(!isset($_GET['keywords'])):?>
            <div class="title-line"></div>
        <?php endif;?>
        <a href="<?=toRoute('/index/join_expert')?>" class="registration">申请成为专家</a>
    </div>
    <?php if(!isset($_GET['keywords'])):?>
        <ul class="expert-nav clearfix">
            <?php foreach ($expert as $key => $row): ?>
                <li class="<?=$type == $row['id'] ? 'active' : '' ?>">
                    <a href="<?=toRoute('/expert/index/'.hashids_encode($row['id']))?>"><?=$row['name']?></a>
                </li>
            <?php endforeach;?>
        </ul>
    <?php endif;?>
    <div class="expert-list">
        <?php foreach ($list as $row): ?>
        <div class="expert-item">
            <div class="item-content clearfix">
                <img class="pull-left" src="<?=$row['logo']?>">
                <div class="expert-info pull-left">
                    <div class="expert-header">
                        <span class="expert-name"><a href="<?=toRoute('/expert/detail/'.hashids_encode($row['id']))?>"><?=$row['name']?></a></span><span class="expert-position"><?=$row['expertType']?>专家</span>
                    </div>
                    <div class="expert-introduce">
                        <p class="expert-job"><?=$row['role']?></p>
                        <p class="expert-detail"><?=$row['simple_intro']?></p>
                    </div>
                </div>
            </div>
            <div class="line"></div>
        </div>
        <?php endforeach;?>

        <div class="pagination">
            <?=$page?>
        </div>
    </div>
</div>



<script type="text/javascript" src="/web/tongren/js/expert.js"></script>
<?=$app->view('@http/common/footer');?>
</body>
</html>