<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <?=$app->view('common/header');?>
        <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
        <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
        <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>
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
                                <a href="/index">首页</a>
                                <i class="fa fa-circle"></i>
                                <a href="#">活动剪影</a>
                                <i class="fa fa-circle"></i>
                                <a href="#"><?= isset($id) ? '修改' : '添加'?>活动剪影</a>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <style>
                                .table th{text-align: right}
                            </style>
                            <form id="sub_form" target="iframe_message" action="<?=toRoute('activity/ajax_save_data')?>" method="post" enctype="multipart/form-data"">
                                <table class="table" style="width: 1100px;">
                                    <tr>
                                        <th><span style="color: red">*</span>标题：</th>
                                        <td><input class="form-control" type="text" name="title" value="<?=isset($info['title']) ? $info['title'] : ''?>" required></td>
                                    </tr>
                                    <tr>
                                        <th><span style="color: red">*</span>图片：</th>
                                        <td>
                                            <ul class="u_attach" style="list-style: none">
                                                <?php
                                                if(isset($info)):
                                                    $attach_arr = json_decode($info['images'],true);
                                                    if($attach_arr):
                                                        foreach ($attach_arr as $row):
                                                            ?>
                                                            <li>
                                                                <span class="glyphicon glyphicon-remove" onclick="$(this).parent().remove()" style="margin-right: 10px;"></span>
                                                                <a target="_blank" href="<?=$row['path']?>"><?=$row['title']?> <span class="glyphicon glyphicon-save" aria-hidden="true"></span></a>
                                                                <input type="hidden" name="attach_path[]" value="<?=$row['path']?>">
                                                                <input type="hidden" name="attach_title[]" value="<?=$row['title']?>">
                                                            </li>
                                                            <?php
                                                        endforeach;
                                                    endif;
                                                endif;
                                                ?>
                                            </ul>
                                            <div style="margin-top: 20px;">
                                                <div class="upload_attach_div">
                                                    <div style="clear: both;margin-top:5px;border-bottom: 1px solid #aaa;padding-bottom: 10px;">
                                                        <span class="glyphicon glyphicon-remove" onclick="$(this).parent().remove()" style="float: left;line-height: 35px;margin-right: 10px;"></span>
                                                        <input type="file" class="attach_file pull-left" name="attach_file[]" value=""/>
                                                        标题：<input type="text" class="attach_name" name="attach_name[]" value="">
                                                    </div>
                                                </div>
                                                <input type="button" class="btn btn-info btn-sm upload_attach_add" style="margin-top: 10px;" value="添加">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>详细：</th>
                                        <td>
                                            <textarea id="editor" name="content" type="text/plain" style="width:900px;height:360px;">
                                                <?=isset($info['content']) ? htmlspecialchars_decode($info['content']) : ''?>
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span style="color: red">*</span>排序：</th>
                                        <td>
                                            <input type="text" name="sortid" value="<?=isset($info['sortid']) ? $info['sortid'] : '1'?>"> <span style="color:red">数字越大显示越靠前</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" style="text-align: center">
                                            <input type="hidden" name="id" value="<?=isset($info['id']) ? $info['id'] : ''?>">
                                            <input type="submit" class="btn btn-primary btn_save" value="保 存"> |
                                            <input type="button" class="btn btn-info" onclick="history.back(-1)" value="返 回">
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
        <iframe name="iframe_message" style="display: none"></iframe>
        <!-- BEGIN FOOTER -->
        <?=$app->view('common/footer');?>
        <script type="text/javascript">
            var ue = UE.getEditor('editor');

            function show_message(json) {
                if(json.status == 1001){
                    layer.alert(json.msg);
                    window.location.href = "<?=toRoute('activity')?>";
                }else{
                    layer.alert(json.msg);
                }
            }

            //上传附件
            $('.upload_attach_div').find('.attach_file').val('');
            $('.upload_attach_div').find('.attach_file_name').val('');
            var temp_html = $(".upload_attach_div").html();
            $(".upload_attach_add").click(function () {
                $(".upload_attach_div").append(temp_html);
            });
        </script>
    </body>

</html>