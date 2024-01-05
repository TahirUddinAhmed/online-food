<?php require_once "includes/header.php" ?>
<!-- //
query to insert data
INSERT INTO `contact` (`id`, `fullname`, `email`, `phone`, `message`, `added_on`) VALUES ('1', 'Tahir Uddin Ahmed', '01tahirahmed@gmail.com', '9365910717', 'Hey I am the developer', current_timestamp());
-->
<?php
 if(isset($_POST['contact'])) {
	$fullname = check_input($_POST['fullname']);
	$email = check_input($_POST['email']);
	$phone = check_input($_POST['phone']);
	$message = check_input($_POST['message']);

	// validate the form
	if(validateContact($fullname, $email, $phone, $message)) {
		$allErr = 'All fields are required!';
	} else {
		// query to insert data into db
		$query = "INSERT INTO `contact` (`fullname`, `email`, `phone`, `message`, `added_on`) VALUES ('$fullname', '$email', '$phone', '$message', current_timestamp());";
		$result = mysqli_query($conn, $query);
		
		if(!$result) {
			die('QUERY FAILED' . mysqli_error($conn));
		} else {
			$success = 'Thank you for reaching out! We have received your message and will get back to you as soon as possible';
		}
		
	}

	
	
 }

 
?>

   <section class="container" id="contact">
	
	<h2 class="text-center mt-4">Contact Us</h2>
	<p class="text-center text-muted">Contact Us for Exceptional Support and Assistance.</p>

	<?php
		if(isset($allErr)) {
		echo  '<div class="alert alert-danger" role="alert">
			   '.$allErr.'
			</div>';

		}
		if(isset($success)) {
		echo  '<div class="alert alert-primary" role="alert">
			   '.$success.'
			</div>';

		}
	?>
	<div class="contact-form">
		<div class="form">
			<form action="" method="post">
				<div class="mb-3">
					<label for="fullname">Full Name</label>
					<input type="text" name="fullname" class="form-control" id="">
				</div>
				<div class="mb-3">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" id="">
				</div>
				<div class="mb-3">
					<label for="phone">Phone</label>
					<input type="tel" name="phone" class="form-control" id="">
				</div>
				<div class="mb-3">
					<label for="message">Message</label>
					<textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
				</div>

				<input type="submit" name="contact" value="Send" class="btn btn-primary d-block">
			</form>
		</div>

		<div class="address">
			<h3>Address</h3>
			<div class="addr">
				<p>
					<i class="fa-solid fa-location-dot"></i>
				</p>
				<p>Morigaon, Assam, 782105</p>
			</div>
			<div class="addr">
				<p>
					<i class="fa-solid fa-phone"></i>
				</p>
				<p>Mobile: 9365910717</p>
			</div>
			<div class="addr">
				<p>
					<i class="fa-solid fa-envelope"></i>
				</p>
				<p>email: 01tahirahmed@gmail.com</p>
			</div>
		</div>

	</div>
   </section>

   <div class="contact_content">
   	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1783.1489210522718!2d91.72537820000004!3d26.63894460000001
	!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1697710335859!5m2!1sen!2sin" width="100%" height="420px" 
	style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
   </div>

</div>

<br>
<br>

<?php require_once "includes/footer.php" ?>