<p class="mainText <?php if ($_SESSION['cms']) echo 'editable'; ?>" data-id="<?php echo $this->id ?>">
    <?php echo $this->content ?>
</p>
<?php
if ($_SESSION['cms']) {
    echo '<span class="deleteElement" data-id="' . $this->id . '"><img src="public/img/removeContentButton.png" alt="Image not loaded"></span>';
}