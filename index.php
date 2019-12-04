<!doctype html>
<html lang="en">
<title>Comic Cave</title>
<meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="home.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}

/* width */
::-webkit-scrollbar {
  width: 7px;
}

/* Track */
::-webkit-scrollbar-track {
  background: #000; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
  background: #FFF; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
  background: #FFF; 
}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">

    <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="#up" class="w3-bar-item w3-button w3-padding-large w3-hide-small">UPCOMING RELEASES</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
  </div>
  <a href="./site_admin/login.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa-sign-in"></i></a>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
<a href="#up" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">UPCOMING RELEASES</a>

  <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
</div>

<!-- Page content -->


  <!-- Home Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="cc">
    <h2 class="w3-wide">COMIC CAVE</h2>
    <p class="w3-opacity"><i>Download our app to browse our inventory</i></p>
    <p class="w3-center">We carry comics from multiple publishers and we are constantly updating our inventory. <br/>If we don't have what you're looking for email us your request and we will do what we can to order it for you!</p>
    <div class="w3-row w3-padding-64">
		<div class="w3-col " style="width:20%">
        	<img src="./pub_img/dc.png" class="w3-round w3-margin-bottom" alt="DC">
		</div>
      	<div class="w3-col" style="width:20%">
        	<img src="./pub_img/dh.jpg" class="w3-round w3-margin-bottom" alt="Dark Horse">
      	</div>
		<div class="w3-col" style="width:20%">
        	<img src="./pub_img/marvel.png" class="w3-round" alt="Marvel">
		</div>
		<div class="w3-col" style="width:20%">
        	<img src="./pub_img/idw.png" class="w3-round" alt="IDW">
		</div>
		<div class="w3-col" style="width:20%">
        	<img src="./pub_img/viz.jpg" class="w3-round" alt="Viz">
      	</div> 
    </div>
  </div>
  
  <!-- The Upcoming Section -->
	<div class="w3-black" id="up">
    	<div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      		<h2 class="w3-wide w3-center">UPCOMING RELEASES</h2>
      		<p class="w3-opacity w3-center"><i>Remember to check in on Wednesdays!</i></p><br>
      			<div class="w3-row-padding w3-padding-10" >
					<div class= "tablecontent">	
						<table class="a" align="center">
							<tbody id='table_content1'>
								<tr>
									<th>Publisher</th>
									<th>Title</th>
									<th>Date</th>
								</tr>
							</tbody>
						</table>
					</div>
      			</div>
      	</div>
  	</div>
 
  <!-- The Contact Section -->
	<div class="w3-container w3-content w3-padding-64" style="max-width:800px" id="contact">
		<h2 class="w3-wide w3-center">CONTACT</h2>
		<p class="w3-opacity w3-center"><i>Get in touch!</i></p>
		<div class="w3-row w3-padding-32">
			<div class="w3-col m6 w3-large w3-margin-bottom">
              <i class="fa fa-map-marker" style="width:30px"></i> Orlando, US<br>
              <i class="fa fa-phone" style="width:30px"></i> Phone: (407) 930-2237<br>
              <i class="fa fa-envelope" style="width:30px"> </i> Email: comic_cave@mail.com<br>
			</div>
			<div class="w3-col m6">
      		  <div class="w3-half">
        		<img src="./pub_img/play.png" class="w3-round w3-margin-bottom" alt="google play">
        		</div>
              <div class="w3-half">
        		<img src="./pub_img/apple.png" class="w3-round w3-margin-bottom" alt="apple">
        	  </div>
      		</div>
      </div>
  </div>
  
<!-- End Page Content -->
<script src="index.js"></script>
<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>
</body>
</html>