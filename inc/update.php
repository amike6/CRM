<!DOCTYPE html>
<html>
<head>
	<title>Update User Information</title>
	<!-- Include Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h1>Update User Information</h1>
		<form method="POST" action="update.php">
			<div class="form-group">
				<label for="name">Name:</label>
				<input type="text" class="form-control" id="name" name="form_name" required>
			</div>
			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="form_email" required>
			</div>
			<div class="form-group">
				<label for="number">Number:</label>
				<input type="text" class="form-control" id="number" name="form_number" required>
			</div>
			<div class="form-group">
				<label for="address">Address:</label>
				<input type="text" class="form-control" id="address" name="form_address" required>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
	<!-- Include Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<?php
// Include database connection details
include_once "conn.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();
	// Get the form input values
	$name = $_POST['form_name'];
	$email = $_POST['form_email'];
	$number = $_POST['form_number'];
	$address = $_POST['form_address'];

	// Build the SQL query to update the user information
	$sql = "UPDATE fake_users SET name='$name', email='$email', number='$number', address='$address' WHERE id=".$_SESSION["ID"];; // Replace id=1 with your own WHERE clause

	// Execute the SQL query
	if (mysqli_query($conn, $sql)) {
		session_destroy();
		echo "User information updated successfully.";
		echo "<script>alert('Your info has been updated.');</script>";
		echo "<script>window.location.href = 'http://localhost/phpwork/CRM/inc/index.php';</script>";

	} else {
		echo "Error updating user information: " . mysqli_error($conn);
	}
}
else{
}


// Close the database connection when done
mysqli_close($conn);
?>
