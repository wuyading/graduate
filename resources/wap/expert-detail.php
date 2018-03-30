<!DOCTYPE html>
<html>
<head>
    <?=$app->view('common/head')?>
    <title><?=$info['name'];?></title>
    <meta name="keywords" content="<?=$info['name'];?>" />
    <meta name="description" content="<?=strip_tags(htmlspecialchars_decode($info['role']))?>" />
    <?=asset_css('mobile/css/expert.css')?>
</head>
<body class="bg-w">
    <?=$app->view('common/header')?>
    <div class="detail-contain">
        <div class="top">
            <span class="name"><?=$info['name'];?></span>
            <object><a href="<?=toRoute('index/expert/'.hashids_encode($info['category_id']))?>"><span class="job"><?=$info['category'];?>专家</span></a></object>
        </div>
        <p class="d-introduce"><?=$info['role'];?></p>
        <img src="<?=$info['logo'];?>"/>
        <?=$info['detail_intro'];?>
    </div>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        var title = "<?=$info['name'];?>";
        var desc = "<?=strip_tags(htmlspecialchars_decode($info['role']))?>";
        var link = "<?=current_url()?>";
        var imgUrl = "<?=isset($info['logo'])?'http://zhiyuanqiao.zhuniu.com'.$info['logo']:'http://zhiyuanqiao.zhuniu.com/mobile/images/webchat.jpg';?>";
    </script>
    <?= $app->view('common/footer')?>
    <a href="<?=toRoute('index/join_expert')?>"><div class="over-add">
        <p>加入专家库</p>
    </div></a>
</body>
</html>