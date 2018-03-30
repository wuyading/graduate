<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/apply-form.css')?>
</head>
<body>
<?=$app->view('@http/common/header');?>

<div class="main-content">
    <p class="apply-title">我要与这个项目合作</p>
    <form id="applyForm" action="<?=toRoute('/project/ajax_save')?>" onsubmit="return false">
        <div class="form-line">
            <label>合作思路简述：</label>
            <textarea name="ideas"></textarea>
        </div>
        <div class="form-line">
            <label>姓名：</label>
            <input type="text" name="userName"/>
        </div>
        <div class="form-line">
            <label>联系方式：</label>
            <input type="text" name="contactNumber"/>
        </div>
        <div class="form-btn">
            <input type="hidden" name="project_id" value="<?=$project_id?>">
            <input type="submit" class="btn-submit" value="提交"/>
        </div>
    </form>
</div>

<script type="text/javascript" src="/web/base/js/plugins/validate.js"></script>
<script type="text/javascript" src="/web/tongren/js/form.js"></script>
<?=$app->view('@http/common/footer');?>
<script type="text/javascript" src="/web/base/js/plugins/header.js"></script>

</body>
</html>