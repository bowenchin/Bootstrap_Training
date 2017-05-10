<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Sign Up - KEEP</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/keep.css">
	<link rel="stylesheet" href="css/signup.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.7/jq-2.2.4/dt-1.10.15/r-2.1.1/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css" />
	<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
</head>

<!-- Nav bar -->
<nav class="navbar navbar-default navbar-background">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
			<a id="brand" class="navbar-brand" href="/keep.html"><b>KEEP</b></a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li><a href="#">About</a></li>
				<li><a href="#">News & Events</a></li>
				<li><a href="#">Contact Us</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Login</a></li> -->
        <li><a href="/signup.php"><span id="sign-up">Sign Up</span></a></li>
        <li><a href=""><span class="glyphicon glyphicon-search"></span></a></li>
      </ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>

<script>
$(document).ready(function() {
	$('#user').DataTable({
		//responsive: true
	});
} );
</script>

<body>

	<div class="container-fluid">
		<div class="panel panel-default">
		<div class="panel-heading">
			<h3>User Info Table</h3></div>
		<div class="panel-body table-responsive">
			<table id="user" class="table table-striped">
				<thead>
					<tr>
						<th>Salutation</th>
						<th>Given Name</th>
						<th>Surname</th>
						<th>Affilation Name</th>
						<th>Position</th>
						<th>Email</th>
						<th>Phone</th>
						<th>Fax</th>
						<th>Website</th>
						<th>Address</th>
						<th>City</th>
						<th>State</th>
						<th>Postal</th>
						<th>Region</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require('connect.php');
$sql = 'SELECT * FROM login';
$query = mysqli_query($connection, $sql);

					while ($row = mysqli_fetch_array($query))
		{
			echo '<tr>
					<td>'.$row['salutation'].'</td>
					<td>'.$row['first_name'].'</td>
					<td>'.$row['last_name'].'</td>
					<td>'.$row['affiliation'].'</td>
					<td>'.$row['position'].'</td>
					<td>'.$row['email'].'</td>
					<td>'.$row['phone_number'].'</td>
					<td>'.$row['fax_number'].'</td>
					<td>'.$row['website'].'</td>
					<td>'.$row['address'].'</td>
					<td>'.$row['city'].'</td>
					<td>'.$row['state'].'</td>
					<td>'.$row['postal'].'</td>
					<td>'.$row['region'].'</td>
				</tr>';
		}

					?>
				</tbody>
			</table>
		</div>
	</div>
</div>

</body>

</html>
