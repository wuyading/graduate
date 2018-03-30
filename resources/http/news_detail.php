<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/dynamic-info-detail.css')?>
</head>
<body>
<?=$app->view('@http/common/header');?>

<div class="main-content">
    <div class="detail-content pull-left">
        <p class="title"><?=$info['title'];?></p>
        <div class="detail-info clearfix">
            <span class="pull-left dateTime">发布时间：<?=date('Y年m月d日 H:i:s',$info['add_time']);?></span>
<!--            <span class="pull-left browse">浏览：79</span>-->
            <span class="pull-right type"><?=$info['category'];?></span>
        </div>
        <div class="text-paragraph">
            <?=htmlspecialchars_decode($info['content']);?>
        </div>
        <div class="share">
            <span>分享到：</span>
            <img src="/web/tongren/images/share-weixin.png">
            <img src="/web/tongren/images/share-sina.png">
            <img src="/web/tongren/images/share-tecent.png">
            <img src="/web/tongren/images/share-kong.png">
        </div>
        <div class="around-detail">
            <?php if(isset($prev)):?>
                <p class="perv-detail"><a href=<?=toRoute('/news/detail/'.hashids_encode($prev['id']))?> ><span>上一篇：</span><?=$prev['title'];?></a></p>
            <?php endif;?>
            <?php if(isset($next)):?>
                <p class="next-detail"><a href=<?=toRoute('/news/detail/'.hashids_encode($next['id']))?> ><span>下一篇：</span><?=$next['title'];?></a></p>
            <?php endif;?>
        </div>
    </div>
    <div class="new-content pull-left">
        <p class="new-title">最新资讯</p>
        <ul class="new-list clearfix">
            <?php foreach($hot as $new):?>
                <li class="new-item overflow">
                    <a href=<?=toRoute('/news/detail/'.hashids_encode($new['id']))?> ><span>*</span><?=$new['title']?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>

<?=$app->view('@http/common/footer');?>

</body>
</html>