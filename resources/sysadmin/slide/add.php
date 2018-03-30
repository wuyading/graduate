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
                                <a href="/index">首页</a>
                                <i class="fa fa-circle"></i>
                                <a href="#">幻灯片管理</a>
                                <i class="fa fa-circle"></i>
                                <a href="#"><?= isset($id) ? '修改' : '添加'?>幻灯片</a>
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
                            <form id="sub_form" target="iframe_message" action="<?=toRoute('slide/ajax_save_data')?>" method="post" enctype="multipart/form-data"">
                                <table class="table" style="width: 1000px;">
                                    <tr>
                                        <th><span style="color: red">*</span>轮播图片：</th>
                                        <td>
                                            <img id="preview" style="height: 120px;border: 1px solid #AAAAAA;" src="<?=isset($info['img']) ? $info['img'] : ''?>" />
                                            <br /><br />
                                            <input type="file" name="file" onchange="imgPreview(this)" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span style="color: red">*</span>类型：</th>
                                        <td>
                                            <select class="form-control input-small inline c_first" name="type">
                                                <option value="1" <?php if(isset($info['type'])==1) echo 'selected'; ?> >电脑端</option>
                                                <option value="2" <?php if(isset($info['type'])==2) echo 'selected'; ?> >手机端</option>
                                            </select>
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
        <iframe name="iframe_message" style="display: none">

        </iframe>
        <!-- BEGIN FOOTER -->
        <?=$app->view('common/footer');?>

        <script type="text/javascript">

            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例

            function show_message(json) {
                if(json.status == 1001){
                    layer.alert(json.msg);

                    window.location.href = "<?=toRoute('slide')?>";
                }else{
                    layer.alert(json.msg);
                }
            }
        </script>
        <script type="text/javascript">
            function imgPreview(fileDom){
                //判断是否支持FileReader
                if (window.FileReader) {
                    var reader = new FileReader();
                } else {
                    alert("您的设备不支持图片预览功能，如需该功能请升级您的设备！");
                }

                //获取文件
                var file = fileDom.files[0];
                var imageType = /^image\//;
                //是否是图片
                if (!imageType.test(file.type)) {
                    alert("请选择图片！");
                    return;
                }
                //读取完成
                reader.onload = function(e) {
                    //获取图片dom
                    var img = document.getElementById("preview");
                    //图片路径设置为读取的图片
                    img.src = e.target.result;
//                    img.style.width = "50%";
                };
                reader.readAsDataURL(file);
            }
        </script>
        <script>
            function upload() {
                var xhr = new XMLHttpRequest();
                var progress = document.getElementById("progress")
                progress.style.display = "block";

                xhr.upload.addEventListener("progress", function(e) {
                    if (e.lengthComputable) {
                        var percentage = Math.round((e.loaded * 100) / e.total);
                        progress.value = percentage;
                    }
                }, false);

                xhr.upload.addEventListener("load", function(e){
                    console.log("上传完毕...")
                }, false);

                xhr.open("POST", "upload");
                xhr.overrideMimeType('text/plain; charset=x-user-defined-binary');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText); // handle response.
                        progress.style.display = "none";
                        progress.value = 0;
                    }
                };
                var file = document.getElementById("imgFile");
                var fd = new FormData();
                fd.append(file.files[0].name, file.files[0]);
                xhr.send(fd);
            }
        </script>
    </body>

</html>