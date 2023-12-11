<?php
require("./views/shared/header.php") 
?>

<!-- Main -->
<form method="POST" id="addNewsForm" action="<?php echo BASE_URL ?>/Controllers/AdminController.php?action=addNews">
            <input type="text" name="newsTitle" class="row input-color input-size-b margin-15 text-center" placeholder="Title" required>
            
            <label for="newsText">News contents</label>
            <textarea name="newsText" id='newsText'></textarea>

            <br/>
             
            <button type="submit" name="addNews" class="row text-center form-button-wrapper margin-30 big-button form-button">Add</button>
</form>