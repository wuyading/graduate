/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/21
 * Time: 14:34
 */

$('#applyForm').validate({
    rules:{
        'userName' : {
            required:true
        },
        'contactNumber': {
            required: true
        },
        'goodField': {
            required: true
        },
        'proName': {
            required: true
        },
        'contactName': {
            required: true
        },
        'proMsg': {
            required: true
        },
        'ideas': {
            required: true
        }
    },
    messages: {
        'userName':{
            required: '姓名不能为空'
        },
        'contactNumber': {
            required: '联系方式不能为空',
            phone: '联系方式有误'
        },
        'goodField': {
            required: '擅长领域不能为空'
        },
        'proName': {
            required: '项目名称不能为空'
        },
        'contactName':{
            required: '联系姓名不能为空'
        },
        'proMsg': {
            required: '项目描述不能为空'
        },
        'ideas': {
            required: '合作思路简述不能为空'
        }
    },
    submitHandler:function () {
        //验证通过后提交数据，返回成功后加载第二步
        var formData = $('#applyForm').serialize();
        var url = $('#applyForm').attr('action');
        $.post(url,formData,function (res) {
            if(res.status == 1001){
                alert(res.msg);
                //清空空数据
                $('#applyForm')[0].reset();
            }else{
                alert(res.msg);
            }
        });
    }
});