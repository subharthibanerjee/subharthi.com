<!DOCTYPE HTML>
<!--
	.....
-->
<html>
	<head>
		<title>Main Page</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<link rel="stylesheet" href="assets/css/timeline.css" />
		<link rel="icon" href="http://subharthi.com/images/icons/favicon.ico">

	<!--	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css"> -->

 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>-->

<style>
.error {color: #FF0000;}
.signup-response{
    width: 50%;
    margin-left: auto;
    margin-right: auto;
    text-align: center;
    background-color: #F0FFF0;
    margin-top: 20px;

     animation:signup-response 0.5s 1;
    -webkit-animation:signup-response 0.5s 1;
    animation-fill-mode: forwards;

    animation-delay:10s;
    -webkit-animation-delay:10s; /* Safari and Chrome */
    -webkit-animation-fill-mode: forwards;

} 

@keyframes signup-response{
    from {opacity :1;}
    to {opacity :0;}
}

@-webkit-keyframes signup-response{
    from {opacity :1;}
    to {opacity :0;}
}
</style>

		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		
	</head>
	<body>
	
	
	
	<!-- PHP code-->
	<?php
// define variables and set to empty values

$someErr = "Please enter your full name and email ID";
$response = $_POST["g-recapctcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
		'secret' => "6LdzsnIUAAAAAH9zn8UAKMdIrEwM6XPqmpdi1CYw",
		'response' => $_POST["g-recaptcha-response"]
	);
$options = array(
		'http' => array (
			'method' => 'POST',
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$verify = file_get_contents($url, false, $context);
	$captcha_success=json_decode($verify);
	
	
$fail=0; 
$name = $email = $message = $subject = "";
if(isset($_POST['submit'])){
$email_to = "do-not-reply@subharthi.com";
    $email_subject = "";

  if (empty($_POST["name"])) {
    $someErr = "Obviously, something is wrong!";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $someErr = "Only letters and white space allowed"; 
    }
  }
  if (empty($_POST["subject"])) {
    $someErr = "Obviously, something is wrong!";
  } else {
    $subject = test_input($_POST["subject"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $someErr = "Only letters and white space allowed"; 
    }
  }

  
  if (empty($_POST["email"])) {

  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

    }
  }
    
  
  if (empty($_POST["message"])) {
    $message = "";
  } else {
    $message = test_input($_POST["message"]);
  }
  
  /* Let's prepare the message for the e-mail */
$email_message = "Hello!


Subject:  $subject


Your contact form has been submitted by: \n

=========================================== \n
Name: $name \n
E-mail: $email \n
=========================================== \n


Comments:\n

$message\n
------------------
Thanks & regards\n
$name\n
";


/*
$email_message = '<html><body>';
$email_message .= '<p>Hello Subharthi, <br></p>';
$email_message .= '<table rules="all" style="border-collapse:collapse;" cellpadding="30">';
$email_message .= "<tr style='background: #D00000;'><td><strong>Name:</strong> </td><td>" . $name . "</td></tr>";
$email_message .= "<tr><td><strong>Email:</strong> </td><td>" . $email . "</td></tr>";
$email_message .= "<tr><td><strong>subject:</strong> </td><td>" . $subject . "</td></tr>";


$curText = $message;           
if (($curText) != '') {
    $email_message .= "<tr><td><strong>Comments:</strong> </td><td>" . $curText . "</td></tr>";
}

$email_message .= "</table>";
$email_message .= '<p>Thanks & regards <br></p>';
$email_message .= "<p>$name <br></p>";
$email_message .= "</body></html>";
*/
  // create email headers
$headers = 'From: "subharthi" <do-not-reply@subharthi.com>'."\r\n";
$headers .= "Reply-To: $email_to"."\r\n";
//$headers .= 'CC: "'.$cc.'" <'.$cc.'>'."\r\n";
//$headers .= 'MIME-Version: 1.0' . "\r\n";

    
//$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    

 


if ($captcha_success->success==true) {

	if(mail($email_to,$subject,$email_message, $headers))
	    {
	    	    
		    $someMsg = "mail sent, thank you for your response!";
		    $fail = 0;
		    
	    
	
	    }
	else {
		$someMsg ="Something went wrong! mail not sent"; 
		$fail = 1;
	}
}
else if ($captcha_success->success==false) {
	$someMsg ="Something went wrong! mail not sent, possibly beacuse of bot attempt"; 
	$fail = 1;
}
}



function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = htmlentities($data);
  return $data;
}
function clean_string($string) {
      $msg = array("content-type","bcc:","to:","cc:","href");
      return str_replace($msg,"",$string);
    }
?>



		<!-- Header -->
			<section id="header">
				<header>
					<span class="image avatar"><img src="images/myAvatar.png" alt="" /></span>
					<h1 id="logo"><a href="http://subharthi.com">Subharthi B</a></h1>
					<p>>=5G, Trains, Embedded, Smarts, Scale </p>
				</header>
				<nav id="nav">
					<ul>
						<li><a href="#about" class="active">About</a></li>
						<li><a href="#interests" class="interests">Interests</a></li>

						<li><a href="#education">Education</a></li>
						<li><a href="#research">Research</a></li>

						<li><a href="#awards">Awards, Fellowships & Memberships</a></li>
						<li><a href="#pubs">Publications</a></li>
						<li><a href="http://subharthi.com/wpblogs">Blogs</a></li>
						<li><a href="#resume">Resume</a></li>


						<li><a href="#contact">Contact</a></li>
					</ul>
				</nav>
				<footer>
					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="https://www.facebook.com/subharthi.banerjee" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="https://www.instagram.com/bsubharthi/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="https://github.com/subharthibanerjee" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="https://www.linkedin.com/in/subharthibanerjee/" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
					</ul>
				</footer>
			</section>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="about">
								<div class="container">
								<span class="signup-response"> <?php echo $someMsg;?></span>
									<header class="major">
										<h2>Hello, I am Subharthi</h2>
										<p>Thank you for visiting my page.<br />
																			</header>
									<p> I am currently working for <b>NXP Semiconductors</b>. Prior to NXP, I have worked at the <b>Ford Motor Company</b> for two years.
									My current work focuses on DFS and TPC modules on current NXP Wi-Fi chipsets.
									
									
									</p>
								</div>
							</section>

						<!-- Interests -->
							<section id="interests">
								<div class="container">
									<h3>Interests</h3>
									<p>A fun compilation of the things I am interested in.</p>
									<ul class="feature-icons">
										<li class="fa-code">Code goblin (gobble all the code)</li>
										<li class="fa-cloud">Look at the CLOUDs or stare at the FOG</li>
										<li class="fa-book">Be nerdy about the prime numbers</li>
										<li class="fa-coffee">Python, radio and trains</li>
										<li class="fa-angle-double-up">A goal to double the 14 up the K2. </li> 
										<li class="fa-bolt">Prime numbers (do pow(2, n)+p, I will tell you the value of 'p' to get you a prime)</li>
										<li class="fa-subway">Trains and the chosen one that runs faster than the fastest </li>
											<li class="fa-space-shuttle">Space</li>
											<li class="fa-language">Japanese </li>
											<li class="fa-headphones">Sound of music </li>
											<li class="fa-heartbeat">Safety of people and 'not'-people </li>









									</ul>
									
								</div>
							</section>

<!-- education -->
							<section id="education">
								<div class="container">
									<h3>Education</h3>

 <ul class="timeline">
 <li class="timeline-event">
    <label class="timeline-event-icon"></label>
    <div class="timeline-event-copy">
      <p class="timeline-event-thumbnail">May 2017 - May 2020</p>
      <h3>PhD in Computer Engineering</h3>
      <h4>University of Nebraska-Lincoln</h4>
      <!-- 
      <p><strong>Courses</strong><br>Advanced Signal Processing and Radar Systems (A), Information theory (A+), Signal Estimation and Kalman Filtering (A), Game Theory (Audit) </p>
      -->
      <!--
      <strong>Course Projects on - </strong><ul style="list-style-type:square;"><li><strong>Angle of Arrival estimation of large radar cross section object in sea 
      </strong>(used: short-time fourier transform and array signal processing with an MSE 0.12%).</li> <li><strong>Designed adaptive controller to estimate the 
      controller parameters with kalman filter</strong>. All the algorithms are written in MATLAB and vectorized for faster speed.</ul>
      -->
      <strong>Research Projects on - </strong><ul style="list-style-type:square;"><li><a href="http://www.subharthi.com/main.php#research">Research</a></li></ul>
<strong>Thesis: </strong> Human behavioral resource allocation and association for device-to-device communication: A cell-biology influenced approach

    </div>
  </li>

  <li class="timeline-event">
    <label class="timeline-event-icon"></label>
    <div class="timeline-event-copy">
      <p class="timeline-event-thumbnail">August 2015 - May 2017</p>
      <h3>Masters of Science in Telecommunication Engineering</h3>
      <h4>University of Nebraska-Lincoln</h4>
      <!--
      <p><strong>Courses</strong><br>Advanced Telecommunications (A+), Antenna and RF propagation (A+), Wireless security (A+), 
      Graph Theory (A), Estimation theory (A+), Topics in modeling and machine learning (A+), etc.</p>
      <strong>Course Projects on</strong><br><ul style="list-style-type:square;"><li><strong>Post emergency cellular network 
      </strong>(Stanford graph data analysis of 1e5 nodes and 1e7 edges to do network/graph analysis in HCC-UNL cluster, 
      degree-connectivity, cycles, clustering in NP-complete algorithms),</li> <li><strong>convolutional neural networks</strong> 
      (CIFAR image classification with mxnet, written algorithms to generate randomized images for the CNN, used and written own ZCA algorithm
      to provide image tensor to the CNN, code available in github). <u>The accuracy was 71% for 5000 images and 98.03% for 1e6</u>,</li><li><strong>
      crime forecasting </strong>(A complete project with space time forecasting of Portland crime data, spatial anlaysis of crime, kernel-density and 
      different space-time algorithms implemented to find weekly, monthly and yearly crime forecasting, code available in github). <u>The accuracy for 
      this project was 65-73% based on weekly to monthly data available from crimestat and datasets</u>.</li></ul>
      <strong>Research Projects on - </strong><ul style="list-style-type:square;"><li><a href="http://www.subharthi.com/main.php#research">Research</a></li></ul>
      -->
<strong>Thesis: </strong>5G-UCDA Multi Antenna-To-Logical Cell Circular FIFO Mapping Strategy For High-Speed Train Wireless Communications

    </div>
  </li>
  <li class="timeline-event">
    <label class="timeline-event-icon"></label>
    <div class="timeline-event-copy">
      <p class="timeline-event-thumbnail">February 2014 - August 2014</p>
      <h3>Post Graduate Diploma in Embedded Systems Design</h3>
      <h4>Center for Development of Advanced Computing</h4>
      Course was based on Embedded C, Assembly langage, ARM microcontrollers, RTOS, Linux shell scripting, device drivers with a final project on signal processing based motor condition analysis.
    </div>
  </li>
  <li class="timeline-event">
    <label class="timeline-event-icon"></label>
    <div class="timeline-event-copy">
      <p class="timeline-event-thumbnail">July 2009 - July 2013</p>
      <h3>Bachelor of Technology in Electronics and Instrumentation</h3>
      <h4>Techno India, Saltlake (under West Bengal University of Technology)</h4>
      <p><strong>Courses and Major</strong><br>Background in control systems, electronics, wireless telemetry and instrumentation.<br> </p>
<strong>Final Project</strong><br>Wireless Telemetry in unlicensed UHF bands with compact and robust communication and device built.

    </div>
  </li>
</ul>
<!-- end div here for education-->
								</div>
							</section>

						<!-- research -->
							<section id="research">
								<div class="container">
									<h3>Research</h3>
								
 									<div class="features">
										<article>
											<a href="#" class="image"><img src="images/d2d1.png" alt="" /></a>
											
											<div class="inner">
												<h4>Behavioral-Social D2D communications</h4>
												<ul style="list-style-type:square;"><li>Designed D2D network architecture based on human-behavioral approarch</li>
												<li>Improved network understanding based on self-propelled voronoi model that has been used to model cancer metastasis phase </li>
												<li>Identified unique number related (shape index) to human-behavior specific resouce allocation: selfish/mobile resource, altruistic/static resource, etc.</li>
												<li>Developed platform independent application with Pybees to showcase or to demonstrate proposed architecture and communication model based on end-user locations and LTE-M2M/WiFi RSSI</li>
												<li>Throughput and Trust improvement showcased for up to <u>300%</u> with cellular-assisted and non-cellular D2D communciation compared to social-aware models (graph-centric, naive-clustering, etc.)</li>
												<li> Followed 5G-3GPP (TS36.746) design cases for simulation and verification to follow 5G requirements </li>
												</ul>
												
											</div>
										
										</article>
										<article>
											<a href="#" class="image"><img src="images/scene.png" alt="" /></a>
											<div class="inner">
												<h4>No collision in the yards</h4>
												<ul style="list-style-type:square;"><li>
												    Researched near-miss events             with embedded
                                                     sensors and radios for                 railyard personnel
                                               <li> Engineered image, audio and software defined radar (400-800MHz) signal processing
and tracking with 10-30% more fidelity.</li>
<li> Developed variable-clutter cancellation algorithm and multi-sensor approach to increase Employee-on-Duty (EoD) and Remote Control Operator (RCO) safety </li>
<li>Implemented embedded/low power communication
design and collected multi-sensor information (IMU,
infrared, etc.).</li>
<li>Followed 49 CFR 218 intensively for unobtrusive protective device design.</li>
<li>Handled 2 GB sensor data in cloud and FOG </li>
<strong>Keywords:</strong> Thinkspeak, matlab, C, Python, radar, WiFi, Zigbee,
UWB, I2C, machine learning, tensorflow, mxnet, data
collection, CNN
												
												<ul>
											</div>
										</article>
										<article>
											<a href="#" class="image"><img src="images/frascene.png" alt="" /></a>
											<div class="inner">
												<h4>Rethinking wireless network architecture for High Speed Trains</h4>
												<ul style="list-style-type:square;"><li>	Planning field testing of 5G-NR and LTE in vehicular and train
networks with software defined radio</li>
<li> Worked on collaboration plan with OAI and EUROCOM in 5G/LTE
testing</li>

<li> Improved throughput by 97% by user and control
plane separation in 5G/LTE small cell vehicular
network</li>
<li>Introduced UPWARC or user plane wireless adaptable reliable communication for high speed train for realizing user and control plane physical separation with mmWave and sub-6Ghz frequencies to obtain dual-plane seamless communication.</li>
<li>Proposed and verified massive-MIMO in high-speed train environment with distributed femto-cells and 5G-mmwave. Obtained in-train network performance to find per-user achievable trhoughput to be offloaded.</li>
<li>Created a bash-pipeline between online small-scale fading calculated values and NS3 modules</li>
<li>New NS3 modules created for NS3-mmwave to simulate high-speed train environment (tunnel, viaduct, etc.), femto cells and EPC-independent mmwave handover.</li>
<li> Developed and formalized 28 GHz mmwave 5G-NR
and LTE environmental end-to-end simulator for
passenger train network</li></ul>
<strong>Keywords:</strong> 5G-NR, LTE, vehicular networks, C++, USRP, bash, NS3, MIMO, massive-MIMO, MU-MIMO, perfect-CSI
											</div>
										</article>
										<article>
											<a href="#" class="image"><img src="images/scale1.png" alt="" /></a>
											<div class="inner">
												<h4>Large-scale uncertainty in cyber-physical human systems-A formal verification approach</h4>
												<ul style="list-style-type:square;"><li>Proposed a novel method of theoretical formal verification: topographical approach of polygonal/polytopic approximation</li>
												<li>Analyzed topographical model on fuzzy and uncertain measures to show complete qualititative and quantitative notion of over/under approximation</li>
												<li>Tested the theoretical approach with real-world data collected from Carla</li>
												<li>Designed human-uncertain input collection in Carla (from IMU sensors) to add uncertain steering noise/braking and signal decisions (fuzzy uncertain)</li>
												<li>Guaranteed fidelity of 73% with 1-30s runtime of complete formal verification</li>
												<li>Formally proved theoretical applications of the methodology in autonomous cars.</li>
												</ul>
											</div>
										</article>
										<article>
											<a href="#" class="image"><img src="images/Baxter_Tall.png" alt="" /></a>
											<div class="inner">
												<h4>Remote VR Teleoperation with Baxter</h4>
											<ul style="list-style-type:square;"><li>	Established and integrated remote teleoperated
embedded system for 80mile remote laboratory</li>
<li> Incorporated 14 DOF kinematics control of humanoid</li>
<li> Connected Unity-ROSbridge-ROS to teleoperate
Baxter with HTC vive</li>
<li>Programmed 360&#0176 camera integration for live feed in
HUD</li></ul>
												 <a href="https://www.sushantamrakshit.com/single-post/2015/10/01/Lab-All-Access">See More Here!</a>. </p>
											</div>
										</article>
									</div>
								</div>
							</section>


							<section id="awards">
								<div class="container">
									<h3>Awards, Fellowships and Memberships</h3>
									<ul class='alt'>
										<li><h5>UNL Electrical & Computer Engineering Graduate Poster Comptetition Awards-2018</h5></li><p>Second honors for presenting Novel wireless communication framework for High Speed Trains-UPWARC (award amount $200)</p>
										<li><h5>ASME Rail Transportation Division (RTD) Graduate Student Conference scholarship </h5></li><p>The travel grant was given to me in 2017 to attend Joint Rail Conference (JRC) in Philadelphia. The grant covers air, surface and subway travel, food, lodging along with conference registration (award amount $1100).</p>
										<li><h5>College of Engineering Outstanding Masters Thesis</h5></li><p>The award was given for the thesis "5G-UCDA Multi Antenna-To-Logical Cell Circular FIFO Mapping Strategy For High-Speed Train Wireless Communications" in Spring 2017 (award amount $500)</p>
										<li><h5>Nebraska Engineering Recruitment Fellowship</h5></li> <p>The award was given for the period of 2017-18 and 2018-19. (awards amount $10,000)</p>
										<li><h5>Milton Mohr Fellowship</h5></li> <p>The award was given for the period of 2019 for excellent research activities. (award amount $1,000)</p>
										<li><h5>Holling Fmaily Teaching Fellowship</h5></li> <p>The award was given for the period of 2019-20 for the excellence in teaching (awards amount $4,000).</p>
										<li><h5>NSF-Infocom Travel Grant</h5></li> <p>The award was given presenting behavioral-social D2D paper in Infocom, Paris, 2019 (award amount $1,250).</p>
										<li><h5>Student Luminary Award</h5></li> <p>Honorable mention was given for the period of 2018.</p>
										<li><h5>College of Enginnering Student Travel Grant 2017</h5></li><p> The award was given to attend Joint Rail Conference, 2017 in Philadelphia.(award amount $500)</p>
										<li><h5>ACM Sigcomm Travel grant</h5></li><p>The travel grant was awarded to attend IEEE COMSNETS, 2018 in Bengaluru, India. (award amount $900).</p>
									</ul>
								</div>

							</section>
							<!-- Publications-->


<section id="pubs">
<div class="container">
<h3> Publications </h3>
<blockquote>
<p>You may have noticed my publications entail solving different problems. However, I majorly focused in designing and proposing a novel wireless communications architecture for high speed trains. The fascinating trivia about high speed train is that they can move at a speed of 500kph. At that speed it would take only 8 hrs from Washington DC to Los Angeles. Our vision is to provide the opportunity to use your phone seamlessly for video streaming to video or voice calls. And yes, nobody will ever ask you to switch off your phone inside a train. You as a passenger will also be a vital component of ensuring safety of your journey. </p></blockquote>
	<p>									<?php require_once("assets/bibtext2html.php");echo bibfile2html("assets/pubs.bib"); ?></p>
 <?php                                                                       
      require_once("assets/bibtext2html.php");                                      
      echo extractBibEntry("assets/pubs.bib", $_GET['key']);         
  ?>  


</section>

	<!-- Resume-->

<!--
<section id="blogs">
<div class="container">
<h3> My Blogs regarding my Alpine climbing exploits </h3>
-->
</section>

<section id="resume">
<div class="container">
<h3> Download Resume </h3>
<ul class="material-icons">
	
	<li>Please click here to download resume <a href="#target"><i class="fa fa-download"></i></a></li>
	<li>Please click here to download Vcard <a href="#target"><i class="fa fa-download"></i></a></li>
</ul>

</section>



						<!-- contact -->
							<section id="contact">
								<div class="container">
									<h3>Contact Me</h3>
								<p>Contact me here. </p>
									<form method="post" name="contact_form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
										<div class="row uniform">
										<div class="6u 12u(xsmall)"><input type="text" name="name" id="name" placeholder="Name" required/> 										</div>
											<div class="6u 12u(xsmall)"><input type="email" name="email" id="email" placeholder="Email"/></div>
										</div>
										<div class="row uniform">
											<div class="12u"><input type="text" name="subject" id="subject" placeholder="Subject" required/></div>
										</div>
										<div class="row uniform">
											<div class="12u"><textarea name="message" id="message" placeholder="Message" rows="6" required></textarea></div>
										</div>
										<div class="row uniform">
										<div class="g-recaptcha" data-sitekey="6LdzsnIUAAAAAA1SjKt38jslkNLdRbPMktFzlwK2" data-callback="recaptchaCallback"></div>
										</div>
										<div class="row uniform">
											<div class="12u">
												<ul class="actions">
													<li><input type="submit" class="special" name="submit" id="submit" value="Send Message" /></li>
													<li><input type="reset" value="Reset Form" /></li>
												</ul>
											</div>
										</div>


									</form>
									
								</div>
								
							</section>

				<!-- Five -->	<!--	
						
							
-->

				<!-- Footer -->
					<section id="footer">
						<div class="container">


							<ul class="copyright">
								<li>&copy; Subharthi. All rights reserved.</li><li> 
								

							</ul>
	<ul class="icons">
													<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
													<li><a href="https://www.facebook.com/subharthi.banerjee" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
													<li><a href="https://www.instagram.com/bsubharthi/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
													<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
													<li><a href="https://www.linkedin.com/in/subharthibanerjee/" class="icon fa-linkedin"><span class="label">Linkedin</span></a></li>
												
												</ul>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollzer.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
