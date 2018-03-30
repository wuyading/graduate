<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/activity.css')?>
</head>
<body>
<?=$app->view('@http/common/header');?>


<div class="grey-bg">
    <div class="activity-photos">
        <div class="title-area">
            <p class="area-title"><?=$info['title']?></p>
            <div class="title-line"></div>
        </div>
        <div class="banner-photos">
            <?php
                $listImgs = json_decode($info['images'],true);
                $num = ceil(count($listImgs)/3);
            ?>
           <ul>
               <?php for($i=0;$i<$num;$i++): ?>
                   <?php $list = array_slice($listImgs,$i*3,3); ?>
                <li>
                    <div class="clearfix activity-list">
                        <?php if($list):   foreach ($list as $key => $row) : ?>
                            <div class="activity-item">
                                <div class=img-H>
                                    <img src="<?=$row['path']?>">
                                </div>
                                <p><?=$row['title']?></p>
                            </div>
                        <?php endforeach; endif; ?>
                    </div>
               </li>
               <?php endfor; ?>
            </ul>
            <div class="btn-list"></div>
        </div>
    </div>
</div>
<div class="activity-detail">
    <?=htmlspecialchars_decode($info['content'])?>
</div>


<script type="text/javascript" src="/web/base/js/plugins/bannerList.js"></script>
<script type="text/javascript" src="/web/tongren/js/activity.js"></script>
<?=$app->view('@http/common/footer');?>
</body>
</html>