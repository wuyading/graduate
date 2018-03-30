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
    <p class="apply-title">您正在邀请<?=$info['name']?>作为您的项目导师</p>
    <form id="applyForm" action="<?=toRoute('/expert/ajax_save')?>" onsubmit="return false">
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
            <input type="hidden" name="expert_id" value="<?=$expert_id?>">
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