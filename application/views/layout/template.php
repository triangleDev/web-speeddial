<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
       <?php 
       foreach($styles as $style){
           echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$base_url$style\" >";
       }
       
       
       ;?>
    </head>
    <body>
        <div class="header">
            <h1>SpeedDial</h1>
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







