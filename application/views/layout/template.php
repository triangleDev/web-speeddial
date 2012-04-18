<?php
    echo View::factory('layout/header', get_defined_vars())->render();
?>

    <div class="navbar navbar-fixed-top ">
        <div class="navbar-inner">
            <div class="container">
                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <a class="brand" href="<?echo URL::site();?>">Project name</a>
                <div class="nav-collapse">
                    <ul class="nav pull-right">
                        <li class="active"><a href="<?echo URL::site();?>"><?php echo __('home');?></a></li>
                        <li><?php
                            echo Html::anchor(
                                URL::site('welcome/about_us'),
                                __('about_us')
                            );
                            ?></li>
                        <li><?php
                            echo Html::anchor(
                                URL::site('welcome/contact'),
                                __('contact')
                            );
                            ?></li>
                        <li><?php
                            echo Html::anchor(
                                URL::site('welcome/login'),
                                __('login')
                            );
                            ?></li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <div class="container">
        <?php echo $content; ?>
    </div> <!-- /container -->

<?php
    echo View::factory('layout/footer', get_defined_vars())->render();
?>






