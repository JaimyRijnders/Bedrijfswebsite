<?php
if (isset($this->subCss)) {
    foreach ($this->subCss as $subCss) {
        echo "<link rel='stylesheet' type='text/css' href='" . $subCss . "' />";
    }
}
?>
<center>
    <ul>
        <?php foreach($this->media as $medium){ ?>
            <li id="portfolioFoto<?php echo $medium['id'] ?>" class="previews"><div class="prevInfo"><?php echo $medium['content'] ?></div></li>
        <?php }?>
    </ul>
</center>