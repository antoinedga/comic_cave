
const proxyurl = "https://cors-anywhere.herokuapp.com/"

var option = {
mode: 'cors',
Headers: new Headers({'Content-Type': 'application/json',
'Access-Control-Allow-Origin': 'http://127.0.0.1:3000/dashboard.html',
'Access-Control-Allow-Credentials': 'true'})
};


async function get()
{
  var data;
  try {
    await fetch(proxyurl + 'https://api.shortboxed.com/comics/v1/new').then(async function(res){
    data = await res.json();
    console.log(data);
  });
  } catch(err) {
    console.log(err); // Failed to fetch
  }
}

get();


function current_table()
{

}
