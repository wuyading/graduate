/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/5/2
 * Time: 16:54
 */
var json = {
    news:[
        {name:'徐友佳',introduce:'徐又佳，男，博士学历，现任苏州大学附属第二医院骨外科主任医师，科教处处长。',type:'医疗卫生专家'},
        {name:'徐友佳',introduce:'徐又佳，男，博士学历，现任苏州大学附属第二医院骨外科主任医师，科教处处长。',type:'医疗卫生专家'},
        {name:'徐友佳',introduce:'徐又佳，男，博士学历，现任苏州大学附属第二医院骨外科主任医师，科教处处长。',type:'医疗卫生专家'},
        {name:'徐友佳',introduce:'徐又佳，男，博士学历，现任苏州大学附属第二医院骨外科主任医师，科教处处长。',type:'医疗卫生专家'},
        {name:'徐友佳',introduce:'徐又佳，男，博士学历，现任苏州大学附属第二医院骨外科主任医师，科教处处长。',type:'医疗卫生专家'},
        {name:'徐友佳',introduce:'徐又佳，男，博士学历，现任苏州大学附属第二医院骨外科主任医师，科教处处长。',type:'医疗卫生专家'},
        {name:'徐友佳',introduce:'徐又佳，男，博士学历，现任苏州大学附属第二医院骨外科主任医师，科教处处长。',type:'医疗卫生专家'}
    ]
};
$(function(){
    $(window).scroll(function(){
        var scroll = $(".wrapper").height() - $(window).height();
        if($(window).scrollTop() == scroll){
            $(".loading").show();
            setTimeout('init()',800)
        }
    });
});
var page = 1;
function init(){
    page = page + 1;
    var url = window.location.href.split('expert/')[1];
    if(url == undefined){
        url = "";
    }else{
        url = "/" + url;
    }
    var keywords = window.location.href.split('keywords=')[1];
    if(keywords == undefined){
        keywords = '';
    }
    $.ajax({
        url:'/wap/index/ajax_get_expert'+url,
        type:'get',
        data:{p:page,keywords:keywords},
        success:function(data){
            var arr = data['data'];
            if(arr.length != 0){
                $(arr).each(function(){
                    var html = '<a href="'+this.detail_url+'"><div class="expert-item clearfix"><div class="pull-left"><p class="item-title">'+this.name+'</p><p class="item-introduce">'+this.role+'</p>'
                        +'<object><a href="'+this.category_url+'"><span class="job">'+this.category.name+'专家</span></object></a></div><div class="pull-right"><img src="images/expert-img1.jpg" /></div></div></a>';
                    $(".expert-list").append(html);
                });
            }else{
                $(".loading").hide();
                $(".end").show();
            }
        },
        error:function(){
            console.log("请求失败")
        }
    });
}