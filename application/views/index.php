<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>QR Code</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<h2>Add QR</h2>
			<div class="row">
				<form class="col-md-6" method="POST" action="<?=base_url('welcome/generate')?>">
					<div class="row">
						<div class="col-md-12 ">
							<label for="">Name:</label>
							<input type="text" name = "name" class="form-control">
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 ">
							<label for="">Data:</label>
							<input type="text" name = "data" class="form-control">
						</div>
						
					</div>	

					<div class="row">
						<div class="col-md-12">
							<button class="btn btn-primary form-control">ADD</button>
						</div>
					</div>
				</form>
			</div>
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Data</th>
								<th>QR CODE</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($qr)): ?>
								<?php foreach ($qr as $qk => $qv): ?>
									<tr>
										<td><?=$qv->id?></td>
										<td><?=$qv->name?></td>
										<td><?=$qv->data?></td>
										<td><a target = "_blank" href="<?=base_url('qcode/images/').$qv->path?>.png"><img class = "img-thumbnail" src="<?=base_url('qcode/images/').$qv->path?>.png" alt=""></a></td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
							
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</body>
</html>