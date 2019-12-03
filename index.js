
$('.carousel').carousel();

const proxyurl = "https://cors-anywhere.herokuapp.com/"

var option = {
mode: 'cors',
Headers: new Headers({'Content-Type': 'application/json',
'Access-Control-Allow-Origin': 'http://127.0.0.1:3000/dashboard.html',
'Access-Control-Allow-Credentials': 'true'})
};


async function get(url, tableID)
{
  var data;
  var com;
  try {
    await fetch(proxyurl + url).then(async function(res){
    data = await res.json();
    com = data.comics;
    com.forEach(res => insert_table(res, tableID));
    console.log(data.comics);
  });
  } catch(err) {
    console.log(err); // Failed to fetch
  }
}
get('https://api.shortboxed.com/comics/v1/new', "table_content1");
get('https://api.shortboxed.com/comics/v1/previous', "table_content2");

function insert_table(item, tableID)
{
    // Find a <table> element with id="myTable":
    var table = document.getElementById(tableID);

    // Create an empty <tr> element and add it to the 1st position of the table:
    var row = table.insertRow();

    // Insert new cells (<td> elements) at the 1st and 2nd position of the "new" <tr> element:
    var publish = row.insertCell(0);
    var title = row.insertCell(1);
    var date = row.insertCell(2);

    // Add some text to the new cells:
    publish.innerHTML = item.publisher;
    title.innerHTML = item.title;
    date.innerHTML = item.release_date;

}