<?php
require("./views/shared/header.php")
?>

<div style="width:800px; margin:0 auto; padding-top:200px; padding-left:200px;">
    <form method="POST" id="addNewsForm" action="<?php echo BASE_URL ?>/controllers/AdminController.php?action=addNews">
        <input type="text" name="newsTitle" class="row input-color input-size-b margin-15 text-center" placeholder="Title" required>

        <label for="newsText">News contents</label>
        <textarea name="newsText" id='newsText'></textarea>

        <br />

        <button type="submit" name="addNews" class="row text-center form-button-wrapper margin-30 big-button form-button">Add</button>
    </form>
</div>