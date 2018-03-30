<!DOCTYPE html>
<html>
<head>
    <?=$app->view('common/head')?>
    <title><?=$seo['title']?></title>
    <meta name="keywords" content="<?=$seo['keywords']?>" />
    <meta name="description" content="<?=$seo['description']?>" />
    <?=asset_css('mobile/css/news.css')?>
</head>
<body>
    <?=$app->view('common/header')?>
    <div class="detail-contain">
        <p class="d-title"><?=$info['title'];?></p>
        <p class="d-info">
            <object><a href="<?=toRoute('index/news/'.hashids_encode($info['category_id']))?>"><span class="d-type"><?=$info['category'];?></span></a></object>
            <span class="d-time">发布于<?=date('Y年m月d日 H:i:s',$info['add_time']);?></span>
        </p>
        <div class="news-contain">
            <?=htmlspecialchars_decode($info['content']);?>
        </div>
    </div>
    <div class="activity-other">
        <p class="o-title"><span>最新资讯</span></p>
        <?php foreach($hot as $new):?>
        <a href="<?=toRoute('detail/news/'.hashids_encode($new['id']))?>">
            <div class="o-item clearfix">
                <img class="pull-left" src="<?=$new['logo'];?>" />
                <div class="o-text pull-left">
                    <p class="text-title"><?=str_limit($new['title'],52);?></p>
                    <p class="text-time">
                        <span><?=date('Y年m月d日',$new['add_time']);?></span>
                        <object><a href="<?=toRoute('index/news/'.hashids_encode($new['category_id']))?>"><span class="t-type"><?=$new['category'];?></span></a></object>
                    </p>
                </div>
            </div>
        </a>
        <?php endforeach;?>
    </div>

    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        var title = "<?=$info['title'];?>";
        var desc = "<?=strip_tags(htmlspecialchars_decode($info['content']));?>";
        var link = "<?=current_url()?>";
        var imgUrl = "<?=isset($info['logo'])?'http://zhiyuanqiao.zhuniu.com'.$info['logo']:'http://zhiyuanqiao.zhuniu.com/mobile/images/webchat.jpg';?>";
    </script>
    <?= $app->view('common/footer')?>
</body>
</html>