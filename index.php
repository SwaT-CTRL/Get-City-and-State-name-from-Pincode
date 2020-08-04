<!DOCTYPE html>
<html lang="en">
<head>
  <title>Get City State from Pincode</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <style> 
   #pincode{width:20.5%;}
.textbox{
  width: 30%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  margin-left:2%;
  background-color: transparent;
  color: #fff;
}

body{
    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(https://images.pexels.com/photos/3769138/pexels-photo-3769138.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500);
    background-size: cover;
    background-position: center;
    height: 100vh;
    overflow-y: hidden;
}



.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    cursor: pointer;
    background-position: center;
    background-size: cover;
    overflow-x: hidden;
    position: relative;
    height: 100vh;
    background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url(https://images.pexels.com/photos/3769138/pexels-photo-3769138.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500);
    border: 1px solid transparent;
    padding: 6px 12px;
    font-size: 14px;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
	height:46px;
	color: #fff;
    background-color: #5cb85c;
    border-color: #000;
	margin-left:2%;
}
h2{font-family:Arial; font-size:30px; text-align:center; color: #fff;}
</style>
</head>
<body>

<div class="box">
	<div><h2>Get City and State from Pincode</h2></div>
	<div>&nbsp;</div>
	<form autocomplete="off" method="post" id="frmPinCode" style="text-align:center;">
		<div>
			<input type="text" class="textbox" name="pincode" id="pincode" placeholder="Enter Pincode"  autocomplete="new-password">
			<input type="button" class="btn" value="Get Details" onclick="get_details()">
		</div>
		<div>&nbsp;</div>
		<div>
			<input type="text" class="textbox" id="city" disabled placeholder="City"><br/><br/>
			<input type="text" class="textbox" id="state" disabled placeholder="State">
		</div>
	</form>
</div>
<script>
function get_details(){
	var pincode=jQuery('#pincode').val();
	if(pincode==''){
		jQuery('#city').val('');
		jQuery('#state').val('');
	}else{
		jQuery.ajax({
			url:'get.php',
			type:'post',
			data:'pincode='+pincode,
			success:function(data){
				if(data=='no'){
					alert('Wrong Pincode');
					jQuery('#city').val('');
					jQuery('#state').val('');
				}else{
					var getData=$.parseJSON(data);
					jQuery('#city').val(getData.city);
					jQuery('#state').val(getData.state);
				}
			}
		});
	}
}
</script>
</body>
</html>
