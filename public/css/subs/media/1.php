<?php
header("Content-type: text/css");
$id = $_GET['id'];
$url = $_GET['url'];
$settings = json_decode($_GET['settings'], true);
?>

#media<?php echo $id ?>{
height: 100%;
width: 350px;
float: left;
border: 0px solid black;
background-image: url('<?php echo $url ?>');
background-repeat: no-repeat;
background-size: cover;
box-shadow: 3px 3px 3px grey;
}
<?php
if (isset($settings['hover'])) {
    ?>
    #media<?php echo $id ?>:hover{
    <?php
    $keys = array_keys($settings['hover']);
    $i = 0;
    foreach ($settings['hover'] as $setting) {
        echo $keys[$i] . $setting;
    }
    ?>
    }
<?php
}?>