<?php
header("Content-type: text/css");
$id = $_GET['id'];
$url = $_GET['url'];
$settings = $_GET['settings'];
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