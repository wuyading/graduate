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
    <p class="apply-title">请输入您的项目信息，获得“江苏冬夏科技” 专家团帮助</p>
    <form id="applyForm" action="<?=toRoute('/index/ajax_save_project')?>">
        <div class="form-line">
            <label>项目名称：</label>
            <input type="text" name="proName"/>
        </div>
        <div class="form-line">
            <label>项目联系人：</label>
            <input type="text" name="contactName"/>
        </div>
        <div class="form-line">
            <label>项目联系方式：</label>
            <input type="text" name="contactNumber"/>
        </div>
        <div class="form-line">
            <label>项目描述：</label>
            <textarea name="proMsg"></textarea>
        </div>
        <div class="form-btn">
            <input type="submit" class="btn-submit" value="提交"/>
        </div>
    </form>
</div>

<script type="text/javascript" src="/web/base/js/plugins/validate.js"></script>
<script type="text/javascript" src="/web/tongren/js/form.js"></script>
<script type="text/javascript" src="/web/base/js/plugins/header.js"></script>
<?=$app->view('@http/common/footer');?>
</body>
</html>