/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/19
 * Time: 12:25
 */
$(function(){
    $(".area-nav img").click(function(){
        $(".view-content").hide();
        if($(this).hasClass("tongren")){
            $(".view-content.tongren").show();
        }else{
            $(".view-content.suzhou").show();
        }
    });
});