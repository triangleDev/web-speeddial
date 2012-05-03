<div class="navbar navbar-top ">
    <div class="navbar-inner">
        <div class="container">
            <a class="brand" href="<?echo URL::site();?>">Project name</a>
            <ul class="nav nav-pills pull-right">
                <li class="dropdown" id="menu1">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                        <img src="<?php echo Url::base(TRUE,TRUE);?>/media/images/icons/configure.png" />
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo Url::site('panel/sites/new');?>"  class="add-site"><i class="icon-screenshot"></i>add website</a></li>
                        <li><a href="<?php echo Url::site('panel/categories/new');?>" class="add-category"><i class="icon-folder-open"></i>add category</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="show_categories"><i class="icon-folder-close"></i>categories</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo Url::site('user/account_info');?>" class="account-info"><i class="icon-user"></i>account</a></li>
                        <li><a href="<?php echo Url::site('user/settings');?>" class="account-settings"><i class="icon-cog"></i>settings</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL::site('user/logout') ;?>"><i class="icon-off"></i>logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</div>