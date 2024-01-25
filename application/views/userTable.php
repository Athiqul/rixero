<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users</title>
	 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

	
<div class="container">        
  <table class="table">
		<tr>
			<th>Sr no.</th>
			<th>Name</th>
			<th>Username</th>
			<th>Password</th>
		</tr>
		<tr>
		<td>1</td>
		<td>Absolute Soft System</td>
		<td><?php echo $absusername;?></td>
		<td><?php echo $absPassword;?></td>
	</tr>
	<?php $i=1;
	foreach ($userdata as $key => $value) {
		$i++;
		?>
	<tr>
		<td><?php echo $i;?></td>
		<td><?php echo $value['name'];?></td>
		<td><?php echo $value['username'];?></td>
		<td><?php echo $value['password'];?></td>
		
	</tr>
<?php } ?>
	</table>
</div>

</body>
</html>