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
                                <a href="#">动态资讯</a>
                                <i class="fa fa-circle"></i>
                                <a href="#"><?= isset($id) ? '修改' : '添加'?>资讯</a>
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
                            <form id="sub_form" target="iframe_message" action="<?=toRoute('news/ajax_save_data')?>" method="post" enctype="multipart/form-data"">
                                <table class="table" style="width: 1000px;">
                                    <tr>
                                        <th><span style="color: red">*</span>标题：</th>
                                        <td><input class="form-control" type="text" name="title" value="<?=isset($info['title']) ? $info['title'] : ''?>" required></td>
                                    </tr>
                                    <tr>
                                        <th><span style="color: red">*</span>图片：</th>
                                        <td>
                                            <img id="preview" style="height: 120px;border: 1px solid #AAAAAA;" src="<?=isset($info['logo']) ? $info['logo'] : ''?>" />
                                            <br /><br />
                                            <input type="file" name="file" onchange="imgPreview(this)" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>内容：</th>
                                        <td>
                                            <textarea id="editor" name="content" type="text/plain" style="width:900px;height:360px;"><?=isset($info['content']) ? htmlspecialchars_decode($info['content']) : ''?></textarea>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span style="color: red">*</span>分类：</th>
                                        <td>
                                            <div class="pull-left">
                                                <select class="form-control input-small inline c_first" name="category_id">
                                                    <option value="0">==请选择==</option>
                                                    <?php foreach ($list as $row) : ?>
                                                        <option value="<?=$row['id']?>" <?php if(isset($info['category_id']) && $row['id'] == $info['category_id']){ echo 'selected';} ?>><?=$row['name']?></option>
                                                    <?php endforeach;?>
                                                </select>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th><span style="color: red">*</span>推荐：</th>
                                        <td>
                                            <input type="checkbox" name="type" value="1" <?php if(isset($info) && $info['type'] ==1){ echo 'checked'; }?> >热点
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
        <iframe name="iframe_message" style="display: none">

        </iframe>
        <!-- BEGIN FOOTER -->
        <?=$app->view('common/footer');?>

        <script type="text/javascript">

            //实例化编辑器
            //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
            var ue = UE.getEditor('editor');

            function show_message(json) {
                if(json.status == 1001){
                    layer.alert(json.msg);

                    window.location.href = "<?=toRoute('news')?>";
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