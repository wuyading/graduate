<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title><?=$info['name']?></title>
    <meta name="keywords" content="<?=$info['name']?>" />
    <meta name="description" content="<?=$info['role']?>" />
    <?=asset_css('/web/tongren/css/expert-detail.css')?>
</head>
<body>

<?=$app->view('@http/common/header');?>

<div class="main-content">
    <p class="expert-msg clearfix">
        <span class="pull-left expert-name"><?=$info['name']?></span>
        <a href="<?=toRoute('/expert/invitation/'.hashids_encode($info['id']))?>" class="pull-right apply-expert">请<?=$info['name']?>做我的项目导师</a>
    </p>
    <div class="expert-introduce clearfix">
        <div class="introduce-txt pull-left">
            <?=$info['simple_intro']?>
        </div>
        <img class="pull-left" src="<?=$info['logo']?>">
    </div>

    <div class="social-appointments">
        <?=$info['detail_intro']?>
    </div>
</div>

<script type="text/javascript" src="/web/base/js/plugins/header.js"></script>
<?=$app->view('@http/common/footer');?>
</body>
</html>