<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/news.css')?>
</head>
<body>
<?=$app->view('@http/common/header');?>
<div class="main-content">
    <div class="dynamic-content pull-left">
        <div class="title-area">
            <p>动态资讯</p>
            <?php if(!isset($_GET['keywords'])):?>
                <div class="title-line"></div>
            <?php endif;?>
        </div>
        <div class="info-content">
            <div class="info-nav">
                <?php if(!isset($_GET['keywords'])):?>
                    <ul class="clearfix">
                        <li class="<?=$type == 14 ? 'active' : ''?>"><a href=<?=toRoute('/news/index/'.hashids_encode(14))?> >公司新闻</a></li>
                        <li class="<?=$type == 15 ? 'active' : ''?>"><a href=<?=toRoute('/news/index/'.hashids_encode(15))?> >行业新闻</a></li>
                        <li class="<?=$type == 16 ? 'active' : ''?>"><a href=<?=toRoute('/news/index/'.hashids_encode(16))?> >苏州新闻</a></li>
                    </ul>
                <?php endif;?>
            </div>
            <div class="info-list">
                <?php if($list):?>
                    <?php foreach($list as $new):?>
                        <div class="info-item clearfix">
                            <a href=<?=toRoute('/news/detail/'.hashids_encode($new['id']))?> ><p class="pull-left"><span>*</span><?=$new['title'];?></p></a>
                            <p class="pull-right"></p>
                        </div>
                    <?php endforeach; ?>
                <?php endif;?>
            </div>
            <div class="pagination">
                <?=$page?>
            </div>
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
<script type="text/javascript" src="/web/base/js/plugins/header.js"></script>
</body>
</html>