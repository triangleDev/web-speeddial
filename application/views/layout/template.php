<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $title; ?></title>
        <?php
        foreach ($styles as $style) {
            echo "<link rel=\"stylesheet\" type=\"text/css\" href='" . URL::base(TRUE, FALSE) . $style . "' >";
        }


        ;
        ?>
    </head>
    <body>
        <div class="header">
            <a href="<?php echo URL::base(TRUE, TRUE); ?>">SpeedDial</a>
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
        <div class="add_site">
            <div class="title">
                Добавить сайт
            </div>
            <input type="text" value="Введите url"/>
            <input type="button" class="addbtn" value="Добавить"/>
        </div>
<?php echo $content; ?>
    </body>
</html>







