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
<div class="wrapper">
    <?=$app->view('common/header')?>
    <div class="main-contain">
        <?=$app->view('common/nav')?>
        <div class="news-list">
            <?php foreach ($list as $item): ?>
                <a href="<?=toRoute('detail/news/'.$item['id'])?>">
                    <div class="news-item clearfix">
                        <div class="pull-left <?=empty($item['logo']) ? 'text' : ''?>">
                            <p class="news-title"><?=$item['title']?></p>
                            <p class="news-time"><?=date('Y年m月d日 H:i:s',$item['add_time'])?><object><a href="<?=toRoute('index/news/'.$item['category_id'])?>"><span><?=$item['category']['name']?></span></a></object></p>
                        </div>
                        <?php if($item['logo']): ?>
                            <div class="pull-right">
                                <img src="<?=$item['logo']?>" />
                            </div>
                        <?php endif;?>
                    </div>
                </a>
            <?php endforeach;?>
        </div>
    </div>
    <div class="list-last">
        <p class="disnone loading">加载更多</p>
        <p class="disnone end">已经到底啦!</p>
    </div>
</div>

<?=asset_js('mobile/js/news.js')?>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    var title = "<?=$seo['title']?>";
    var desc = "<?=$seo['description']?>";
    var link = "<?=current_url()?>";
    var imgUrl = '<?=asset_link('mobile/images/webchat.jpg')?>';
</script>
<?= $app->view('common/footer')?>
</body>
</html>