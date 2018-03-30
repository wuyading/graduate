<!DOCTYPE html>
<html>
<head>
    <?=$app->view('common/head')?>
    <title><?=$seo['title']?></title>
    <meta name="keywords" content="<?=$seo['keywords']?>" />
    <meta name="description" content="<?=$seo['description']?>" />
    <?=asset_css('mobile/css/expert.css')?>
</head>
<body>
<div class="wrapper">
    <?=$app->view('common/header')?>
    <div class="main-contain">
        <?=$app->view('common/nav')?>
        <div class="nav-scroll">
            <div class="nav-list">
                <ul>
                    <li class="<?=$type ? '' : 'active'?>" ><a href="<?=toRoute('index/expert')?>">全部</a></li>
                    <?php foreach ($expert_category as $row){ ?>
                    <li class="<?=$type==$row['id'] ? 'active' : ''?>" ><a href="<?=toRoute('index/expert/'.hashids_encode($row['id']))?>"><?=$row['name']?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="expert-list">
            <?php foreach ($list as $item): ?>
            <a href="<?=toRoute('detail/expert/'.$item['id'])?>">
                <div class="expert-item clearfix">
                    <div class="pull-left">
                        <p class="item-title"><?=$item['name']?></p>
                        <p class="item-introduce"><?=$item['role']?></p>
                        <object><a href="<?=toRoute('index/expert/'.$item['category_id'])?>"><span class="job"><?=$item['category']['name']?>专家</span></a></object>
                    </div>
                    <div class="pull-right">
                        <img src="<?=$item['logo']?>" />
                    </div>
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
<a href="<?=toRoute('index/join_expert')?>"><div class="over-add">
        <p>加入专家库</p>
    </div></a>

<?=asset_js('mobile/js/expert.js')?>
<script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script type="text/javascript">
    var title = "专家风采--智缘桥";
    var desc = "专家风采介绍";
    var link = "<?=current_url()?>";
    var imgUrl = '<?=asset_link('mobile/images/webchat.jpg')?>';
</script>
<?= $app->view('common/footer')?>
</body>
</html>