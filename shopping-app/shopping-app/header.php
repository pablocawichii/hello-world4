<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shopping Cart App</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="./css/main.css" />
  </head>
  <body>
    <div id="hid" style="display: none;"></div>
    <nav
      class="navbar navbar-expand-sm sticky-top navbar-light"
      style="background-color: white"
    >
      <a class="navbar-brand" href="./index.php">Buy Something</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link btn" href="./index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn" href="./index.php#items">Items</a>
          </li>
          <?php
            if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
              echo '
                <li class="nav-item">
                  <a class="nav-link btn" href="./checkout.php">Checkout</a>
                </li>
              ';
            }
          ?>
        </ul>
        <div class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <?php 
              if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                  echo '
                  <li>
                  <a
                  tabindex="0"
                  class="btn btn-secondary my-2 my-sm-0 rel"
                  role="button"
                  data-toggle="popover"
                  data-trigger="focus"
                  data-html="true"
                  title="Shopping Cart"
                  >
                  <i class="fa fa-shopping-cart"></i>
                  <div id="fix" class="num" data-count="';
                  

                  
                  echo '"></div>
                  </a>
                  </li>
                  
                  <li class="nav-item">
                  <a class="nav-link btn" href="./logout.php">Logout</a>
                  </li>
                  ';
                } else {
                  echo '
                  <li class="nav-item">
                  <a class="nav-link btn" href="./login.php">Login</a>
                  </li>
              ';
            }
              ?>
          </ul>
        </div>
      </div>
    </nav>

    