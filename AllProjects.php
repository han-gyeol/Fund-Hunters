<!-- Home Page -->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width = device-width, initial-scale = 1">
<title>FundHunter</title>

<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<?php
  session_start();
?>

<style>
.jumbotron{
    background-color:#2C3539;
    color:white;
    padding-bottom: 80px;
}
/* Adds borders for tabs */
.tab-content {
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: 1px solid #ddd;
    padding: 10px;
}
.logo{
	padding: 5px;
}
.nav-tabs {
    margin-bottom: 0;
}
.col-centered{
    float: none;
    margin: 0 auto;
}
.carousel{
    background: #2f4357;
    margin-top: 20px;
}
.carousel-caption-middle{
    top: 50%;
	transform: translateY(-50%);
	bottom: initial;
}
.carousel-big-text {
	font-size: 55px;
   	line-height: 1;
}
.carousel-med-text {
	font-size: 30px;
  line-height: 1;
}
.carousel-small-text {
	font-size: 21px;
  line-height: 1;
}
.carousel .item img{
    margin: 0 auto; /* Align slide image horizontally center */
}
.item{
	-webkit-transform-style: preserve-3d;
	-moz-transform-style: preserve-3d;
	transform-style: preserve-3d;
}
.bs-example{
	margin: 20px;
}
.carousel-inner > .item > img {
  height:750px;
  width:100%;
}
.black-font{
	color: #000000;
}
.project-img{
  height:180px;
  max-width:340px;
}
.thumbnail{
	height:390px;
	width:350px;
	margin-left: 40px;
}
.my-footer{
	position: absolute;
	width:100%;
	bottom:15;
	height:50px;
}
.my-footer-past{
	height:70px;
}
.text-title{
	font-size:16px;
	line-height: 1.2;
	font-weight: bold;
}
.text-strong{
	font-weight: bold;
	font-size:12.5px;
	line-height: 0.5;
}
.progress{
	height:10px;
	margin-bottom:4px;
	width:340px;
}
</style>
</head>

<body>
<?php
    require('dbconn.php');
?>

<?php
    require('NavigationBar.php');
?>

<div class="container">
	<h3>All projects</h3><hr>
	<div class='row'>
	<?php
        $query = "SELECT * FROM thumbnail_info";
        $result = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());
        $date_today = date("Ymd");
        while ($row = pg_fetch_row($result)) {
          $title = $row[0];
          $description = $row[1];
          $id = $row[2];
          $logo_url = $row[3];
          $owner_name = $row[4];
          $start_date = $row[5];
          $end_date = $row[6];
          $target_amount = number_format($row[7]);
    	  $current_amount = number_format($row[8]);
    	  $publisher_email = $row[9];

    	  $current_date = date("Y/m/d");

    	  $days_left = ceil(abs(strtotime($end_date) - strtotime($current_date)) / 86400);
    	  $progress = round ( (((float)((int)$row[8] / (int)$row[7])) * 100), 0);

    	  $query = "SELECT COUNT(*)
        			FROM projects p, investments i
        			WHERE p.project_id = i.project_id AND p.project_id = '$id'";
          $result_two = pg_query($dbconn, $query) or die('Query failed: ' . pg_last_error());
          $num_investor = pg_fetch_result($result_two, 0, 0);

		  echo "
			<div class='thumbnail col-lg-3 col-md-3 col-sm-4 col-xs-6'>
				<div>
				<a href='ProjectProfile.php?id=$id'>
					<img class= 'img-rounded btn center-block' src='$logo_url' style='height:180px; max-width:340px;'></a>
				</div>
				<div class='caption'>
					<p><a class='text-title black-font' href='ProjectProfile.php?id=$id'>$title</a></p>
					<p>
						<a class='text-title black-font'>by</a>
						<a class='text-title black-font' href='UserProfile.php?email=$publisher_email'>$owner_name</a>
					</p>
					<p class='text-justify'>$description</p>
				</div>";
			if(strtotime($date_today) > strtotime($end_date)) { //Time elapsed case
				echo "
				<div class='my-footer-past'><hr>
					<div class='caption'>
						<div class='col-lg-9'>
							<p class='text-strong'>$$current_amount</p>
							<p class='text-narrow'>invested of $$target_amount target</p>
						</div>  
						<div class='col-lg-3'>
							<p class='text-strong'>$num_investor</p>
							<p class='text-narrow'>investors</p>
						</div>
					</div>
				</div>
			</div>";
		    } else {	//Still funding case
		    	echo "
		    	<div class='my-footer'>
		    		<div class='progress'>";
		    	if ($progress >= 100) {
		    		echo "
		        		<div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow=$progress aria-valuemin='0' aria-valuemax='100' style='width: $progress%'></div>";
		        } else {
		        	echo "
		        		<div class='progress-bar' role='progressbar' aria-valuenow=$progress aria-valuemin='0' aria-valuemax='100' style='width: $progress%'></div>";
		        }
		      	echo"
		      		</div>
		    		<div class='caption'>
		    			<div class='col-lg-4'>
		    				<p class='text-strong'>$progress %</p>
		    				<p class='text-narrow'>funded</p>
		    			</div>
		    			<div class='col-lg-4'>
							<p class='text-strong'>$$current_amount</p>
							<p class='text-narrow'>invested</p>
						</div>  
		    			<div class='col-lg-4'>
		    				<p class='text-strong'>$days_left</p>
		    				<p class='text-narrow'>days to go</p>
		    			</div>
		    		</div>
		    	</div>
		    </div>";
			}
        }
     ?>
	</div>
</div>

<br>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>
