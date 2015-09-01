<?php
$parent = 1;
?>
<div id="overOns">
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
        foreach ($this->allContent[$parent] as $overOns) {
            echo '<p class="mainText editable" data-id="' . $overOns['id'] . '">' 
                    . $overOns["content"] . 
                '</p><span class="deleteElement" data-id="' . $overOns['id'] . '">Delete</span>';
        }

        if ($_SESSION['cms']) {
            echo '
            <div class = "addElement" data-parent = "'. $parent . '">
            +
            </div>';
        }
        ?>
    </div>

</div>