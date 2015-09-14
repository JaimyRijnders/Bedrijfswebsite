<?php
header("Content-type: text/css");
$id = $_GET['id'];
$url = $_GET['url'];
$settings = json_decode(unserialize(urldecode($_GET['settings'])), true);
?>
#portfolioFoto<?php echo $id ?>{
    <?php
    $keys = array_keys($settings['default']);
    $i = 0;
    foreach ($settings['default'] as $setting) {
        echo $keys[$i] . $setting . ";";
    }
    ?>
    }
}

<?php
if (isset($settings['hover'])) {
    ?>
    #media<?php echo $id ?>:hover{
    <?php
    $keys = array_keys($settings['hover']);
    $i = 0;
    foreach ($settings['hover'] as $setting) {
        echo $keys[$i] . $setting . ";";
    }
    ?>
    }
<?php
}?>