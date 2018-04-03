<!DOCTYPE html>
<html>
<head>
    <?=$app->view('@http/common/head');?>
    <title>苏州冬夏科技</title>
    <?=asset_css('/web/tongren/css/apply-form.css')?>
    <?=asset_css('/web/tongren/css/registration.css')?>
</head>
<body>
<?=$app->view('@http/common/header');?>

<div class="main-content">
    <p class="apply-title">苏州教授专家登记表</p>
    <form id="registrationForm" action="<?=toRoute('/index/ajax_save_expert')?>" method="post" enctype="multipart/form-data">
        <p class="tips">*请完整填写下列信息</p>
        <p class="title">基本信息</p>
        <div class="baseInfo">
            <div class="line">
                <label class="t-label">姓名：</label>
                <input type="text" name="info[name]"/>
            </div>
            <div class="line">
                <label class="t-label">性别：</label>
                <input type="radio" name="info[sex]" value="1" />男
                <input type="radio" name="info[sex]" value="2" />女
            </div>
            <div class="line">
                <label class="t-label">出生年月：</label>
                <input type="text" name="info[birthday]"/>
            </div>
            <div class="line">
                <label class="t-label">学历：</label>
                <input type="text" name="info[education]"/>
            </div>
            <div class="line">
                <label class="t-label">民族：</label>
                <input type="text" name="info[nation]"/>
            </div>
            <div class="line">
                <label class="t-label">政治面貌：</label>
                <input type="text" name="info[political_status]"/>
            </div>
            <div class="line">
                <label class="t-label">从事专业：</label>
                <input type="text" name="info[profession]"/>
            </div>
            <div class="line">
                <label class="t-label">职称：</label>
                <input type="text" name="info[technical_title]"/>
            </div>
            <div class="line">
                <label class="t-label">邮政编码：</label>
                <input type="text" name="info[zip]"/>
            </div>
            <div class="line">
                <label class="t-label">工作单位：</label>
                <input type="text" name="info[work_unit]"/>
            </div>
            <div class="line">
                <label class="t-label">电子邮箱：</label>
                <input type="text" name="info[email]"/>
            </div>
            <div class="line">
                <label class="t-label">职务：</label>
                <input type="text" name="info[job]"/>
            </div>
            <div class="line">
                <label class="t-label">办公电话：</label>
                <input type="text" name="info[phone]"/>
            </div>
            <div class="line">
                <label class="t-label">通讯地址：</label>
                <input type="text" name="info[address]"/>
            </div>
            <div class="line">
                <label class="t-label">QQ/微信：</label>
                <input type="text" name="info[qq]"/>
            </div>
            <div class="line">
                <label class="t-label">手机：</label>
                <input type="text" name="info[mobile]"/>
            </div>
        </div>
        <p class="title">活动基本情况</p>
        <div class="act-info">
            <span>您有无技术研发经历？如有，从事过哪方面的服务：</span>
            <input type="text" name="info[west_experience]"/>

        </div>
        <div class="act-info">
            <span>您能参与技术研发的时间？</span>
            <input type="text" name="info[use_time]"/>
        </div>
        <div class="act-info item">
            <span>您的研发来源？</span>
            <input type="hidden" name="info[use_way]" id="way">
            <input type="checkbox" data-val="1" id="hh"/>技术咨询
            <input type="checkbox" data-val="2"/>学术交流
            <input type="checkbox" data-val="3"/>培训授课
            <input type="checkbox" data-val="4"/>发展顾问
            <input type="checkbox" data-val="5"/>特聘教授(教师、医生)
        </div>
        <p class="title">个人简介</p>
        <textarea name="info[description]"></textarea>
        <div class="upload-img">
            <!--<img class="upload" src="images/upload-img.png"/><br>-->
            <span class="uploadImg">上传照片</span>
            <a class='imgUrl'></a>
            <input class="hidden" id="upload-img" type="file" name="file" value="" accept="image/*"/><br>
            <img src="" class="img2" />
        </div>
        <p class="title">个人承诺</p>
        <p class="promise">我志愿参加苏州冬夏科技的活动</p>
        <div class="agree">
            <input type="checkbox" name="info['is_commitment']" value="1" checked/>我同意
        </div>
        <div class="btn-area">
            <input type="submit" class="form-submit" value="提交"/>
        </div>

    </form>
</div>

<script type="text/javascript" src="/web/base/js/plugins/validate.js"></script>
<script type="text/javascript" src="/web/tongren/js/registration.js"></script>
<script type="text/javascript" src="/web/base/js/plugins/header.js"></script>
<script>
    <?php
        if($msg = cookie_helper('return_msg')){
            cookie_helper('return_msg',null);
            echo 'show_msg('.$msg.')';
        }
    ?>

    function show_msg(res) {
        alert(res.msg);
    }
</script>
<?=$app->view('@http/common/footer');?>
</body>
</html>