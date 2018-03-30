/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/5/4
 * Time: 10:44
 */
$(function(){
    $("#news").click(function(){
        var text = $(".search").val().trim();
        window.location = '/wap/index/news?keywords='+text;
    });
    $("#expert").click(function(){
        var text = $(".search").val().trim();
        window.location = '/wap/index/expert?keywords='+text;
    });
});