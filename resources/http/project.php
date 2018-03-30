<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/project.css')?>
</head>
<body>
<?=$app->view('@http/common/header');?>

<div class="expert-content">
    <div class="title-area">
        <p>对接项目</p>
        <?php if(!isset($_GET['keywords'])):?>
            <div class="title-line"></div>
        <?php endif;?>
    </div>
    <?php if(!isset($_GET['keywords'])):?>
        <ul class="expert-nav clearfix">
            <li class="<?=$type == 23 ? 'active' : ''?>"><a href=<?=toRoute('/project/index/'.hashids_encode(23))?> >金融财税</li></a>
            <li class="<?=$type == 24 ? 'active' : ''?>"><a href=<?=toRoute('/project/index/'.hashids_encode(24))?> >大数据产业</a></li>
            <li class="<?=$type == 25 ? 'active' : ''?>"><a href=<?=toRoute('/project/index/'.hashids_encode(25))?> >医疗卫生</a></li>
            <li class="<?=$type == 26 ? 'active' : ''?>"><a href=<?=toRoute('/project/index/'.hashids_encode(26))?> >建筑工程</a></li>
            <li class="<?=$type == 27 ? 'active' : ''?>"><a href=<?=toRoute('/project/index/'.hashids_encode(27))?> >旅游开发</a></li>
        </ul>
    <?php endif;?>
    <div class="expert-list">
        <?php foreach($list as $project):?>
            <div class="expert-item">
                <div class="item-content clearfix">
                    <img class="pull-left" src=<?=$project['logo'];?> >
                    <div class="project-info pull-left">
                        <a href="<?=toRoute('/project/detail/'.hashids_encode($project['id']))?>"><p class="project-name"><?=$project['title'];?></p></a>
                        <p class="project-detail"><?=$project['summary'];?></p>
                    </div>
                    <a href=<?=toRoute('/project/detail/'.hashids_encode($project['id']))?> class="detail">查看详情</a>
                </div>

                <div class="line"></div>
            </div>
        <?php endforeach;?>
        <div class="pagination">
            <?=$page?>
        </div>
    </div>

</div>

<script type="text/javascript" src="/web/tongren/js/project.js"></script>
<?=$app->view('@http/common/footer');?>
</body>
</html>