/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/19
 * Time: 17:18
 */
$(function(){
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
});