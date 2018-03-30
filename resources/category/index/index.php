<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->

    <!-- BEGIN HEAD -->
    <head>
        <?=$app->view('@sysadmin/common/header');?>
        <link rel="stylesheet" href="/ztree/css/zTreeStyle/zTreeStyle.css" type="text/css">
        <style>
            .ztree *{font-size: 18px;}
            .ztree li a{line-height:30px;height: 30px;}
            .ztree li span.button.add {
                background-position: -144px 0;
                margin-left: 2px;
                margin-right: -1px;
                vertical-align: top;
            }
            .ztree li a.curSelectedNode{line-height: 30px; height: 30px}
            .ztree li span.button{margin-top: 7px;}
            .ztree li a input.rename {  height: 26px;font-size: 14px;  }
            .zTreeDemoBackground{border: 1px solid #AAAAAA;padding: 15px 0;}
        </style>
    </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <?=$app->view('@sysadmin/common/page_header');?>
        <!-- END HEADER -->

        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <?=$app->view('@sysadmin/common/sidebar')?>
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
                                <a href="index.html">首页</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                <span>分类管理</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="zTreeDemoBackground left">
                                <ul id="treeDemo" class="ztree"></ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
        </div>
        <!-- END CONTAINER -->

        <?=$app->view('@sysadmin/common/footer');?>
        <script src="/ztree/js/jquery.ztree.all.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            <!--
            var setting = {
                view: {
                    addHoverDom: addHoverDom,
                    removeHoverDom: removeHoverDom,
                    //showIcon: showIconForTree,
                    selectedMulti: false
                },
                edit: {
                    enable: true,
                    editNameSelectAll: true,
                    showRemoveBtn: showRemoveBtn,
                    showRenameBtn: showRenameBtn
                },
                data: {
                    simpleData: {
                        enable: true
                    }
                },
                callback: {
                    beforeEditName: beforeEditName,
                    beforeRemove: beforeRemove,
                    beforeRename: beforeRename,
                    onRemove: onRemove,
                    onRename: onRename
                }
            };

            var zNodes = <?=$category_json?>;
            var log, className = "dark";
            function beforeDrag(treeId, treeNodes) {
                return false;
            }
            function showIconForTree(treeId, treeNode) {
                return false;
            };
            function beforeEditName(treeId, treeNode) {
                className = (className === "dark" ? "":"dark");
                showLog("[ "+getTime()+" beforeEditName ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
                var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                zTree.selectNode(treeNode);
                setTimeout(function() {
                    if (confirm("进入节点 -- " + treeNode.name + " 的编辑状态吗？")) {
                        setTimeout(function() {
                            zTree.editName(treeNode);
                        }, 0);
                    }
                }, 0);
                return false;
            }
            function beforeRemove(treeId, treeNode) {
                className = (className === "dark" ? "":"dark");
                showLog("[ "+getTime()+" beforeRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
                var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                zTree.selectNode(treeNode);
                return confirm("确认删除 节点 -- " + treeNode.name + " 吗？");
            }
            function onRemove(e, treeId, treeNode) {
                showLog("[ "+getTime()+" onRemove ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name);
                //ajax提交
                $.post('<?=toRoute("cate/ajax_delete")?>',{'id':treeNode.id},function (res) {
                    if(res.status == 1001){
                    }else{
                        alert(res.message);
                    }
                },'json');
            }
            function beforeRename(treeId, treeNode, newName, isCancel) {
                className = (className === "dark" ? "":"dark");
                showLog((isCancel ? "<span style='color:red'>":"") + "[ "+getTime()+" beforeRename ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name + (isCancel ? "</span>":""));
                if (newName.length == 0) {
                    setTimeout(function() {
                        var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                        zTree.cancelEditName();
                        alert("节点名称不能为空.");
                    }, 0);
                    return false;
                }else {
                    //ajax提交
                    $.post('<?=toRoute("cate/ajax_save_update")?>',{'id':treeNode.id,'name':newName},function (res) {
                        if(res.status == 1001){
                            return true;
                        }else{
                            alert(res.message);
                            return false;
                        }
                    },'json');
                }
                return true;
            }
            function onRename(e, treeId, treeNode, isCancel) {
                showLog((isCancel ? "<span style='color:red'>":"") + "[ "+getTime()+" onRename ]&nbsp;&nbsp;&nbsp;&nbsp; " + treeNode.name + (isCancel ? "</span>":""));
            }
            function showRemoveBtn(treeId, treeNode) {
                if(treeNode.id == 1){
                    return false;
                }else{
                    return true;
                }
                //return !treeNode.isFirstNode;
            }
            function showRenameBtn(treeId, treeNode) {
                return true;
            }
            function showLog(str) {
                if (!log) log = $("#log");
                log.append("<li class='"+className+"'>"+str+"</li>");
                if(log.children("li").length > 8) {
                    log.get(0).removeChild(log.children("li")[0]);
                }
            }
            function getTime() {
                var now= new Date(),
                    h=now.getHours(),
                    m=now.getMinutes(),
                    s=now.getSeconds(),
                    ms=now.getMilliseconds();
                return (h+":"+m+":"+s+ " " +ms);
            }

            var newCount = 1;
            function addHoverDom(treeId, treeNode) {
                var sObj = $("#" + treeNode.tId + "_span");
                if (treeNode.editNameFlag || $("#addBtn_"+treeNode.tId).length>0) return;
                var addStr = "<span class='button add' id='addBtn_" + treeNode.tId
                    + "' title='add node' onfocus='this.blur();'></span>";
                sObj.after(addStr);
                var btn = $("#addBtn_"+treeNode.tId);
                if (btn) btn.bind("click", function(){
                    var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                    var node_name = "新节点" + (newCount++);

                    if(treeNode.level >= 2){
                        layer.alert('不允许继续添加节点');
                        return false;
                    }
                    //ajax提交
                    $.post('<?=toRoute("cate/ajax_save_add")?>',{'pid':treeNode.id,'name':node_name,'level':treeNode.level},function (res) {
                        if(res.status == 1001){
                            zTree.addNodes(treeNode, {id:res.data, pId:treeNode.id, name:node_name});
                        }else{
                            alert(res.message);
                        }
                    },'json');
                    return false;
                });
            };
            function removeHoverDom(treeId, treeNode) {
                $("#addBtn_"+treeNode.tId).unbind().remove();
            };
            function selectAll() {
                var zTree = $.fn.zTree.getZTreeObj("treeDemo");
                zTree.setting.edit.editNameSelectAll =  $("#selectAll").attr("checked");
            }

            $(document).ready(function(){
                $.fn.zTree.init($("#treeDemo"), setting, zNodes);
                $("#selectAll").bind("click", selectAll);
            });
            //-->
        </script>
        <script>
            $("#add_category").click(function () {
                $("#update_id").val('');
                $(".category_id").val(0);
                $(".category_name").val('');

                $('.add_info').modal('show');
            });

            function update_cate(id,p_id,name) {
                $(".category_id").val(p_id);
                $("#update_id").val(id);
                $(".category_name").val(name);

                $(".modal-title").html('修改分类');
                $('.add_info').modal('show');
            }

            $(".save_category").click(function () {
                if(confirm('确定提交保存吗？')){
                    var data = $("#save_form").serialize();
                    $.post('/cate/ajax_save',data,function (res) {
                        if(res.status == 1001){
                            alert(res.message);
                            $('.add_info').modal('hide');
                            window.location.reload();
                        }else{
                            alert(res.message);
                        }
                    },'json');
                }
            });
        </script>
    </body>

</html>