<!doctype html>
<?php
echo HTML::tag(array(
    'html',
    'lang' => 'en',
        ), FALSE), PHP_EOL;

echo "<head>", PHP_EOL;
echo HTML::tag(array('meta', 'charset' => 'utf-8')), PHP_EOL;

echo '<title>', $title, '</title>', PHP_EOL;

if ($favicon) {
    echo HTML::tag(
            array(
                'link',
                'rel' => 'shortcut icon',
                'href' => URL::base(TRUE, FALSE) . $favicon,
                'type' => 'image/x-icon',
            )
    ), PHP_EOL;
}

foreach (array('keywords', 'description') as $property) {
    if (!$property)
        continue;
    echo HTML::tag(array(
        'meta',
        'name' => $property,
        'content' => $$property,
    )), PHP_EOL;
}

foreach ($styles as $file => $type) {
    echo HTML::style($file, array('media' => $type)), PHP_EOL;
}
$development_mode = isset(Kohana::$environment) && Kohana::$environment == Kohana::DEVELOPMENT;
?>

<script>
    var development_mode = <?php echo $development_mode ? 'true' : 'false' ?>;
    var url_base = '<?php echo URL::base(true, true) ?>';
</script>

<?php
foreach ($scripts as $file) {
    echo HTML::script($file), PHP_EOL;
}
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







