<!doctype html>
<html>
    <head>
        <title>
            <?php echo $this->title; ?>
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel='stylesheet' type='text/css' href='<?php echo URL ?>public/css/<?php
        if (isset($this->style)) {
            echo $this->style;
        } else {
            echo 'style';
        }
        ?>.css'>
        <script src='<?php echo URL ?>public/js/jquery.js'></script>

        <?php
        //script moet in array worden geleverd
        if (isset($this->script)) {
            foreach ($this->script as $script) {
                echo "<script src='" . URL . "public/js/" . $script . ".js'></script>";
            }
            ?>

            <?php
        }
        ?>
    </head>
    <body>
        <div id="nav" class="wrapper">
            <div class="container">
                <div id="logo">
                    <a href="<?php echo URL ?>index.php">
                        <img src="<?php echo IMG ?>logo.png" id="logoIMG">
                        <h1>
                            Blue Lotus
                        </h1>
                        <h2>
                            Webdevelopment
                        </h2>
                    </a>
                </div>
                <ul>
                    <li>
                        <a href="#home">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#overOns">
                            Over ons
                        </a>
                    </li>
                    <li>
                        <a href="#portfolio">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#contact">
                            Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
