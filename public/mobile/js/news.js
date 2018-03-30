/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/5/2
 * Time: 16:33
 */
$(function(){
    $(window).scroll(function(){
        var scroll = $(".wrapper").height() - $(window).height();
        if($(window).scrollTop() == scroll){
            if($(".end").is(":hidden")){
                $(".loading").show();
                setTimeout('init()',800);
            }
        }
    });
});
var page = 1;
function init(){
    page = page + 1;
    var url = window.location.href.split('news/')[1];
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
        url:'/wap/index/ajax_get_news'+url,
        type:'get',
        data:{p:page,keywords:keywords},
        success:function(data){
            var arr = data['data'];
            if(arr.length != 0){
                $(arr).each(function(){
                    var time = changeTime(this.add_time);
                    if(this.logo == '' || this.logo == null || this.logo == undefined){
                        var html = '<a href="'+this.detail_url+'"><div class="news-item clearfix"><div class="pull-left text"><p class="news-title">'+this.title+'</p>'
                            +'<p class="news-time">'+time+'<object><a href="'+this.category_url+'"><span>'+this.category.name+'</span></a></object></p></div></div></a>';
                    }else{
                        var html = '<a href="'+this.detail_url+'"><div class="news-item clearfix"><div class="pull-left"><p class="news-title">'+this.title+'</p>'
                            +'<p class="news-time">'+time+'<object><a href="'+this.category_url+'"><span>'+this.category.name+'</span></a></object></p>'
                            +'</div><div class="pull-right"><img src="'+this.logo+'"></div></div></a>';
                    }
                    $(".news-list").append(html);
                });
            }else{
                $(".loading").hide();
                $(".end").show();
            }

        },
        error:function(){
            conosle.log("请求失败")
        }
    });
}
function changeTime(str){
    var da = str;
    da = new Date(parseInt(da));
    var year = da.getFullYear()+'年';
    var month = da.getMonth()+1+'月';
    var date = da.getDate()+'日 '; var hours = da.getHours()+':';var mi = da.getMinutes()+':'; var s = da.getSeconds();
    return [year,month,date,hours,mi,s].join('');
}