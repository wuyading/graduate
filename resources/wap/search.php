<!DOCTYPE html>
<html>
<head>
    <?=$app->view('common/head')?>
    <title>搜索</title>
    <?=asset_css('mobile/css/search.css')?>
</head>
<body>
    <?=$app->view('common/header')?>
	<div class="main-contain">
        <input type="text" class="search"/>
        <p class="tips">搜索指定内容</p>
        <div class="btn-area">
            <a id="news">资讯</a>
            <span>|</span>
            <a id="expert">专家</a>
        </div>
    </div>

    <?=asset_css('mobile/js/search.js')?>
</body>
</html>