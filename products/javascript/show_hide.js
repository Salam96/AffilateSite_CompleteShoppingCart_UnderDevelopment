//loading different contents in a div
function open_new_content(hrefer){
  var split_arr = hrefer.split('#');
  var req_url = "../controller/admin_menu.php?page=" + split_arr[1];
  console.log(req_url);
  $("#content_frame").load(req_url);
}


function show_products()
{
  console.log(show_products);
  if(document.getElementById('products_section').clicked === true);
  {
    document.getElementById('basket').style.display = 'none';
    document.getElementById('Newsletter').style.display = 'none';
    document.getElementById('Contact_us').style.display = 'none';
    document.getElementById('About').style.display = 'none';
    document.getElementById('products').style.display = 'block';
  }
}
function show_basket()
{
  if(document.getElementById('basket_section').clicked === true);
  {
    document.getElementById('basket').style.display = 'block';
    document.getElementById('Newsletter').style.display = 'none';
    document.getElementById('Contact_us').style.display = 'none';
    document.getElementById('About').style.display = 'none';
    document.getElementById('products').style.display = 'none';
  }
  $.ajax({
    url: '../controller/basket.php',
    method: 'POST',
    datatype: 'json',
    success: function(data){
    }
  });
}
function show_basket()
{
  
  if(document.getElementById('basket_section').clicked === true);
  {
    
    document.getElementById('basket').style.display = 'block';
    document.getElementById('Newsletter').style.display = 'none';
    document.getElementById('Contact_us').style.display = 'none';
    document.getElementById('About').style.display = 'none';
    document.getElementById('products').style.display = 'none';
  }
}

