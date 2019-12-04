<?php # dashboard for admins
session_start();
$page_title = 'Welcome!';

if (!isset($_SESSION['first_name'])) {

	$url = '../index.php';
	ob_end_clean();
	header("Location: $url");
	exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <!-- Popper JS -->
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <script src="./admin_js.js"></script>
      <script type="text/javascript" src="./inputmask.js"></script>
      <script type="text/javascript" src="./input.binding.js"></script>
      <link rel="stylesheet" href="admin.css">
    <title>Admin page</title>
  </head>
  <body>
  <div class="w3-top">
  <a href="./site_admin/logout.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa-sign-out"></i></a>
</div>
<div id="body" class="container-fluid row">
      <div id="left" class="w3-black col-3 align-items-center border border-left-0 padding" style="height:100vh">
        <div class="top-left mb-3">
          <h2>Functionality</h2>
        </div>
        <div class="bottom">
          <div class="row">
            <div class="dropdown container">
              <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Add
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#add_author">
                    Author
                </button>
                <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#add_artist">
                    Artist
                </button>
                <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#add_publisher">
                    Publisher
                </button>
                <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#add_comic">
                    Comic
                </button>
              </div>
            </div>

          </div>

          <div class="list_of_orders">
              <button class="btn btn-primary btn-block col-12" type="button" data-toggle="collapse" data-target="#list_of_order" aria-expanded="false" aria-controls="list_universities">
                   List Of Orders
              </button>
              <div class="collapse" id="list_of_order">
                <table class="u-full-width table">
                  <thead>
                    <tr>
                      <th>Order Histories</th>
                    </tr>
                  </thead>
                  <tbody id="order_list">
                    <tr>
                      <td>dasda</td>
                    </tr>
                  </tbody>
                </table>
              </div>

          </div>


        </div>
    </div>
    <div id="right" class="container-fluid col-9">
        <div class="top-right"></div>
        <div class="bottom">
          <div class="container justify-content-between">
            <table class="table table-responsive table-hover ">
              <thead>
                <tr value="4444">
                  <th>Publisher</th>
                  <th>Author</th>
                  <th>Artist</th>
                  <th>Title</th>
                  <th>Quantity</th>
                  <th>Details</th>
                </tr>
              </thead>
              <tbody id="selectable_body" style="height:900px;overflow:auto;">


              </tbody>

            </table>
          </div>
        </div>
        </div>
    </div>

<!-- for all the modals -->
<!-- Modal -->
<div  class="modal fade" id="add_artist" tabindex="-1" role="dialog" aria-labelledby="adding_artist" aria-hidden="true">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adding_artist">Adding Artist</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="artistForm" name="artist" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="first">First Name:</label><input class="form-control" type="text" id="input_author_first" name="first_name" value="">
          </div>
          <div class="form-group">
            <label for="first">Last Name:</label><input  class="form-control" type="text" id="input_author_last" name="last_name" value="">
          </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Add</button>
    </div>
  </form>
  </div>
</div>

<div class="modal fade" id="add_author" tabindex="-1" role="dialog" aria-labelledby="adding_author" aria-hidden="true">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adding_author">Adding Author</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="authorForm" name="author"  method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="first">First Name:</label><input class="form-control" type="text" id="input_author_first" name="first_name" value="">
          </div>
          <div class="form-group">
            <label for="first">Last Name:</label><input class="form-control" type="text" id="input_author_last" name="last_name" value="">
          </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Add</button>
      </div>
  </form>
  </div>
</div>


<div  class="modal fade" id="add_publisher" tabindex="-1" role="dialog" aria-labelledby="adding_publisher" aria-hidden="true">
  <div  class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="adding_publisher">Adding Publisher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="publisherForm" name="publisher"  method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="input_publisher">Publisher</label>
            <input type="text" class="form-control" name="publisher_name"/>
          </div>
        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Add</button>
      </div>
  </form>
  </div>
</div>


<div class="modal fade" id="add_comic" tabindex="-1" role="dialog" aria-labelledby="add_comic_label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_comic_label">Add a Comic</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- comic name, image(upload). artist, writer, Publisher, price, quantity, description, released, recommended -->
      <form enctype="multipart/form-data" id="comicForm" name="comic" method="post">
          <div class="form-group">
            <label for="comic_name">Comic Name:</label><input class="form-control" type="text" name="comic_name" value="">
          </div>
          <div class="form-group">
            <label for="image_upload">Image</label>
            <input type="file" class="form-control-file" name="image"/>
          </div>
          <div class="form-group">
            <label for="artist_selecter">Artist</label>
                  <select class="form-control" id="artist_selecter" name="artist">

                  </select>
          </div>

          <div class="form-group">
            <label for="writer_selecter">Writer</label>
                  <select class="form-control" id="writer_selecter" name="writer">

                  </select>
          </div>
          <div class="form-group">
            <label for="publisher_selecter">Publisher</label>
                  <select class="form-control" id="publisher_selecter" name="publisher">

                  </select>
          </div>
          <div class="form-group">
            <label for="Price">Price</label>
            <input type="number" class="form-control text-left" name="price">
          </div>
          <div class="form-group">
            <label for="quanity">Quantity</label>
            <input class="form-control" type="number" min="0" name="quan" placeholder="0" value="">
          </div>
          <div class="form-group">
            <label for="desription">Description</label>
            <textarea name="description" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <label for="release">Release?</label>
            <div class="form-group">
                  <label class="radio-inline">
                  <input type="radio" name="rel" value="1">Released
                </label>
                <label class="radio-inline">
                  <input type="radio" name="rel" value="0">Not Release
                </label>
            </div>
          </div>
          <div class="form-group">
            <label for="recommendation">Recommended</label>
            <div class="form-group">
                  <label class="radio-inline">
                  <input type="radio" name="rec" value="1">YES
                </label>
                <label class="radio-inline">
                  <input type="radio" name="rec" value="0" >NO
                </label>
            </div>

          </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" id="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
  </div>
    </div>
  </div>

  <div class="modal fade" id="view_comic" tabindex="-1" role="dialog" aria-labelledby="view_comic_single" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="view_comic_header">View Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <!-- comic name, image(upload). artist, writer, Publisher, price, quantity, description, released, recommended -->
            <div class="form-group">
              <label for="comic_name">Comic Name:</label>
              <label id="comic_holder"></label>
            </div>
            <div class="form-group">
              <label for="artist_selecter">Artist</label>
              <label id="art_holder"></label>
            </div>

            <div class="form-group">
              <label for="writer_selecter">Writer</label>
              <label for=""id="wri_holder"></label>
            </div>
            <div class="form-group">
              <label for="publisher_selecter">Publisher</label>
              <label id="pub_holder"></label>
            </div>
            <div class="form-group">
              <label for="Price">Price</label>
              <label id="price_holder"></label>
            </div>
            <div class="form-group">
              <label for="quanity">Quantity</label>
                <label id="quan_holder"></label>
            </div>
            <div class="form-group">
              <label for="desription">Description</label>
              <textarea id="description" class="form-control" disabled></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
      </div>


  </body>
</html>
