<!DOCTYPE html>
<html lang="en">
		<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<title></title>
				<meta name="description" content="">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet">
				<link rel="stylesheet" href="/assets/css/site.css">
		</head>
		<body>
			<div class="container-fluid">
				<div class="col-md-10 col-md-offset-1">

					<?php echo form_open('welcome/form_post') ?>
						<div class="form-group">
							<label>First Name</label>
							<input type="text" class="form-control" name="firstname">
						</div>

						<div class="form-group">
							<label>Last Name</label>
							<input type="text" class="form-control" name="lastname">
						</div>

						<div class="form-group">
							<label>Email</label>
							<input type="text" class="form-control" name="email">
						</div>

						<div class="checkbox">
							<label>
								<input type="checkbox" value="1" name="check_me_out"> <strong>Check me out</strong>
							</label>
						</div>

						<button type="submit" id="submit_button" class="btn btn-default">Submit</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Bold fields are required.</small>
					</form>

				</div>
			</div>

			<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
			<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
			<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-growl/1.0.0/jquery.bootstrap-growl.min.js"></script>
			<script src="/assets/js/site.js"></script>
		</body>
</html>