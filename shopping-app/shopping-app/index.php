<?php

include 'header.php';
require_once 'config.php';


?>

    <div id="home">
      <div class="jumbotron" style="margin-bottom: 0">
        <div class="text-center">
          <h1>Welcome to <i>Buy Something</i></h1>
        </div>
        <div class="row">
          <div class="offset-1 col-10">
            <p>
              We sell stuff, things, gadgets, gizmos, software, hardware, and
              even more stuff and things.
            </p>
            <button class="btn btn-primary">See stuff</button>
          </div>
        </div>
      </div>

      <div id="items" class="container" style="margin-top: 30px">
        <form id="search">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <select class="form-control" id="exampleFormControlSelect1">
                  <option>Item Filter</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
                </select>
              </div>
            </div>
            <div class="col-md-9">
              <div class="row">
                <div class="col-9">
                  <div class="form-group">
                    <input
                      class="form-control"
                      type="text"
                      name="search"
                      placeholder="Search"
                    />
                  </div>
                </div>
                <div class="col-3">
                  <button class="btn btn-primary" type="submit">Submit</button>
                </div>
              </div>
            </div>
          </div>
        </form>
        <div class="row">
          <?php
            $sql = "SELECT item_id, title, description, price, picture_url FROM items;";

            if($result = $mysqli->query($sql)){
              while($row = $result->fetch_object()){
                echo "
                <div class='col-md-6 col-12 text-center' style='padding-bottom: 50px'>
                <div class='card' style='width: 75%'>
                <img src='$row->picture_url' class='card-img-top' alt='...' />
                <div class='card-body'>
                <h5 class='card-title'>$row->title</h5>
                <p class='card-text'>$row->description</p>
                <span>
                  $$row->price";
                  if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
                    echo "
                      <button class='btn btn-primary add_to_cart' data-id='$row->item_id' >Add to Cart</button>
                    ";
                  };
                echo "</span>
                </div>
                </div>
                </div>
                ";
              }
            } else {
              echo nl2br("\nERROR: Failed to execute $sql. " . mysqli_error($mysqli));
          }
              
          ?>
        </div>
      </div>
    </div>


<?php

include 'footer.php';

?>