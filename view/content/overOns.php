<div id="overOns">
    <div class="container">
        <h1>
            <p class="stripes">
                ==
            </p>
            <?php
                echo $this->allContent["Over Ons"][0]["title"];
            ?>
        </h1>

        <div id="photos">
            <div id="photoJonas"></div>
            <div id="photoJaimy"></div>
        </div>
        <?php
            foreach($this->allContent["Over Ons"] as $overOns) {
                echo  '<pre><p class="mainText editable" data-id="' . $overOns['id'] . '">' . $overOns["content"] . '</p></pre>';
            }
        ?>
    </div>

</div>