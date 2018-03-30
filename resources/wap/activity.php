<!DOCTYPE html>
<html>
<head>
    <?=$app->view('common/head')?>
    <title>【苏州铜仁行活动剪影|相关活动介绍】——智缘桥</title>
    <meta name="keywords" content="苏州铜仁行活动剪影,相关活动介绍,智缘桥新窗口" />
    <meta name="description" content="智缘桥展示了苏州帮持铜仁的相关活动剪影，包括2017首期“苏州百名教授专家铜仁行”活动举行的活动剪影。上智缘桥找苏州铜仁行相关活动剪影！" />
    <?=asset_css('/mobile/css/activity.css')?>
</head>
<body>
<?=$app->view('common/header')?>
<div class="main-contain">
    <div class="activity-detail">
        <p class="d-title"><?=$info['title']?></p>
        <?php $imgList = json_decode($info['images'],true); ?>
        <?php foreach ($imgList as $img): ?>
            <?=asset_img($img['path'],['class'=>'act-img'])?>
        <p class="img-introduce"><?=$img['title']?></p>
        <?php endforeach;?>
        <!--<p class="share-title"><span>分享</span></p>
        <div class="share-area clearfix">
            <img class="pull-left" src="images/share-weixin.png"/>
            <img class="pull-right" src="images/share-quan.png"/>
        </div>-->
    </div>
    <?php if ($list): ?>
    <div class="activity-other">
        <p class="o-title"><span>往期活动剪影</span></p>
        <?php foreach ($list as $row): ?>
            <?php $imgs_arr = json_decode($row['images'],true); $img = array_shift($imgs_arr);?>
        <div class="o-item clearfix">
            <img class="pull-left" src="<?=$img['path']?>" />
            <div class="o-text pull-left">
                <a href="<?=toRoute('/wap/index/activity/'.$row['id'])?>"><p class="text-title"><?=$row['title']?></p></a>
                <p class="text-time">发布于<?=date('Y年m月d日 H:i:s',$row['add_time'])?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
<script>
    $(".nav-list").scrollLeft(150);
</script>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    var title = "【苏州铜仁行活动剪影|相关活动介绍】——智缘桥";
    var desc = "智缘桥展示了苏州帮持铜仁的相关活动剪影，包括2017首期“苏州百名教授专家铜仁行”活动举行的活动剪影。上智缘桥找苏州铜仁行相关活动剪影！";
    var link = "<?=current_url()?>";
    var imgUrl = 'http://zhiyuanqiao.zhuniu.com/mobile/images/webchat.jpg';
</script>
<?= $app->view('common/footer')?>
</body>
</html>