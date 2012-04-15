<!DOCTYPE html>
<html>
    <head>
       <?php 
       foreach($styles as $style){
           echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$base_url$style\" >";
       }
       
       
       ;?>
    </head>
    <body>
        <?php echo $content; ?>
    </body>
</html>







