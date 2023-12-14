<?php
require("./views/shared/header.php");

// Get newsID from the URL
$newsID = isset($_POST['newsID']) ? $_POST['newsID'] : null;
if ($newsID === null) {
  // Handle the case when newsID is not provided
  echo "Error: News ID not provided";
  exit;
}

?>

<div style="width:800px; margin:0 auto; padding-top:200px; padding-left:200px;">
  <form method="POST" id="updateNewsForm" action="<?php echo BASE_URL ?>/controllers/AdminController.php?action=updateNews">
    <!-- Hidden input to pass newsID to the updateNews action -->
    <input type="hidden" name="newsID" value="<?php echo $newsID; ?>">
    <input type="text" name="newsTitle" class="row input-color input-size-b margin-15 text-center" placeholder="Title" required>

    <label for="newsText">News contents</label>
    <textarea name="newsText" id='newsText'></textarea>

    <button type="submit" name="updateNews" class="row text-center form-button-wrapper margin-30 big-button form-button">Update</button>
  </form>
</div>