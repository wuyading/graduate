/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/19
 * Time: 9:44
 */
$(function(){
    //banner轮播
    bannerListFn(
        $(".banner"),
        $(".img-btn-list"),
        $(".left-btn"),
        $(".right-btn"),
        3000,
        true
    );
    //活动剪影轮播
    bannerListFn(
        $(".banner-photos"),
        $(".btn-list"),
        $(".left-btn"),
        $(".right-btn"),
        3000,
        true
    );
    //点击放大图片
    $(".activity-item img").click(function() {
        enlarge($(this));
    });
    $(".dynamic-nav li").click(function(){
        $(".dynamic-nav li").removeClass("active");
        $(this).addClass("active");
        $(".dynamic-content").hide();
        if($(this).hasClass("nav-fast")){
            $(".dynamic-content.itme1").show();
        }else if($(this).hasClass("nav-dy")){
            $(".dynamic-content.itme2").show();
        }else{
            $(".dynamic-content.itme3").show();
        }
    });
});
