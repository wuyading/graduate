<div class="nav-scroll">
    <div class="nav-list">
        <ul>
            <li <?=route_info('action') == 'index' ? 'class="active"' : ''?>><a href="<?=toRoute()?>">首页</a></li>
            <li <?=route_info('action') == 'news' ? 'class="active"' : ''?>><a href="<?=toRoute('index/news')?>">动态资讯</a></li>
            <li <?=route_info('action') == 'areas' ? 'class="active"' : ''?>><a href="<?=toRoute('index/areas')?>">两地风貌</a></li>
            <li <?=route_info('action') == 'expert' ? 'class="active"' : ''?>><a href="<?=toRoute('index/expert')?>">专家风采</a></li>
            <li <?=route_info('action') == 'activity' ? 'class="active"' : ''?>><a href="<?=toRoute('index/activity')?>">活动剪影</a></li>
        </ul>
    </div>
</div>