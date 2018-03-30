/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/19
 * Time: 16:46
 */
$(function(){
    $(".expert-nav li").click(function(){
        $(".expert-nav li").removeClass("active");
        $(this).addClass("active");
    })
});