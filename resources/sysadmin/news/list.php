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
                                <a href="#">动态资讯</a>
                            </li>
                        </ul>

                    </div>
                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div style="margin: 15px 15px 15px 0;">
                            <a class="btn btn-danger" href="<?=toRoute('news/add')?>">添加资讯</a>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>共<?=$list?count($list):0?>条数据</span>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-hover">
                                <tr>
                                    <th>编号</th>
                                    <th>标题</th>
                                    <th>分类</th>
                                    <th>推荐类型</th>
                                    <th>操作</th>
                                </tr>
                                <?php if($list): foreach($list as $row):?>
                                <tr>
                                    <td><?php echo $row['id'] ?></td>
                                    <td><?php echo $row['title']?></td>
                                    <td><?php echo $row['cateInfo']?></td>
                                    <td><?php if($row['type'] == 1){ echo "热点";}else{ echo '普通';}?></td>
                                    <td>
                                        <a class="btn btn-primary" href="<?=toRoute('news/add/'.$row['id'])?>">修改</a>
                                        <a class="btn btn-danger" href="javascript:" onclick="delete_row(<?=$row['id']?>)">删除</a>
                                    </td>
                                </tr>
                                <?php endforeach; endif;?>
                            </table>
                            <div class="pagination">
                                <?=$page?>
                            </div>
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
                    $.post('<?=toRoute('news/ajax_delete_news')?>',{'id':id},function (res) {
                        if(res.status == 1001){
                            layer.alert(res.msg, {
                                icon: 6
                                ,time: 0 //不自动关闭
                                ,btn: ['确定']
                                ,area: '200px'
                                ,yes: function(index){
                                    layer.close(index);
                                    window.location.href = '<?=toRoute("news")?>';
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