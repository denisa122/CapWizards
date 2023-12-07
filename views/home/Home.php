<?php
require("./views/shared/header.php");

require_once "./models/HomeModel.php";

use models\HomeModel;


$homeModel = new HomeModel();

$FK_customerID = $_SESSION['customerID'];
if(isset($_POST['add_to_cart'])){
    $id = create_unique_id();
    $productID = $_POST['productID'];
    $productID = filter_var($productID, FILTER_SANITIZE_STRING);

    $verify_cart = $conn->prepare("SELECT * FROM ProductOrder JOIN `Order` JOIN Product ON Order.orderID = ProductOrder.orderID AND ProductOrder.productID = Product.productID WHERE ProductOrder.productID = ? AND order.FK_customerID = ?");
    $verify_cart->execute($productID, $FK_customerID);

    $max_cart_items = $conn->prepare("SELECT * FROM `Order` WHERE FK_customerID = ?");
    $max_cart_items->execute($FK_customerID);

    if($verify_cart->num_rows > 0){
        $warning_msg[] = 'Already added to cart!';
    }elseif($max_cart_items->num_rows == 100){
        $warning_msg[] = 'Cart is full';
    }else{
        $select_p = $conn->prepare("SELECT * FROM Product WHERE productID = ? LIMIT 1");
        $select_p->execute([$productID]);
        $fetch_p = $select_p->fetch(PDO::FETCH_ASSOC);

        $insert_cart = $conn->prepare("INSERT INTO `Order` ( FK_customerID) VALUES (?)");
        $insert_cart = $conn->prepare("INSERT INTO ProductOrder (productID, orderID) VALUES (?,?)");
        $insert_cart->execute([$FK_customerID, $productID, $orderID, $fetch_p['price']]);

        $success_msg[] = 'Product Added';
    }
}
?>

    <main class="pt-0">
    <!--banner-->
    <section class="banner text-center">
        <img src="/Assets/svg/Intro section.svg" alt="">
    </section>

    <!--About us-->
    <section class="text-center about-section">
        <h2 class="h1-green margin-50">About Us</h2>
        <?php $homeModel -> getDescription(1); ?>
    </section>

    <!--Categories-->
    <section class="d-flex justify-content-between categories-section text-center">
        <a href="http://localhost/CapWizards/Products/Alcoholic" class="text-decoration-none">
            <img src="/CapWizards/assets/svg/beer.svg" alt="#">
            <h2>Alcoholic</h2>
        </a>

        <a href="http://localhost/CapWizards/Products/Non-alcoholic" class="text-decoration-none">
            <img src="/CapWizards/assets/svg/nonAlcoholic.svg" alt="#">
            <h2>Non alcoholic</h2>
        </a>
    </section>

    <!--Daily offers-->
    <section class="dailyOffers-section text-center">
        <h1 class="h1-black margin-50">Special offers</h1>
        <div class="d-flex justify-content-center justify-content-between">
            <article class="product-w"> 
            <?php $homeModel -> getSpecialOffers(10) ?>
            </article>
                
            <article class="product-w"> 
            <?php $homeModel -> getSpecialOffers(5) ?>
            </article>
                
            <article class="product-w"> 
                <?php $homeModel -> getSpecialOffers(17) ?>  
            </article>
        </div>
    </section>
    
    <!--News feed-->
    <article class="text-center">
        <h1 class="h1-black margin-50">News</h1>
        <div class="d-flex justify-content-center">
            <div class="news-pink">
            <?php $homeModel -> getNews() ?>
            </div>
        </div>
    </article>
</main>

<?php
require("./views/shared/footer.php")
?>