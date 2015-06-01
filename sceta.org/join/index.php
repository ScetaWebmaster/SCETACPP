<!DOCTYPE html>
<!-- HTML5 Boilerplate -->
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <![endif]-->

<html class="no-js">
	<head>
		<meta charset="utf-8">

		<!-- Always Force Latest IE Rendering Engine (even in intranet) & Chrome Frame -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>SCETA - Join</title>

		<meta name="description" content="SCETA (Southern California Engineering Technologists Association) has been networking with engineering alumni who have been working in the engineering field since 1983. SCETA is an association of students interested in life-long learning and the sharing of knowledge among the various engineering disciplines. One of our goals is to establish a social network for current/future students and alumni.">
		<meta name="keywords" content="SCETA, engineering, technology, networking">
		<meta name="author" content="www.sceta.org">
		<meta http-equiv="cleartype" content="on">

		<link rel="shortcut icon" href="../img/favicon.ico">

		<!-- Responsive and Mobile Friendly Stuff -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../css/html5reset.css" media="all">
		<link rel="stylesheet" href="../css/style.css" media="all">
		<link rel="stylesheet" href="../css/col.css" media="all">
		<link rel="stylesheet" href="../css/2cols.css" media="all">
		<link rel="stylesheet" href="../css/3cols.css" media="all">
		<link rel="stylesheet" href="../css/4cols.css" media="all">

		<!-- Responsive Stylesheets -->
		<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="../css/1024.css">
		<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="../css/768.css">
		<link rel="stylesheet" media="only screen and (max-width: 480px)" href="../css/480.css">

		<!-- All JavaScript at the bottom except for Modernizr which enables HTML5 elements and feature detects. -->
		<script src="../js/modernizr-2.5.3-min.js"></script>

		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>	 

		<!-- Smooth Scroll -->
		<script src="../js/smoothScroll.js"></script>
	</head>

	<body>
		<!-- Main Body Wrapper -->
		<div id="wrapper">
			<!-- Main Header w/ SCETA Logo/Title & Main Menu -->
			<?php include '../../inc/sceta.org/header_1.php'; ?>

			<!-- Main Body Content -->
			<div id="maincontentcontainer">
				<div id="maincontent">
					<div class="section group">
						<div class="col span_1_of_4">
							<?php include '../../inc/sceta.org/sidemenu_join.php'; ?>
						</div>

						<div class="col span_3_of_4">
							<h4>Why join SCETA?</h4>
							<p>
								With the $20 annual SCETA membership, you will gain many benefits. You will:
								<ul>
									<li>attend one-on-one workshops dealing with a variety of electronics & computing technology, such as the Arduino UNO, PIC, and Pspice</li>
									<li>meet professionals from industry</li>
									<li>gain insight on industry with group tours</li>
									<li>network with peers & future employers in your field</li>
									<li>gain valuable leadership experiences & skills</li>
									<li>get discounts on electronic components & tools needed for various classes</li>
									<li>enjoy social events</li>
									<li>participate in group study sessions</li>
									<li>receive a student-designed SCETA shirt</li>
									<li>...and experience much more!</li>
								</ul>
							</p>

							<h4>Join Us</h4>
							<p>
								Please fill out the following form correctly, and you will be provided a confirmation e-mail once you have submitted your information.
							</p>

							<p>
								The list of majors were obtained from
								<a href="http://catalog.csupomona.edu/content.php?catoid=9&navoid=1139" target="_blank">Cal Poly Pomona's Programs Catalog</a>.
								If you do not see your major listed, please contact us at <a href="mailto:contact@sceta.org">contact@sceta.org</a>.
							<p>

							<form name="contactform" method="post" action="confirm/">
								<fieldset>
									<div class="section group">
										<div class="col span_1_of_2">
											<p>
												<b>First Name</b>
											</p>

											<p>
												<input name="firstname" type="text" id="firstname" maxlength="30" style="width: 100%;">
											</p>
										</div>

										<div class="col span_1_of_2">
											<p>
												<b>Last Name</b>
											</p>

											<p>
												<input name="lastname" type="text" id="lastname" maxlength="30" style="width: 100%;">
											</p>
										</div>
									</div>

									<div class="section group">
										<div class="col span_2_of_2">
											<p>
												<b>E-mail Address</b><br>
												This will be the primary e-mail address that we will be contacting you with.
											</p>	
											
											<p>
												<input name='email' type='text' id='email' maxlength='60' style="width: 100%;">
											</p>
										</div>
									</div>

									<div class="section group">
										<div class="col span_2_of_2">
											<p>
												<b>Phone Number</b>
											</p>

											<p>
												<input name='phone1' type='text' id='phone1' size='3' maxlength='3'> -                 
												<input name='phone2' type='text' id='phone2' size='3' maxlength='3'> -
												<input name='phone3' type='text' id='phone3' size='4' maxlength='4'>
											</p>
										</div>
									</div>

									<div class="section group">
										<div class="col span_2_of_2">
											<p>
												<b>Bronco ID Number</b><br>
												Your 9-digit Bronco ID number will be used to identify and distinguish you from other members.
											</p>

											<p>
												<input name='broncoid' type='text' id='broncoid' size='9' maxlength='9'>
											</p>
										</div>
									</div>

									<div class="section group">
										<div class="col span_2_of_2">
											<p>
												<b>Major</b>
											</p>

											<p>
												<select name='major' id='major'>
													<option value="Aerospace Engineering">Aerospace Engineering</option>
													<option value="Agribusiness and Food Industry Management">Agribusiness and Food Industry Management</option>
													<option value="Agricultural Science">Agricultural Science</option>
													<option value="Animal Health Science">Animal Health Science</option>
													<option value="Animal Science - Animal Industries Management">Animal Science - Animal Industries Management</option>
													<option value="Animal Science - Pre-Veterinary Science/Graduate School">Animal Science - Pre-Veterinary Science/Graduate School</option>
													<option value="Anthropology - Cultural Resource Management">Anthropology - Cultural Resource Management</option>
													<option value="Anthropology - General Anthropology">Anthropology - General Anthropology</option>
													<option value="Apparel Merchandising and Management - Apparel Production">Apparel Merchandising and Management - Apparel Production</option>
													<option value="Apparel Merchandising and Management - Fashion Retailing">Apparel Merchandising and Management - Fashion Retailing</option>
													<option value="Architecture">Architecture</option>
													<option value="Art History">Art History</option>
													<option value="Biology - Botany">Biology - Botany</option>
													<option value="Biology - General Biology">Biology - General Biology</option>
													<option value="Biology - Microbiology">Biology - Microbiology</option>
													<option value="Biology - Zoology">Biology - Zoology</option>
													<option value="Biotechnology">Biotechnology</option>
													<option value="Business Administration - Accounting">Business Administration - Accounting</option>
													<option value="Business Administration - Computer Information Systems">Business Administration - Computer Information Systems</option>
													<option value="Business Administration - E-Business">Business Administration - E-Business</option>
													<option value="Business Administration - Finance, Real Estate, and Law">Business Administration - Finance, Real Estate, and Law</option>
													<option value="Business Administration - International Business">Business Administration - International Business</option>
													<option value="Business Administration - Management and Human Resources">Business Administration - Management and Human Resources</option>
													<option value="Business Administration - Marketing Management">Business Administration - Marketing Management</option>
													<option value="Business Administration - Technology and Operations Management">Business Administration - Technology and Operations Management</option>
													<option value="Chemical Engineering">Chemical Engineering</option>
													<option value="Chemistry - Biochemistry">Chemistry - Biochemistry</option>
													<option value="Chemistry - Chemistry">Chemistry - Chemistry</option>
													<option value="Chemistry - Industrial Chemistry">Chemistry - Industrial Chemistry</option>
													<option value="Chemistry - Molecular Modeling and Simulation">Chemistry - Molecular Modeling and Simulation</option>
													<option value="Civil Engineering - Environmental Engineering">Civil Engineering - Environmental Engineering</option>
													<option value="Civil Engineering - General Civil Engineering">Civil Engineering - General Civil Engineering</option>
													<option value="Civil Engineering - Geospatial Engineering">Civil Engineering - Geospatial Engineering</option>
													<option value="Communication - Journalism">Communication - Journalism</option>
													<option value="Communication - Organizational Communication">Communication - Organizational Communication</option>
													<option value="Communication - Public Relations">Communication - Public Relations</option>
													<option value="Computer Engineering">Computer Engineering</option>
													<option value="Computer Science">Computer Science</option>
													<option value="Construction Engineering Technology">Construction Engineering Technology</option>
													<option value="Economics">Economics</option>
													<option value="Electrical Engineering">Electrical Engineering</option>
													<option value="Electronics and Computer Engineering Technology">Electronics and Computer Engineering Technology</option>
													<option value="Engineering Technology">Engineering Technology</option>
													<option value="English - English Education">English - English Education</option>
													<option value="English - Literature and Language">English - Literature and Language</option>
													<option value="Environmental Biology">Environmental Biology</option>
													<option value="Food Science and Technology">Food Science and Technology</option>
													<option value="Foods and Nutrition - Dietetics">Foods and Nutrition - Dietetics</option>
													<option value="Foods and Nutrition - Nutrition Science">Foods and Nutrition - Nutrition Science</option>
													<option value="Gender, Ethnicity, and Multicultural Studies - GEMS">Gender, Ethnicity, and Multicultural Studies - GEMS</option>
													<option value="Gender, Ethnicity, and Multicultural Studies - Pre-Credential">Gender, Ethnicity, and Multicultural Studies - Pre-Credential</option>
													<option value="Geography - Environmental Geography">Geography - Environmental Geography</option>
													<option value="Geography - Geographic Information Systems">Geography - Geographic Information Systems</option>
													<option value="Geography - Geography">Geography - Geography</option>
													<option value="Geology">Geology</option>
													<option value="Graphic Design">Graphic Design</option>
													<option value="History - Pre-Credential">History - Pre-Credential</option>
													<option value="History">History</option>
													<option value="Hospitality Management">Hospitality Management</option>
													<option value="Industrial Engineering">Industrial Engineering</option>
													<option value="Kinesiology - Exercise Science">Kinesiology - Exercise Science</option>
													<option value="Kinesiology - Health Promotion">Kinesiology - Health Promotion</option>
													<option value="Kinesiology - Pedagogy">Kinesiology - Pedagogy</option>
													<option value="Landscape Architecture">Landscape Architecture</option>
													<option value="Liberal Studies - BA/Credential">Liberal Studies - BA/Credential</option>
													<option value="Liberal Studies - Bilingual Authorization BA/Credential">Liberal Studies - Bilingual Authorization BA/Credential</option>
													<option value="Liberal Studies - Bilingual Authorization Pre-Credential">Liberal Studies - Bilingual Authorization Pre-Credential</option>
													<option value="Liberal Studies - General Studies">Liberal Studies - General Studies</option>
													<option value="Liberal Studies - Pre-Credential">Liberal Studies - Pre-Credential</option>
													<option value="Manufacturing Engineering">Manufacturing Engineering</option>
													<option value="Mathematics - Applied Mathematics/Statistics">Mathematics - Applied Mathematics/Statistics</option>
													<option value="Mathematics - Secondary Teacher Prep/Pure Mathematics">Mathematics - Secondary Teacher Prep/Pure Mathematics</option>
													<option value="Mechanical Engineering">Mechanical Engineering</option>
													<option value="Music - Music Education (Pre-Credential)">Music - Music Education (Pre-Credential)</option>
													<option value="Music - Music Industry Studies">Music - Music Industry Studies</option>
													<option value="Music - Performance Emphasis">Music - Performance Emphasis</option>
													<option value="Philosophy - Law and Society">Philosophy - Law and Society</option>
													<option value="Philosophy">Philosophy</option>
													<option value="Physics">Physics</option>
													<option value="Plant Science">Plant Science</option>
													<option value="Political Science">Political Science</option>
													<option value="Psychology">Psychology</option>
													<option value="Science, Technology, and Society">Science, Technology, and Society</option>
													<option value="Sociology - Criminology">Sociology - Criminology</option>
													<option value="Sociology - General Sociology">Sociology - General Sociology</option>
													<option value="Sociology - Social Work">Sociology - Social Work</option>
													<option value="Spanish">Spanish</option>
													<option value="Theatre - Acting">Theatre - Acting</option>
													<option value="Theatre - Dance">Theatre - Dance</option>
													<option value="Theatre - Education and Community">Theatre - Education and Community</option>
													<option value="Theatre - General Theatre">Theatre - General Theatre</option>
													<option value="Theatre - Technical Theatre and Design">Theatre - Technical Theatre and Design</option>
													<option value="Urban and Regional Planning">Urban and Regional Planning</option>
												</select>
											</p>
										</div>
									</div>

									<!-- Check for spam. -->
									<input name='name2' type='text' style="display: none;" size='20'>

									<div class="section group">
										<div class="col span_1_of_2">
											<p>
												<input type='submit' name='join_submit' id='join_submit' value='Submit'>
												<input type='reset' name='join_reset' id='join_reset' value='Clear'>
											</p>
										</div>
									</div>
								</fieldset>
							</form> 
						</div>
					</div>
				</div>
			</div>

			<!-- Main Footer -->
			<?php include '../../inc/sceta.org/footer_main_1.php'; ?>

			<!-- Back to Top -->
			<a href="#top" class="cd-top">Top</a>
			<script src="../js/top.js"></script>
	</body>
</html>