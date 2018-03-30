<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <?=$app->view('common/header');?>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <?=$app->view('common/page_header');?>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?=$app->view('common/sidebar')?>
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="#">首页</a>
                                <i class="fa fa-circle"></i>
                                <a href="#">修改密码</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-8 col-sm-8">
                            <form id="pwd_form" method="post" onsubmit="return false">
                                <table class="table">
                                    <tr>
                                        <th>用户名：</th>
                                        <td><input type="text" name="username" required value="<?=$userInfo['username'] ?>"></td>
                                    </tr>
                                    <tr>
                                        <th>新密码：</th>
                                        <td><input type="password" name="pwd" required></td>
                                    </tr>
                                    <tr>
                                        <th>确认新密码：</th>
                                        <td><input type="password" name="re_pwd" required></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center">
                                            <input type="submit" class="btn btn-primary save_pwd"  value="保 存">
                                        </td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <?=$app->view('common/footer');?>
    <script>
        $(".save_pwd").click(function () {
            layer.alert('确定修改吗？', {
                icon: 6
                ,time: 0 //不自动关闭
                ,btn: ['确定', '取消']
                ,area: '200px'
                ,yes: function(index){
                    layer.close(index);
                    var data = $("#pwd_form").serialize();
                    $.post("<?=toRoute('index/update_pwd')?>",data,function (res) {
                        if(res.status == 1001){
                            layer.alert(res.message, {
                                icon: 6
                                ,time: 0 //不自动关闭
                                ,btn: ['确定']
                                ,area: '200px'
                                ,yes: function(index){
                                    layer.close(index);
                                    window.location.href = "<?=toRoute('login/login_out')?>";
                                }
                            });
                        }else{
                            layer.alert(res.message, {icon: 0,time:0,closeBtn: 0});
                        }
                    },'json');
                }
                ,no: function(index){
                    layer.close(index);
                }
            });
        });
    </script>
    </body>

</html>