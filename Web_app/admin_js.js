// Rachel Reagan for the base of PHP
// Antoine Gordon for JS to handle PHP and populate admin page
// COP4331 Process of Object Oriented Software Fall 2019

// select Functionality for the inventory table
// maybe to add an update feature



// $( function() {
//    $( "#selectable_body").selectable(
//      {
//      filter: 'tr',
//      selected: function() {
//                   $( ".ui-selected", this ).each(function() {
//                   var value = $(this).attr('value');
//                   });
//     }
//   });
//  });

// to view a single comics more detail, does a get request, populate the modal
// and shows it
function view_single_comic(id){
    $.ajax({
     type: "GET",
     url: "../site_admin/view_single_comic.php",
     data: {comic_id: id},
     cache:false,
     dataType:"json",
     success: function(data){
       document.getElementById("comic_holder").innerHTML = data.comic_name;
       document.getElementById("art_holder").innerHTML = data.artist;
       document.getElementById("pub_holder").innerHTML = data.publisher;
       document.getElementById("price_holder").innerHTML = data.price;
       document.getElementById("quan_holder").innerHTML = data.quantity;
       document.getElementById("wri_holder").innerHTML = data.writer;
       document.getElementById("description").innerHTML = data.description;
        $('#view_comic').modal('show');
    },
     error: function(err){
       alert("Error getting fields for comics modal view");
       console.log(err);
     }
   });
 }

// drop down for publisher in the add comic modal
function drop_down_publisher(order, index){

    // Find a <table> element with id="myTable":
var table = document.getElementById("publisher_selecter");
var opt = document.createElement('option');
 // Create an empty <tr> element and add it to the 1st position of the table:
 opt.value = order[0]; // id of publisher
 opt.innerHTML = order[1]; // name of publisher
 table.add(opt);
}
// drop down for artist for add comic modal
function drop_down_artist(order, index){

    // Find a <table> element with id="myTable":
var table = document.getElementById("artist_selecter");
var opt = document.createElement('option');
 // Create an empty <tr> element and add it to the 1st position of the table:
 opt.value = order[0]; // id for artist
 opt.innerHTML = order[1]; // name of artist
 table.add(opt);
}
// drop down for writer for add writer modal
function drop_down_writer(order, index){

    // Find a <table> element with id="myTable":
var table = document.getElementById("writer_selecter");
var opt = document.createElement('option');
 // Create an empty <tr> element and add it to the 1st position of the table:
 opt.value = order[0]; // id for writer
 opt.innerHTML = order[1]; // string of writers name
 table.add(opt);
}


 $(document).ready(function(){
   field_for_comic();
     return false;
   });


 function field_for_comic(){
    $.ajax({
     type: "GET",
     url: "../site_admin/comic_modal.php",
     cache:false,
     dataType:"json",
     success: function(data){
       // A 3D ARRAY that holds the 2d arrays for publisher, artist, and writer
       // which holds a 1d array for each item
       data[0].forEach(drop_down_publisher);
       data[1].forEach(drop_down_artist);
       data[2].forEach(drop_down_writer);
    },
     error: function(err){
       alert("Error getting fields for comics");
       console.log(err);
     }
   });
 }

 $(document).ready(function(){
   table_for_order();
     return false;
   });

 function table_for_order(){
    $.ajax({
     type: "GET",
     url: "../site_admin/view_order.php",
     cache:false,
     success: function(data){
       console.log("before json " +  data);
       var tem1 = JSON.parse(data);
       console.log(tem1);
       tem1.forEach(parse);
       //data.forEach(table_row_order);
    },
     error: function(err){
       alert("Error getting order list!");
       console.log(err);
     }
   });
 }
 function parse(data) {
   data.items = JSON.parse(data.items);

 }
// to view orders
 function table_row_order(order, index){

    // Find a <table> element with id="myTable":
 var table = document.getElementById("order_list");
 // Create an empty <tr> element and add it to the 1st position of the table:
  var tbl = document.createElement("table");
  var tblHead = tbl.createTHead();
  var thRow = tblHead.insertRow(0);
  var cell1 = thRow.insertCell(0);
  var cell2 = thRow.insertCell(1);
  var cell3 = thRow.insertCell(2);
  cell1.innerHTML = "<th>Order Date</th>";
  cell2.innerHTML = "<th>Email</th>";
  cell3.innerHTML = "<th>Total</th>";


  var thdata = tblHead.insertRow(1);
  var cell1d = thdata.insertCell(0);
  var cell2d = thdata.insertCell(1);
  var cell3d = thdata.insertCell(2);

  cell1.innerHTML = order.order_date ;
  cell2.innerHTML = order.customer_email;
  cell3.innerHTML =  order.total;


  var tblBody = document.createElement("tbody");
  tbl.appendChild(tblBody);

  for(var i = 0 ;i < order.items.length; i++)
  {
    var row = tblBody.insertRow();
    var name = row.insertCell(0);
    var num = row.insertCell(1);
    name.innerHTML =order.items[i].comic;
    num.innerHTML = order.items[i].quantity;
  }
  $(tbl).appendTo($('#order_list'));
}


 $(document).ready(function(){
   get_inventory();
     return false;
   });

// to get a list of all the inventory of the shop
 function get_inventory(){
    $.ajax({
     type: "GET",
     url: "../site_admin/inventory.php",
     cache:false,
     dataType:"json",
     success: function(data){
      data.forEach(table_row);
    },
     error: function(){
       alert("Error getting inventory!");
     }
   });
 }

// the forEach method to do each row
 function table_row(comic, index){

    // Find a <table> element with id="myTable":
 var table = document.getElementById("selectable_body");
 // Create an empty <tr> element and add it to the 1st position of the table:
 var row = table.insertRow(index);
 row.setAttribute("value",comic.comic_id)
 // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
 var publisher = row.insertCell(0);
 var author = row.insertCell(1);
 var artist = row.insertCell(2);
 var title = row.insertCell(3);
 var quantity = row.insertCell(4);
 // creating button to point to modal's get method to show the modal of the details
 var button = row.insertCell(5);
 var x = document.createElement("button");
 x.setAttribute("onclick",  "view_single_comic(" + comic.comic_id + ")");
 button.appendChild(x);

 // Add some text to the new cells:
 publisher.innerHTML = comic.publisher;
 author.innerHTML = comic.writer;
 artist.innerHTML = comic.artist;
 title.innerHTML = comic.comic_name;
 quantity.innerHTML = comic.quantity;
}

 $(document).ready(function(){
 	$("#artistForm").submit(function(event){
 		submitForm_artist();
 		return false;
 	});
 });

// api call for submit artist
 function submitForm_artist(){
 	 $.ajax({
 		type: "POST",
 		url: "../site_admin/add_artist.php",
 		cache:false,
 		data: $('form#artistForm').serialize(),
 		success: function(response){
 			//$("#artist").html(response)
 			$("#add_artist").modal('hide');
      alert( "Successfully added an Artist");
      location.reload(true);
 		},
 		error: function(){
 			alert("Error");
 		}
 	});
 }

  $(document).ready(function(){
  	$("#authorForm").submit(function(event){
  		submitForm_author();
  		return false;
  	});
  });

// api call for adding author
  function submitForm_author(){
  	 $.ajax({
  		type: "POST",
  		url: "../site_admin/add_writer.php",
  		cache:false,
  		data: $('form#authorForm').serialize(),
  		success: function(response){
  			//$("#artist").html(response)
  		$("#add_author").modal('hide');
       alert("Successfully added an Writer");
       location.reload(true);
  		},
  		error: function(){
  			alert("Error adding writer");
  		}
  	});
  }


  $(document).ready(function(){
  	$("#publisherForm").submit(function(event){
  		submitForm_publisher();
  		return false;
  	});
  });

// api call to add publisher
  function submitForm_publisher(){
  	 $.ajax({
  		type: "POST",
  		url: "../site_admin/add_publisher.php",
  		cache:false,
  		data: $('form#publisherForm').serialize(),
  		success: function(response){
  			//$("#artist").html(response)
  		$("#add_publisher").modal('hide');
        alert( "Successfully added a Publisher");
        location.reload(true);
  		},
  		error: function(){
  			alert("Error adding publisher");
  		}
  	});
  }


    $(document).ready(function(){
    	$("#comicForm").submit(function(event){
    		submitForm_comic();
    		return false;
    	});
    });

// api call to add comics
    function submitForm_comic(){
      var img = $('input[name="image"]').get(0).files[0];
      var formData = new FormData(document.getElementById("comicForm"));
      formData.append('image', img);

    	 $.ajax({
    		type: "POST",
    		url: "../site_admin/add_comic.php",
    		cache:false,
        contentType: 'multipart/form-data',
    		data: formData,
        processData: false,
        contentType: false,
    		success: function(response){
    			//$("#artist").html(response)
    		$("#add_comic").modal('hide');
        alert( "Successfully added a comic");
        location.reload(true);
    		},
    		error: function(err){
    			alert(err);
    		}
    	});
    }
