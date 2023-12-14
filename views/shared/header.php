<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once("././dataaccess/db/DBConnector.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="/CapWizards/assets/css/main.css">
    <script src="/CapWizards/assets/amountCounter.js" defer></script>
    <title>Cap Wizards</title>
</head>

<body>
    <!-- Header -->
    <header>
        <nav class="d-flex justify-content-between">
            <!-- Alcoholic  -->
            <div class="d-flex">
                <div class="dropdown d-flex gap-30">
                    <h2 class="dropdown h2-small gap-5" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alcoholic</h2>
                    <img src="/CapWizards/assets/svg/arrow.svg" alt="Arrow icon">
                    <div class="dropdown-menu border-0 rounded-0 p-0 " aria-labelledby="dropdownMenu">
                        <div class="d-flex">
                            <a href="http://denisaneagu.com/CapWizards/Products/Alcoholic/Cider" class="dropdown-item text-center p-0">
                                <div class="menu-red">
                                    <img src="/CapWizards/assets/svg/cider.svg" alt="Cider icon">
                                    <h2 class="h2-small h2-bage">Cider</h2>
                                </div>
                            </a>
                            <a href="http://denisaneagu.com/CapWizards/Products/Alcoholic/Beer" class="dropdown-item text-center p-0">
                                <div class="menu-yellow">
                                    <img src="/CapWizards/assets/svg/beer-bage.svg" alt="Beer icon">
                                    <h2 class="h2-small h2-bage">Beer</h2>
                                </div>
                            </a>
                            <a href="http://denisaneagu.com/CapWizards/Products/Alcoholic/Shaker" class="dropdown-item text-center p-0">
                                <div class="menu-blue">
                                    <img src="/CapWizards/assets/svg/mixer.svg" alt="Shaker icon">
                                    <h2 class="h2-small h2-bage">Shaker</h2>
                                </div>
                            </a>
                            <a href="http://denisaneagu.com/CapWizards/Products/Alcoholic/Wine" class="dropdown-item text-center p-0">
                                <div class="menu-pink">
                                    <img class="margin-5" src="/CapWizards/assets/svg/vine.svg" alt="Wine icon">
                                    <h2 class="h2-small h2-bage">Wine</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Non-alcoholic -->
                <div class="dropdown d-flex">
                    <h2 class="dropdown h2-small gap-5" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Non-Alcoholic</h2>
                    <img src="/CapWizards/assets/svg/arrow.svg" alt="Arrow icon">
                    <div class="dropdown-menu border-0 rounded-0 p-0 " aria-labelledby="dropdownMenu">
                        <div class="d-flex">
                            <a class="dropdown-item text-center p-0" href="http://denisaneagu.com/CapWizards/Products/Non-alcoholic/Soda">
                                <div class="menu-red">
                                    <img src="/CapWizards/assets/svg/soda-drink.svg" alt="Soda icon">
                                    <h2 class="h2-small h2-bage">Soda</h2>
                                </div>
                            </a>
                            <a class="dropdown-item text-center p-0" href="http://denisaneagu.com/CapWizards/Products/Non-alcoholic/Soft-drink">
                                <div class="menu-yellow">
                                    <img src="/CapWizards/assets/svg/soft-drink.svg" alt="Soft drink icon">
                                    <h2 class="h2-small h2-bage">Soft drink</h2>
                                </div>
                            </a>
                            <a class="dropdown-item text-center p-0" href="http://denisaneagu.com/CapWizards/Products/Non-alcoholic/Water">
                                <div class="menu-blue">
                                    <img src="/CapWizards/assets/svg/water.svg" alt="Water icon">
                                    <h2 class="h2-small h2-bage">Water</h2>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <a class="nav-link" href="/CapWizards">
                HOME
            </a>
            <!-- Icons -->
            <div>
                <a class="gap-30" href="http://denisaneagu.com/CapWizards/ShoppingCart" style="margin-left: 80px;">
                    <img src="/CapWizards/assets/svg/cart.svg" alt="Cart icon">
                </a>
                <a class="gap-30" href="http://denisaneagu.com/CapWizards/Profile">
                    <img src="/CapWizards/assets/svg/avatar.svg" alt="Cart icon">
                </a>

                <?php if (isset($_SESSION['user'])) {
                    // Access user information
                    $userId = $_SESSION['user']['customerID'];
                    $firstName = $_SESSION['user']['firstName'];
                    $lastName = $_SESSION['user']['lastName'];
                    $userName = $_SESSION['user']['userName'];

                    echo "<a href='http://denisaneagu.com/CapWizards/controllers/LoginController.php?action=logout'>Log out</a>";
                } else {
                    echo "<a href='http://denisaneagu.com/CapWizards/Login'>Log in</a>";
                }
                ?>

                <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
                    echo "<a href='http://denisaneagu.com/CapWizards/Admin' style='margin-left:20px'>Admin panel</a>";
                }
                ?>
            </div>
        </nav>
    </header>