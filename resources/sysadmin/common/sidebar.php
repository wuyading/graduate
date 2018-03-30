<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
            <li class="sidebar-toggler-wrapper hide">
                <div class="sidebar-toggler"> </div>
            </li>

            <li class="nav-item <?=route_info('controller') == 'index' ? 'active' : ''?>">
                <a href="<?=toRoute()?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">首页</span>
                </a>
            </li>

            <li class="nav-item <?=route_info('controller') == 'apply' ? 'active' : ''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">申请管理</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?=route_info('action') == 'project' ? 'active' : ''?>">
                        <a href="<?=toRoute('apply/project')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">项目信息发布</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start <?=route_info('action') == 'expert' ? 'active' : ''?>">
                        <a href="<?=toRoute('apply/expert')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">专家库加入申请</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start <?=route_info('action') == 'cooperate' ? 'active' : ''?>">
                        <a href="<?=toRoute('apply/cooperate')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">项目合作申请</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item start <?=route_info('action') == 'tutor' ? 'active' : ''?>">
                        <a href="<?=toRoute('apply/tutor')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">项目导师邀请</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <?=in_array(route_info('controller'), ['news','expert','project','activity']) ? 'active' : ''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">信息管理</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item start <?=(route_info('controller') == 'news') ? 'active' : ''?>">
                        <a href="<?=toRoute('news')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">动态资讯</span>
                        </a>
                    </li>
                    <li class="nav-item start <?=(route_info('controller') == 'expert') ? 'active' : ''?>">
                        <a href="<?=toRoute('expert')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">专家风采</span>
                        </a>
                    </li>
                    <li class="nav-item start <?=(route_info('controller') == 'project') ? 'active' : ''?>">
                        <a href="<?=toRoute('project')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">对接项目</span>
                        </a>
                    </li>
                    <li class="nav-item start <?=(route_info('controller') == 'activity') ? 'active' : ''?>">
                        <a href="<?=toRoute('activity')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">活动剪影</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item <?=(route_info('controller') == 'cate' or route_info('controller') == 'slide') ? 'active' : ''?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">系统管理</span>
                    <span class="selected"></span>
                    <span class="arrow open"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item <?=(route_info('controller') == 'cate' && route_info('action') == 'index') ? 'active' : ''?>">
                        <a href="<?=toRoute('cate')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">分类管理</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <li class="nav-item <?=(route_info('controller') == 'slide' && route_info('action') == 'index') ? 'active' : ''?>">
                        <a href="<?=toRoute('slide')?>" class="nav-link ">
                            <i class="icon-bar-chart"></i>
                            <span class="title">幻灯片管理</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- END SIDEBAR -->
</div>