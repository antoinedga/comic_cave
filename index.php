<!DOCTYPE html>
<html lang="en">
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="#up" class="w3-bar-item w3-button w3-padding-large w3-hide-small">UPCOMING RELEASES</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>

    </div>
    <a href="./site_admin/login.php" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa-sign-in"></i></a>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
<a href="#up" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">UPCOMING RELEASES</a>

  <a href="#contact" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">CONTACT</a>
</div>

<!-- Page content -->


  <!-- Home Section -->
  <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="band">
    <h2 class="w3-wide">COMIC CAVE</h2>
    <p class="w3-opacity"><i>Download our app to browse our inventory</i></p>
    <p class="w3-center">We carry comics from multiple publishers. <br/>If we don't have what you're looking for, fill out the contact form with your request and we will order it for you!</p>
    <div class="w3-row w3-padding-32">
	 <div class="w3-col" style="width:20%">
        <img src="./pub_img/dc.png" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
      </div>
		<div class="w3-col" style="width:20%">
        <img src="./pub_img/dh.png" class="w3-round w3-margin-bottom" alt="Random Name" style="width:60%">
      </div>
		<div class="w3-col" style="width:20%">
        <img src="./pub_img/marvel.png" class="w3-round" alt="Random Name" style="width:60%">
		</div>
		<div class="w3-col" style="width:20%">
        <img src="./pub_img/idw.png" class="w3-round" alt="Random Name" style="width:60%">
		</div>
		<div class="w3-col" style="width:20%">
        <img src="./pub_img/viz.jpg" class="w3-round" alt="Random Name" style="width:60%">
      </div> 
    </div>
  </div>

  <!-- The Upcoming Section -->
  <div class="w3-black" id="up">
    <div class="w3-container w3-content w3-padding-64" style="max-width:800px">
      <h2 class="w3-wide w3-center">UPCOMING RELEASES</h2>
      <p class="w3-opacity w3-center"><i>Remember to check in on Wednesdays!</i></p><br>

      <div class="w3-row-padding w3-padding-32" style="margin:0 -16px">
			<p> put upcoming comics here</p>
        </div>
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
			<form action="/action_page.php" target="_blank">
				<div class="w3-row-padding" style="margin:0 -16px 8px -16px">
				<div class="w3-half">
					<input class="w3-input w3-border" type="text" placeholder="Name" required name="Name">
				</div>
				<div class="w3-half">
					<input class="w3-input w3-border" type="text" placeholder="Email" required name="Email">
				</div>
				</div>
				<input class="w3-input w3-border" type="text" placeholder="Message" required name="Message">
				<button class="w3-button w3-black w3-section w3-right" type="submit">SEND</button>
			</form>
		</div>
		</div>
	</div>
  
<!-- End Page Content -->
</div>


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
