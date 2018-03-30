/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/19
 * Time: 12:00
 */
$(function(){
    $(".info-nav li").click(function(){
        $(".info-nav li").removeClass("active");
        $(this).addClass("active");
    });
});