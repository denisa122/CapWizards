<?php
require("./views/shared/header.php") 
?>

<div style="width:800px; margin:0 auto; padding-top:20px; padding-left:200px;">
    <form method="POST" id="createProductForm" action="<?php echo BASE_URL ?>/Controllers/AdminController.php?action=createProduct">
        <input type="text" name="productName" class="row input-color input-size-b margin-15 text-center" placeholder="Product name">
        <input type="text" name="productDescription" class="row input-color input-size-b margin-15 text-center" placeholder="Description">
        <input type="number" name="price" class="row input-color input-size-b margin-15 text-center" placeholder="Price">
        <input type="text" name="size" class="row input-color input-size-b margin-15 text-center" placeholder="Size">
        <input type="text" name="brand" class="row input-color input-size-b margin-15 text-center" placeholder="Brand">
        <input type="text" name="color" class="row input-color input-size-b margin-15 text-center" placeholder="Color">
        <input type="number" name="availability" class="row input-color input-size-b margin-15 text-center" placeholder="Stock">
        <input type="text" name="imgUrl" class="row input-color input-size-b margin-15 text-center" placeholder="Image URL">
        <input type="text" name="altTxt" class="row input-color input-size-b margin-15 text-center" placeholder="Alternative text for image">
        <input type="text" name="material" class="row input-color input-size-b margin-15 text-center" placeholder="Material">
        <input type="number" name="isSpecialOffer" class="row input-color input-size-b margin-15 text-center" placeholder="Add to special offers?">
        <p>Write "1" to add this product to special offers and "0" to not add it.</p>
        <input type="number" name="FK_categoryID" class="row input-color input-size-b margin-15 text-center" placeholder="Category ID">
        <input type="number" name="FK_subcategoryID" class="row input-color input-size-b margin-15 text-center" placeholder="Subcategory ID">

        <button type="submit" name="createProduct" class="row text-center form-button-wrapper margin-30 big-button form-button">Create product</button>
    </form>
</div>