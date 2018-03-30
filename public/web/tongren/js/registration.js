$(function(){
   $('.uploadImg').click(function(){
        $('#upload-img').click();
   });
    $('#upload-img').change(function(){
        var val = $(this).val();
        $('.imgUrl').text(val);
        var srcs = getObjectURL(this.files[0]);   //获取路径
        $(this).nextAll(".img2").show().attr("src",srcs);
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
        return url
    }
    //选择形式
    var way = [];
    $('.item input[type="checkbox"]').click(function(){
        var id = $(this).attr('data-val');
        if($(this).is(':checked')){
            way.push(id);
        }else{
            var arr = [];
            $(way).each(function(){
                if(this != id){
                    arr.push(this);
                }
            });
            way = arr;
        }
        $('#way').val(way);
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
                mobile:'手机号码格式有误'
            },
            'info[west_experience]' : {
                required:'经历不能为空'
            }
        },
        submitHandler:function (form) {
            //验证通过后提交数据，返回成功后加载第二步
            /* var formData = $('#registrationForm').serialize();
             var url = $('#registrationForm').attr('action');
             $.post(url,formData,function (res) {
             if(res.status == 1001){
             alert(res.msg);
             //清空空数据
             $('#registrationForm')[0].reset();
             }else{
             alert(res.msg);
             }
             });*/
            form.submit();
        }
    });
});
