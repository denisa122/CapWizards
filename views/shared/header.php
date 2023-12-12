<?php 
    if (session_status() == PHP_SESSION_NONE)
    {
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
        <title>Document</title>
    </head>
    <body>
         <!-- Header -->
         <!-- <header>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- Product categories

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Alcoholic
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Alcoholic">All</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Alcoholic/Cider">Cider</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Alcoholic/Beer">Beer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Alcoholic/Shaker">Shaker</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Alcoholic/Wine">Wine</a>
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Non-alcoholic
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Non-alcoholic">All</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Non-alcoholic/Soda">Soda</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Non-alcoholic/Soft-drink">Soft drink</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="http://localhost/CapWizards/Products/Non-alcoholic/Water">Water</a>
        </div>
      </li>

      <!-- Logo

      <li class="nav-item">
        <a class="nav-link" href="http://localhost/CapWizards" style="margin-left: 720px !important;"> <!-- Change this to a better option to center the logo
          LOGO
        </a>
      </li>

      <!-- User actions

      <li>

      <a class="nav-link" href="http://localhost/CapWizards/ShoppingCart" style="margin-left: 80px;"> 
        <img src="/CapWizards/assets/svg/cart.svg" alt="Cart icon">
      </a>
      </li>

      <li>
      <a class="nav-link" href="http://localhost/CapWizards/Login">   
        <img src="/CapWizards/assets/svg/avatar.svg" alt="Avatar icon">  
      </a>
      </li>
    </ul>
  </div>
</nav>  
</header> -->

      <header>
        <nav class="d-flex justify-content-between">
            <!-- Alcoholic  -->
            <div class="d-flex">
                <div class="dropdown d-flex gap-30">
                        <h2 class="dropdown h2-small gap-5" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alcoholic</h2>
                        <img src="/CapWizards/assets/svg/arrow.svg" alt="Arrow icon">
                    <div class="dropdown-menu border-0 rounded-0 p-0 " aria-labelledby="dropdownMenu">
                        <div class="d-flex">
                            <a href="http://localhost/CapWizards/Products/Alcoholic/Cider" class="dropdown-item text-center p-0">
                                <div class="menu-red"> 
                                    <img src="/CapWizards/assets/svg/cider.svg" alt="Cider icon">
                                    <h2 class="h2-small h2-bage">Cider</h2>
                                </div>
                            </a>
                            <a href="http://localhost/CapWizards/Products/Alcoholic/Beer" class="dropdown-item text-center p-0">
                                <div class="menu-yellow">
                                    <img src="/CapWizards/assets/svg/beer-bage.svg" alt="Beer icon">
                                    <h2 class="h2-small h2-bage">Beer</h2>
                                </div>
                            </a>
                            <a href="http://localhost/CapWizards/Products/Alcoholic/Shaker" class="dropdown-item text-center p-0">
                                <div class="menu-blue"> 
                                    <img src="/CapWizards/assets/svg/mixer.svg" alt="Shaker icon">
                                    <h2 class="h2-small h2-bage">Shaker</h2>
                                </div>
                            </a>
                            <a href="http://localhost/CapWizards/Products/Alcoholic/Wine" class="dropdown-item text-center p-0">
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
                        <a class="dropdown-item text-center p-0" href="http://localhost/CapWizards/Products/Non-alcoholic/Soda">
                            <div class="menu-red"> 
                                <img src="/CapWizards/assets/svg/soda-drink.svg" alt="Soda icon">
                                <h2 class="h2-small h2-bage">Soda</h2>
                            </div>
                        </a>
                        <a class="dropdown-item text-center p-0" href="http://localhost/CapWizards/Products/Non-alcoholic/Soft-drink">
                            <div class="menu-yellow">
                                <img src="/CapWizards/assets/svg/soft-drink.svg" alt="Soft drink icon">
                                <h2 class="h2-small h2-bage">Soft drink</h2>
                            </div>
                        </a>
                        <a class="dropdown-item text-center p-0" href="http://localhost/CapWizards/Products/Non-alcoholic/Water">
                            <div class="menu-blue"> 
                                <img src="/CapWizards/assets/svg/Water.svg" alt="Water icon">
                                <h2 class="h2-small h2-bage">Water</h2>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            </div>

            <a class="nav-link" href="http://localhost/CapWizards"> 
              HOME
            </a>
        <!-- Icons -->
            <div>
              <a class="gap-30" href="http://localhost/CapWizards/ShoppingCart" style="margin-left: 80px;"> 
                <img src="/CapWizards/assets/svg/cart.svg" alt="Cart icon">
              </a>

              <?php if (isset($_SESSION['user'])) {
                // Access user information
                $userId = $_SESSION['user']['customerID'];
                $firstName = $_SESSION['user']['firstName'];
                $lastName = $_SESSION['user']['lastName'];
                $userName = $_SESSION['user']['userName'];

              echo "<a href='http://localhost/CapWizards/controllers/LoginController.php?action=logout'>Log out</a>";
            } else {
                echo "<a href='http://localhost/CapWizards/Login'>Log in</a>";
            }
            ?>
            </div>
          </nav>
        </header> 