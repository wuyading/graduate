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
                        <a href="<?=toRoute()?>">首页</a>
                        <i class="fa fa-circle"></i>
                        <a href="#">个人申请详情</a>
                    </li>
                </ul>

            </div>
            <!-- END PAGE BAR -->
            <!-- END PAGE HEADER-->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <td>姓名</td>
                            <td>{{ $info['name'] }}</td>
                        </tr>
                        <tr>
                            <td>头像</td>
                            <td>&nbsp;{!! asset_img($info['logo'],['style'=>"height:100px"]) !!}</td>
                        </tr>
                        <tr>
                            <td>性别</td>
                            <td>{{ (isset($info['sex']) && $info['sex'] != 0)?$info['sex']==1?'男':'女':'无'  }}</td>
                        </tr>
                        <tr>
                            <td>出生年月</td>
                            <td>{{$info['birthday'] }}</td>
                        </tr>
                        <tr>
                            <td>学历</td>
                            <td>{{$info['education'] }}</td>
                        </tr>
                        <tr>
                            <td>民族</td>
                            <td>{{$info['nation'] }}</td>
                        </tr>
                        <tr>
                            <td>政治面貌</td>
                            <td>{{$info['political_status'] }}</td>
                        </tr>
                        <tr>
                            <td>专业</td>
                            <td>{{$info['profession'] }}</td>
                        </tr>
                        <tr>
                            <td>职称</td>
                            <td>{{$info['technical_title'] }}</td>
                        </tr>
                        <tr>
                            <td>工作单位</td>
                            <td>{{$info['work_unit'] }}</td>
                        </tr>
                        <tr>
                            <td>职务</td>
                            <td>{{$info['job'] }}</td>
                        </tr>
                        <tr>
                            <td>通信地址</td>
                            <td>{{$info['address'] }}</td>
                        </tr>
                        <tr>
                            <td>邮政编码</td>
                            <td>{{$info['zip'] }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$info['email'] }}</td>
                        </tr>
                        <tr>
                            <td>办公电话</td>
                            <td>{{$info['phone'] }}</td>
                        </tr>
                        <tr>
                            <td>qq 微信</td>
                            <td>{{$info['qq'] }}</td>
                        </tr>
                        <tr>
                            <td>手机号</td>
                            <td>{{$info['mobile'] }}</td>
                        </tr>
                        <tr>
                            <td>您有无对口帮扶西部地区的经历？如有，从事过哪方面的服务？</td>
                            <td>{{$info['west_experience'] }}</td>
                        </tr>
                        <tr>
                            <td>您能参与帮扶铜仁活动的时间</td>
                            <td>{{$info['use_time'] }}</td>
                        </tr>
                        <tr>
                            <td>您希望参与帮扶铜仁活动的形式</td>
                            <td>{{$info['use_way'] }}</td>
                        </tr>
                        <tr>
                            <td>个人承诺</td>
                            <td>{{$info['is_commitment'] }}</td>
                        </tr>
                        <tr>
                            <td> 个人简介</td>
                            <td>{{$info['description'] }}</td>
                        </tr>
                        <tr>
                            <td>浏览器信息</td>
                            <td>{{$info['user_agent'] }}</td>
                        </tr>
                        <tr>
                            <td>添加时间</td>
                            <td>{{date('Y-m-d H:i:s',$info['add_time']) }}</td>
                        </tr>
                        <tr>
                            <td>IP地址</td>
                            <td>{{$info['ip'] }}</td>
                        </tr>
                    </table>
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

<script type="text/javascript">
    function delete_row(id) {
        layer.alert('确定删除吗？', {
            icon: 6
            ,time: 0 //不自动关闭
            ,btn: ['确定', '取消']
            ,area: '200px'
            ,yes: function(index){
                layer.close(index);
                $.post('<?=toRoute('apply/ajax_delete_expert')?>',{'id':id},function (res) {
                    if(res.status == 1001){
                        layer.alert(res.msg, {
                            icon: 6
                            ,time: 0 //不自动关闭
                            ,btn: ['确定']
                            ,area: '200px'
                            ,yes: function(index){
                                layer.close(index);
                                window.location.href = '<?=toRoute("apply/expert")?>';
                            }
                        });
                    }else{
                        layer.alert(res.msg, {icon: 0,time:0,closeBtn: 0});
                    }
                },'json');
            }
            ,no: function(index){
                layer.close(index);
            }
        });

    }
</script>
</body>

</html>