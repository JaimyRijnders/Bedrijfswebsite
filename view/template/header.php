<html>
    <head>
        <title>
            <?php echo $this->title; ?>
        </title>
        <link rel='stylesheet' type='text/css' href='<?php echo URL ?>public/css/<?php
        if (isset($this->style)) {
            echo $this->style;
        } else {
            echo 'style';
        }
        ?>.css'>
        <script src='http://code.jquery.com/jquery-1.11.0.min.js'></script>

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
        <div id="nav">
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