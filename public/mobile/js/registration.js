$(function(){
    //性别
    $('#f-sex i').click(function(){
        $('#f-sex i').removeClass('active');
        $(this).addClass('active');
        if($(this).next().text()=='男'){
            $('#sex').val(1);
        }else{
            $('#sex').val(2);
        }
    });
    //选择形式
    var way = [];
    $('.item i').click(function(){
        var id = $(this).attr('data-val');
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            var arr = [];
            $(way).each(function(){
                if(this != id){
                    arr.push(this);
                }
            });
            way = arr;
        }else{
            $(this).addClass('active');
            way.push(id);
        }
        $('#way').val(way);
    });
    //点击上传图片
    $('.uploadImg .clickImg').click(function(){
        $('#upload').click();
    });
    $('#upload').change(function(){
        var val = $(this).val();
        $('.imgUrl').text(val);
        var srcs = getObjectURL(this.files[0]);   //获取路径
        $(this).nextAll(".img2").show().attr("src",srcs);
    });
    //个人简介
    $('textarea').keydown(function(){
        var length = $(this).val().length;
        if(length == 500){
            $('.counts').css('color','red');
        }else{
            $('.counts').css('color','#333');
        }
        $('.counts span').text(length);
    });

    $('#registrationForm').validate({
        rules:{
            'info[name]' : {
                required:true
            },
            'info[profession]' : {
                required:true
            },
            'info[mobile]' : {
                required:true,
                mobile:true
            },
            'info[west_experience]' : {
                required:true
            }
        },
        messages: {
            'info[name]':{
                required:'姓名不能为空'
            },
            'info[profession]' : {
                required:'从事专业不能为空'
            },
            'info[mobile]' : {
                required:'手机号不能为空',
                mobile:'手机号格式有误'
            },
            'info[west_experience]' : {
                required:'经历不能为空'
            }
        },
        submitHandler:function (form) {
            //验证通过后提交数据，返回成功后加载第二步
            //var formData = $('#registrationForm').serialize();
            if($('.agree input').is(':checked')){
                //发送请求
                form.submit();
            }
        }
    });
    function getObjectURL(file) {
        var url = null;
        if (window.createObjectURL != undefined) {
            url = window.createObjectURL(file)
        } else if (window.URL != undefined) {
            url = window.URL.createObjectURL(file)
        } else if (window.webkitURL != undefined) {
            url = window.webkitURL.createObjectURL(file)
        }
        return url;
    }
});

