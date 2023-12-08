<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="/CapWizards/assets/css/main.css">
        <script src="/assets/amountCounter.js" defer></script>
        <title>Document</title>
    </head>
    <body>
         <!-- Header -->
         <header>
         <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- Product categories -->

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

      <!-- Logo -->

      <li class="nav-item">
        <a class="nav-link" href="http://localhost/CapWizards" style="margin-left: 720px !important;"> <!-- Change this to a better option to center the logo-->
          LOGO
        </a>
      </li>

      <!-- User actions -->

      <li>

      <?php 
        require_once ("./views/shared/session.php");
        require_once("././dataaccess/db/DBConnector.php");
      ?>
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
</header>