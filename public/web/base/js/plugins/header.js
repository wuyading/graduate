/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/20
 * Time: 16:24
 */
$(".search-nav a").click(function(){
    $(".search-nav a").removeClass("active");
    $(this).addClass("active")
});
//点击搜索
$(".btn-search").click(function(){
    var item = $(".search-nav .active").attr("data-item");
    var text = $(".search-input").find("input").val();
    if(item == 0){
        window.location.href="/news/index?keywords="+text;
    }else if(item == 1){
        window.location.href="/expert/index?keywords="+text;
    }else{
        window.location.href="/project/index?keywords="+text;
    }
});