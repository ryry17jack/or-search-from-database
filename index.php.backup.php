	<?php 
		header("Content-Type: text/html;charset=UTF-8");
		include 'config.inc.php';
		//$sql = "SELECT S_code , S_name FROM data";
		//$result = $conn->query($sql);

		$output = '';

		if(isset($_POST['search'])) {
			$searchq = $_POST['search'];
			//$searchq = preg_replace("#[^0-9a-z]#i", "", $searchq);

			$query = "SELECT * FROM data WHERE S_name LIKE '%$searchq%' " or die("could not search");
			//$count = mysqli_num_rows($query);
			$sql = mysqli_query($conn, $query);
			$count = mysqli_num_rows($sql);

			if($count == 0){
				$output = 'There was 0 results!';
			}else{
 				while($row = mysqli_fetch_array($sql)){
 					$scode = $row['S_code'];
 					$sname = $row['S_name'];

 					$output .= '<tr>
                  					<th scope="row">' . $scode. '</th>
                  					<td>' . $sname.'</td>
                				</tr>
                				
					';
 				}
			}
		}

	 ?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>OR Search</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Kanit|Trirong" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<style>
		@import url('https://fonts.googleapis.com/css?family=Kanit|Pridi:300');
		body {
  			font-family: 'Pridi', serif;
  			font-size: 20px;
		}
		.kanit {
  			font-family: 'Kanit', sans-serif;
  			font-size: 40px;
		}
		.kanit2 {
			font-family: 'Kanit', sans-serif;
			font-size: 13px;
		}
	</style>
</head>
<body>
	<div class="container">

		
  <div class="row">
    <div class="col col-lg-4">
      <h1 class="kanit"><i class="fas fa-terminal"></i>&nbsp;ระบบค้นหาข้อมูล</h1>
    </div>
    <div class="col col-lg-8" id="searchfrm1">
      <form action="index.php.backup.php?search" name="searchform" method="post">
			<div class="input-group mb-3 input-group-lg">
  				<input type="search" class="form-control" placeholder="ระบุคำที่ต้องการค้นหา..." aria-label="ระบุคำที่ต้องการค้นหา..." aria-describedby="basic-addon2" name="search">
  				<div class="input-group-append">
    				<button type="submit" class="btn btn-outline-info"><i class="fas fa-search"></i>&nbsp;ค้นหา</button>
  				</div>
			</div>
		</form>
    </div>
  </div>


		
		<p class="kanit2 text-muted">&copy; Copyright 2018 - Develop by Group 4 [Algorithm Analysis].</p>
		
			
		
		
	


			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col" width="10%">ID</th>
						<th scope="col" width="90%">ข้อมูล</th>
					</tr>
				</thead>
				<tbody>
					<?php 

						print("$output");
					?>
				</tbody>
			</table>
		</center>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>