<!DOCTYPE html>
<html>
<head>
    <?=$app->view('common/head')?>
    <title>智缘桥——苏州&铜仁两地友好交往的新窗口</title>
    <meta name="keywords" content="了解铜仁,对接铜仁.服务铜仁" />
    <meta name="description" content="智缘桥是苏州了解铜仁、对接铜仁和服务铜仁，展示两地友好交往的新窗口。上智缘桥查看苏州帮扶铜仁发展新资讯和新项目!" />
    <?=asset_css('mobile/css/index.css')?>
</head>
<body>
    <?=$app->view('common/header')?>
    <div class="main-contain">
        <?=$app->view('common/nav')?>
        <div class="banner">
            <ul>
                <?php foreach ($slide as $row): ?>
                <li>
                    <img src="<?=$row['img']?>" />
                </li>
                <?php endforeach; ?>
            </ul>
            <div class="img-btn-list"></div>
        </div>
        <div class="news-list">
            <?php foreach ($news as $item): ?>
            <a href="<?=toRoute('detail/news/'.$item['id'])?>">
                <div class="news-item clearfix">
                    <div class="pull-left <?=empty($item['logo']) ? 'text' : ''?>">
                        <p class="news-title"><?=$item['title']?></p>
                        <p class="news-time"><?=date('Y年m月d日 H:i:s',$item['add_time'])?> <a href="<?=toRoute('index/news/'.$item['category_id'])?>"><span><?=$item['category']['name']?></span></a></p>
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
        <div class="expert-list">
            <p class="expert-title">专/家/风/采</p>
            <?php foreach ($experts as $item): ?>
            <a href="<?=toRoute('detail/expert/'.$item['id'])?>">
                <div class="expert-item clearfix">
                    <div class="pull-left">
                        <p class="item-title"><?=$item['name']?></p>
                        <p class="item-introduce"><?=$item['role']?></p>
                        <a href="<?=toRoute('index/expert/'.$item['category_id'])?>"><span class="job"><?=$item['category']['name']?>专家</span></a>
                    </div>
                    <div class="pull-right">
                        <img src="<?=$item['logo']?>" />
                    </div>
                </div>
            </a>
            <?php endforeach;?>
        </div>
    </div>
    <footer>
        <p>版权所有：苏州科学技术协会 电子邮件：szst@szkp.org.cn</p>
    </footer>
    <script type="text/javascript" src="/mobile/public/js/plugins/bannerList.js"></script>
    <script type="text/javascript" src="/mobile/js/index.js"></script>
    <!--<script type="text/javascript" src="/mobile/js/jweixin-1.0.0.js"></script>-->
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script>
        var title = '智缘桥——苏州&铜仁两地友好交往的新窗口';
        var desc = '智缘桥是苏州了解铜仁、对接铜仁和服务铜仁，展示两地友好交往的新窗口。上智缘桥查看苏州帮扶铜仁发展新资讯和新项目!';
        var link = '<?=current_url()?>';
        var imgUrl = 'http://zhiyuanqiao.zhuniu.com/mobile/images/webchat.jpg';
    </script>
    <?= $app->view('common/footer')?>
</body>
</html>
