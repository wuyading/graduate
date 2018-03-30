/**
 * Created by WebStorm.
 * User:pengmeng
 * Date: 2017/4/20
 * Time: 17:07
 */
$(".close,.overlay").click(function(){
    $(".overlay,.overPicture").hide();
});
function enlarge(obj){
    $(".overlay,.overPicture").show();
    var _maxPicture = obj.clone();
    var text = obj.next().text();
    $(".overPicture").append(_maxPicture).append('<p>'+text+'</p>')
}