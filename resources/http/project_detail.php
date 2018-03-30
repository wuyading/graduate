<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/project-detail.css')?>
</head>
<body>
<?=$app->view('@http/common/header');?>


<div class="main-content">
    <p class="project-msg clearfix">
        <span class="pull-left project-name"><?=$info['title'];?></span>
        <a href=<?=toRoute('/project/invitation/'.hashids_encode($info['id']))?> class="pull-right apply-project">我要与这个项目合作</a>
    </p>
    <div class="project-introduce clearfix">
        <dl class="pull-left">
            <dt>项目带头人：</dt>
            <dd><?=$info['leader']?></dd>
            <dt>项目发起时间：</dt>
            <dd><?=date('Y年m月d日',$info['start_time']);?></dd>
            <dt>项目概况：</dt>
            <dd>
                <?=$info['summary'];?>
            </dd>
        </dl>
        <img class="pull-left" src=<?=$info['logo'];?> >
    </div>
    <div class="project-background">
        <?=$info['content'];?>
    </div>
</div>
<script type="text/javascript" src="/web/base/js/plugins/header.js"></script>
<?=$app->view('@http/common/footer');?>
</body>
</html>