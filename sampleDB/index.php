<?php
	require 'dbconfig/dbconfig.php';
?>
<!DOCTYPE html>
<html>
<body>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
   background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-image:url(images/flats.jpg);
  
  
}

/* Style the header */
header {
  background-color: #666;
  padding: 30px;
  text-align: center;
  font-size: 35px;
  color: white;
}
label{
	text-size: 12px;
	font-weight: bold;
	color:red;
}

/* Create two columns/boxes that floats next to each other */
form {
  float: left;
  width: 30%;
  background-color:#ccc;
  padding: 20px;
}

/* Style the list inside the menu */
input{
width:100px;
margin:2px;
}

 button{
	 width:50px;
	 margin:2px;
	 background-color: #ccc;
 }
article {
  float: left;
  padding: 20px;
  width: 70%;
  background-color: #f1f1f1;
 
}

img{
	width:100%;
	height:150px;
}

.row {
  display: flex;
}

.column {
  flex: 33.33%;
  padding: 5px;
}

#border-details:
{
	border:1px solid blue;
}
/* Clear floats after the columns */
section:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the footer */
footer {
  background-color: #777;
  padding: 10px;
  text-align: center;
  color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
  form ,article {
    width: 100%;
    height: auto;
  }
}
</style>

<header>
   <h2 class="welcome" style="background-color:blue">
		<h1 style="size:20px;color:red;">Welcome to the rental page</h1>
   </h2>
    
   
</header>
   <div>
   	
  </div>
<section>
  <form action="index.php" method="post">
		<label>Type: <input type="text" id="type" name="ftype"></label><br>
        <label>Location:<input type="text" id="location" name="flocation"></label><br>
		<button type="submit" id="btn_check" name="btn_check" value='true'>check</button>
	</form>
	
  <article>
    <h1>What are you looking for?</h1>
	
	<h4>High Response Rate</h4>
	<p>We pick sellers for you who give you priority. Over 90% of our top sellers respond to enquiries within the first 24 hours!</p>
	<h4>Wide Coverage</h4>
	<p>Sellers with a wide variety of properties are more likely to satisfy your demands. More the options, better is your decision</p>
	<p>Since looking for apartments have led you to us we won't dissappoint you!<p>
	<div class="row">
  <div class="column">
    <img src="images/img1.jpg" alt="living-room">
  </div>
  <div class="column">
    <img src="images/img2.jpg" alt="1bhk">
  </div>
  <div class="column">
    <img src="images/img3.jpg" alt="dinink-room">
  </div>
</div>
<div class="border-details">
	<hr>
	<?php
	if(isset($_POST['btn_check'])){
		//echo "<script type='text/javascript'>alert('insert clicked')</script>";
	$ptype = $_POST['ftype'];
	strtolower($ptype);
	$plocation = $_POST['flocation'];
	strtolower($plocation);
	 
	if($ptype=="" || $plocation=="")
	{
		echo "<script type='text/javascript'>alert('insert values in all fields')</script>";
	}
	else
	{
		$query = "select name, location, email, contact, rent, description, flattype from ownerdetails where lower(flattype) = '$ptype' and lower(location) like '%$plocation%' ";
		$result = mysqli_query($con,$query);
		if($result)
		{
			if(mysqli_num_rows($result)>0) {
			
			while($row = mysqli_fetch_array($result)){
				echo "<p>" . strtoupper($row['flattype']) . "</p>";
				echo "<p>" . $row['location'] . "</p>";
				echo "<p>" . $row['name'] . "</p>";
				echo "<p>" . $row['contact'] . "</p>";
				echo "<p>" . $row['email'] . "</p>";
				echo "<p>" . $row['description'] . "</p>";
				echo "<hr>";
				
			}	
		}	
		else
		{
			echo "0 results";
		}
		}
		else{
			echo "<p> error </p>";
		} 
	}
	}
	
	?>
	</div>
  </article>  
</section>
<footer>
Visit to: @rentforlife
</footer>
</body>
</html>
