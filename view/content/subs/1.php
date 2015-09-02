<?php
if (isset($this->subCss)) {
    foreach ($this->subCss as $subCss) {
        echo "<link rel='stylesheet' type='text/css' href='" . $subCss . "' />";
    }
}
?>
<div id="photos">
    <div class="photo" id="media<?php echo $this->media[0]['id'] ?>"></div>
    <div class="photo" style="float:right;" id="media<?php echo $this->media[1]['id'] ?>"></div>
</div>