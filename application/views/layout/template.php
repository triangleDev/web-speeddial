<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
       <?php 
       foreach($styles as $style){
           echo "<link rel=\"stylesheet\" type=\"text/css\" href='". URL::base(TRUE, FALSE) . $style ."' >";
       }
       
       
       ;?>
    </head>
    <body>
        <div class="header">
            <a href="<?php echo URL::base(TRUE, TRUE);?>">SpeedDial</a>
            <div class="menu">
                <ul>
                    <li><a href="#">
                            +сайт
                        </a></li>
                    <li><a href="#">
                            +категория
                        </a>
                    </li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <?php echo $content; ?>
    </body>
</html>







