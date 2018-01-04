<?php
    require_once('functions/functions.php');
	get_header();
	get_bread_crumb();
	
	$sMess = '';
	if(!empty($_POST)) {
		if(!empty($_POST['email'])) {
			if(!empty($_POST['message'])) {
				$name = $_POST['name'];
				$email = $_POST['email'];
				$subject = $_POST['subject'];
				$message = $_POST['message'];
				
				$insert = "INSERT INTO m_cmessage (c_name, c_email, c_subject, c_message) VALUES('$name', '$email', '$subject', '$message')";
				if(mysqli_query($con, $insert)) {
					$sMess = 'Your message has been sent. Thank you!';
				}
			 
		    }else {
				echo 'Please write a message';
			}
		}else {
			echo 'Please enter your email address';
		}
	}
?>
		<section id="content">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h4>Get in touch with us by filling <strong>contact form below</strong></h4>

						<div><?= $sMess;?></div>
						<div id="errormessage"></div>
						<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" role="form" class="contactForm">
							<div class="form-group">
								<input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
								<div class="validation"></div>
							</div>
							<div class="form-group">
								<textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
								<div class="validation"></div>
							</div>

							<div class="text-center"><button type="submit" class="btn btn-theme">Send Message</button></div>
						</form>
					</div>
				</div>
			</div>
		</section>
<?php
    get_footer();
?>