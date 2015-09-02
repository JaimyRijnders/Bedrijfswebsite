<?php
$parent = 1;
?>
<div id="overOns" class="wrapper">
    <div class="container">
        <h1>
            <p class="stripes">
                ==
            </p>
            <?php
            echo $this->allContent[$parent][0]["title"];
            ?>
        </h1>

        <div id="photos">
            <div id="photoJonas"></div>
            <div id="photoJaimy"></div>
        </div>
        <?php

        if ($_SESSION['cms']) {
            echo '
            <div class = "addElement" data-parent = "'. $parent . '">
            +
            </div>';
        }
        ?>
    </div>

</div>