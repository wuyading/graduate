<!DOCTYPE html>
<html>
<head>
    <?=$app->view('common/head')?>
    <title><?=isset($seo['title']) ? $seo['title'] : ''?></title>
    <meta name="keywords" content="<?=isset($seo['keywords']) ? $seo['keywords'] : ''?>" />
    <meta name="description" content="<?=isset($seo['description']) ? $seo['description'] : ''?>" />
    <?=asset_css('mobile/css/registration.css')?>
</head>
<body>
<div class="wrapper">
    <?=$app->view('common/header')?>
    <div class="main-contain">
    <p class="title">专家登记录入表</p>
    <form id="registrationForm" action="<?=toRoute('index/ajax_save_expert')?>" method="post" enctype="multipart/form-data">
        <div class="line">
            <span>姓名</span>
            <input type="text" name="info[name]" placeholder="请输入姓名"/>
        </div>
        <div class="line" id="f-sex">
            <span>性别</span>
            <i></i><span>男</span>
            <i></i><span>女</span>
            <input type="hidden" name="info[sex]" id="sex" placeholder="性别">
        </div>
        <div class="line">
            <span>出生年月</span>
            <input type="text" name="info[birthday]"  placeholder="出生年月"/>
        </div>
        <div class="line">
            <span>学历</span>
            <input type="text" name="info[education]"  placeholder="学历"/>
        </div>
        <div class="line">
            <span>民族</span>
            <input type="text" name="info[nation]"  placeholder="民族"/>
        </div>
        <div class="line">
            <span>政治面貌</span>
            <input type="text" name="info[political_status]"  placeholder="政治面貌"/>
        </div>
        <div class="line">
            <span>从事专业</span>
            <input type="text" name="info[profession]"  placeholder="从事专业"/>
        </div>
        <div class="line">
            <span>职称</span>
            <input type="text" name="info[technical_title]" placeholder="职称"/>
        </div>
        <div class="line">
            <span>工作单位</span>
            <input type="text" name="info[work_unit]" placeholder="工作单位"/>
        </div>
        <div class="line">
            <span>职务</span>
            <input type="text" name="info[job]" placeholder="职务"/>
        </div>
        <div class="line">
            <span>通信地址</span>
            <input type="text" name="info[address]" placeholder="通信地址"/>
        </div>
        <div class="line">
            <span>邮政编码</span>
            <input type="text" name="info[zip]"  placeholder="邮政编码"/>
        </div>
        <div class="line">
            <span>电子邮箱</span>
            <input type="text" name="info[email]"  placeholder="电子邮箱"/>
        </div>
        <div class="line">
            <span>办公电话</span>
            <input type="text" name="info[phone]" placeholder="办公电话"/>
        </div>
        <div class="line">
            <span>QQ/微信</span>
            <input type="text" name="info[qq]" placeholder="QQ/微信"/>
        </div>
        <div class="line">
            <span>手机</span>
            <input type="text" name="info[mobile]"  placeholder="手机"/>
        </div>
        <div class="info">
            <div class="i-line">
                <p>您有无对口帮扶西部地区的经历？如有，从事过哪方面的服务：</p>
                <input type="text" name="info[west_experience]"  placeholder="请填写"/>
            </div>
            <div class="i-line">
                <p>您能参与帮扶铜仁活动的时间？</p>
                <input type="text" name="info[use_time]" placeholder="请填写"/>
            </div>
            <div class="i-line clearfix">
                <p>您希望参与帮扶铜仁活动的形式?</p>
                <div class="item">
                    <i data-val="1"></i><span>技术咨询</span>
                </div>
                <div class="item">
                    <i data-val="2"></i><span>学术交流</span>
                </div>
                <div class="item">
                    <i data-val="3"></i><span>培训授课</span>
                </div>
                <div class="item">
                    <i data-val="4"></i><span>培训授课</span>
                </div>
                <div class="item">
                    <i data-val="5"></i><span>特聘教授</span>
                </div>
                <input type="hidden" name="info[use_way]" id="way">
            </div>
        </div>
        <div class="personal-info">
            <p>个人简介</p>
            <div class="texta">
                <textarea maxlength="500"  placeholder="请填写个人简介" name="info[description]"></textarea>
                <p class="counts"><span>0</span>/500</p>
            </div>

            <div class="uploadImg">
                <!--<img src="images/upload-img.png"/>-->
                <p class="clickImg">点击上传图片</p>
                <p class="imgUrl"></p>
                <input class="hidden" type="file" id="upload" accept="image/*" name="file">
                <img src="" class="img2"/>
            </div>
        </div>
        <div class="promise">
            <p class="t-title">个人承诺</p>
            <p class="msg">我志愿参加“苏州百名教授专家进铜仁”帮扶活动，
                在活动主办方协调组织下，认真完成相应的工作，
                努力为铜仁地方经济社会发展献计献策，尽自己所
                能帮助铜仁解决发展中面临的实际困难和问题。</p>
            <div class="agree">
                <input type="checkbox" name="info[is_commitment]" value="1" checked/>我同意
            </div>
        </div>
        <input type="submit" class="btn-submit"/>
    </form>
</div>
</div>

<?=asset_js('mobile/public/js/plugins/validate.js')?>
<?=asset_js('mobile/js/registration.js')?>
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
</body>
</html>