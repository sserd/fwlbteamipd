<?php
 
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "";
    $concerned_department = "";
    $visitor_message = "";
     
    if(isset($_POST['visitor_name'])) {
        $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
     
    if(isset($_POST['visitor_email'])) {
        $visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
        $visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
     
    if(isset($_POST['email_title'])) {
        $email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
     
    // if(isset($_POST['concerned_department'])) {
    //     $concerned_department = filter_var($_POST['concerned_department'], FILTER_SANITIZE_STRING);
    // }
     
    if(isset($_POST['visitor_message'])) {
        $visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
     
    if($concerned_department == "billing") {
        $recipient = "info@villainteriors.in";
    }
    else if($concerned_department == "marketing") {
        $recipient = "info@villainteriors.in";
    }
    else if($concerned_department == "technical support") {
        $recipient = "info@villainteriors.in";
    }
    else {
        $recipient = "info@villainteriors.in";
    }
     
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_email . "\r\n";
     
    if(mail($recipient, $email_title, $visitor_message, $headers)) {
        echo "<p>Thank you for contacting us, $visitor_name. You will get a reply within 24 hours.</p>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
     
} else {
    echo '<p>Something went wrong</p>';
}
 
?>
<!doctype html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact - Team FW-LB</title>
	<link rel="icon" href="https://villainteriors.in/fwlb/images/logo1.png" type="image/icon type">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<script src="js/mobile.js" type="text/javascript"></script>
	<script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
      <script src="https://use.fontawesome.com/releases/v5.0.0/css/all.css" crossorigin="anonymous"></script>
      <script src="https://use.fontawesome.com/releases/v5.10.2/css/all.css" crossorigin="anonymous"></script>
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.html" class="logo" ><img src="images/logo1.png" alt="SSERD LOGO" style="width:35%"></a>
				<ul id="navigation">
					<li>
						<a href="index.html">Home</a>
					</li>
					<li>
						<a href="about.html">About</a>
					</li>
					<li class="menu">
						<a href="projects.html">Project</a>
						<ul class="primary">
							<!--<li>-->
							<!--	<a href="proj1.html">proj 1</a>-->
							<!--</li>-->
						</ul>
					</li>
					<li class="menu">
						<a href="blog.html">Blog</a>
						<ul class="secondary">
							<!--<li>-->
							<!--	<a href="singlepost.html">Single post</a>-->
							<!--</li>-->
						</ul>
					</li>
					<li class="selected">
						<a href="contact.html">Contact</a>
					</li>
				</ul>
			</div>
		</div>
		<div id="body">
			<div class="header">
				<div class="contact">
					<h1>Contact</h1>
					<h2>DO NOT HESITATE TO CONTACT US</h2>
					<form action="contact.php" method="post">
  <div class="elem-group">
    <label for="name">Your Name</label>
    <input type="text" id="name" name="visitor_name" placeholder="Name" pattern=[A-Z\sa-z]{3,20} required>
  </div>
  <div class="elem-group">
    <label for="email">Your E-mail</label>
    <input type="email" id="email" name="visitor_email" placeholder="E-mail" required>
  </div>
  <!--<div class="elem-group">-->
  <!--  <label for="department-selection">Choose Concerned Department</label>-->
  <!--  <select id="department-selection" name="concerned_department" required>-->
  <!--      <option value="">Select a Department</option>-->
  <!--      <option value="billing">Billing</option>-->
  <!--      <option value="marketing">Marketing</option>-->
  <!--      <option value="technical support">Technical Support</option>-->
  <!--  </select>-->
  <!--</div>-->
  <!--<div class="elem-group">-->
  <!--  <label for="title">Reason For Contacting Us</label>-->
  <!--  <input type="text" id="title" name="email_title" required placeholder="Unable to Reset my Password" pattern=[A-Za-z0-9\s]{8,60}>-->
  <!--</div>-->
  <div class="elem-group">
    <label for="message">Write your message</label>
    <textarea id="message" name="visitor_message" placeholder="Your Message here." required></textarea>
  </div>
  <input type="submit" value="Send" id="submit">
  <!--<button type="submit">Send Message</button>-->
</form>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="connect">
				<div>
					<h1>FOLLOW SSERD ON</h1>
					<div>
						<a href="https://facebook.com/sserd.org" class="facebook">facebook</a>
						<a href="https://twitter.com/sserd_org" class="twitter">twitter</a>
						<!--<a href="https://instagram.com/sserd_org" ><i class="fab fa-instagram"></i>instagram</a>-->
						<!--<a href="http://pinterest.com/fwtemplates/" class="pinterest">pinterest</a>-->
					</div>
				</div>
			</div>
			<div class="footnote">
				<div>
					<p>&copy; DESIGNED & DEVELOPED BY TEAM FW-LB</p>
				</div>
			</div>
		</div>
	</div>
	<script>var clicky_site_ids = clicky_site_ids || []; clicky_site_ids.push(101273796);</script>
<script async src="//static.getclicky.com/js"></script>

</body>
</html>
