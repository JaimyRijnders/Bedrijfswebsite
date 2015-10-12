<?php
if (isset($this->subCss)) {
    foreach ($this->subCss as $subCss) {
        echo "<link rel='stylesheet' type='text/css' href='" . $subCss . "' />";
    }
}
?>
<div class="photos">
    <div class="photo" data-id="<?php echo $this->media[0]['id'] ?>" id="media<?php echo $this->media[0]['id'] ?>"></div>
    <div class="photo" data-id="<?php echo $this->media[1]['id'] ?>" style="float:right;" id="media<?php echo $this->media[1]['id'] ?>"></div>
</div>
<div class="editElement" data-id="<?php echo $this->id;?>">Edit</div>