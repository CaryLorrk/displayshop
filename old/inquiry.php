<!DOCTYPE html>
<html lang="en">
  	<head>
    
	    <title>Shop fitting-Kupo Display</title>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./assets/css/custom.css" rel="stylesheet">
        <link href="./assets/css/inquiry.css" rel="stylesheet">

        <script src="./assets/js/jquery-1.8.3.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>
        <script src="./assets/js/history.min.js"></script>
        <script src="./assets/js/custom.js"></script>

		<!-- HTML5 and Media Queries Supported for IE6-8 -->
        <!--[if lt IE 9]>
          <script src="./assets/js/html5.js"></script>
          <script src="./assets/js/respond.min.js"></script>
        <![endif]-->

  	</head>

  	<body>
        <div class="navbar navbar-inverse navbar-fixed-top">
          <div class="navbar-inner">
          	<div class="container">
	            <!-- Responsive Navbar Button -->
	            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	              <span class="icon-bar"></span>
	            </a>
	            <a class="brand" href="./index.html">POLESTAR</a>
	            <!-- Navbar Contents -->
	            <div class="nav-collapse collapse">
	              <ul class="nav">
	                <li><a href="./index.php">Home</a></li>
	                <li><a href="./about.html">About Us</a></li>
	                <li><a href="./products.php">Products</a></li>
	                <li><a href="./gallery.php">Gallery</a></li>
	                <li><a href="./news.php">News</a></li>
	                <li class="active"><a href="./inquiry.php">Inquiry</a></li>
	                <li><a href="./contact.html">Contact</a></li>
	              </ul>
	          </div>
            </div>
          </div>
        </div>

        <div class="jumbotron">
        	<img src="./assets/img/jumbotron-inquiry.jpg" alt="jumbotron image">
        </div>

        <div id="content">
            <div class="container">
                <?php
				require_once('./assets/recaptcha/recaptchalib.php');
				$publickey = "6LcHlOcSAAAAAP47rg_VGqbV60VR835U5h5Lcdoz";
                $to = "display@kupo.com.tw";
                if (!isset($_POST['email'])){
                ?>
                    <div id="form-container">
                        <form action="inquiry.php" method="post" class="form-horizontal">
                            <div id="form-inner">
                                <div class="control-group">
                                    <label class="control-label" for="lastName">Last Name</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="lastName" id="lastName">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="firstName">First Name</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="firstName" id="firstName">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="company">Company</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="company" id="company">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="country">Country</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="country" id="country">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="city">City</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="city" id="city">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="address">Address</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="address" id="address">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="telephone">Telephone</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="telephone" id="telephone">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="faxNumber">Fax Number</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="faxNumber" id="faxNumber">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="email">E-mail</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="email" id="email">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="website">Website</label>
                                    <div class="controls">
                                        <input type="text" class="input-xlarge" name="website" id="website">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="profession">Profession</label>
                                    <div class="controls">
                                        <label class="checkbox inline">
                                            <input type="checkbox" name="profession[]" id="profession-2" value="Distributor">Distributor
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="checkbox" name="profession[]" id="profession-1" value="Dealer">Dealer
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="checkbox" name="profession[]" id="profession-3" value="End User">End User
                                        </label>
                                        <label class="inline" for="professionOther">
                                            Other
                                            <input type="text" name="professionOther" id="proffesionOther">
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <span class="control-label">Area of specially</span>
                                    <div class="controls">
                                        <label class="checkbox inline">
                                            <input type="checkbox" name="specially[]" id="specially-1" value="Shop">Shop
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="checkbox" name="specially[]" id="specially-2" value="Chain Store">Chain Store
                                        </label>
                                        <label class="checkbox inline">
                                            <input type="checkbox" name="specially[]" id="specially-3" value="Space Design">Space Design
                                        </label>
                                        <label class="inline" for="speciallyOther">
                                            Other
                                            <input type="text" name="speciallyOther" id="speciallyOther">
                                        </label>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="comment">Comment</label>
                                    <div class="controls">
                                        <textarea name="comment" id="comment" class="span5" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
							<div class="control-group">
								<label class="control-label">Prove you're not a robot</label>
								<div class="controls">
								<?php
									echo recaptcha_get_html($publickey);
								?>
								</div>
							</div>
                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="reset" class="btn">Reset</button>
                            </div>
                        </form>
                    </div>
                <? 
                }else{
					$privatekey = "6LcHlOcSAAAAAGnpbrmoiXxd1swSoWDR41KNqIpV";
					$resp = recaptcha_check_answer ($privatekey,
													$_SERVER["REMOTE_ADDR"],
													$_POST["recaptcha_challenge_field"],
													$_POST["recaptcha_response_field"]);
					if (!$resp->is_valid) {
					?>
					    <div id="form-container">
							<form action="inquiry.php" method="post" class="form-horizontal">
								<div id="form-inner">
									<div class="control-group">
										<label class="control-label" for="lastName">Last Name</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="lastName" id="lastName">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="firstName">First Name</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="firstName" id="firstName">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="company">Company</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="company" id="company">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="country">Country</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="country" id="country">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="city">City</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="city" id="city">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="address">Address</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="address" id="address">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="telephone">Telephone</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="telephone" id="telephone">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="faxNumber">Fax Number</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="faxNumber" id="faxNumber">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="email">E-mail</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="email" id="email">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="website">Website</label>
										<div class="controls">
											<input type="text" class="input-xlarge" name="website" id="website">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="profession">Profession</label>
										<div class="controls">
											<label class="checkbox inline">
												<input type="checkbox" name="profession[]" id="profession-2" value="Distributor">Distributor
											</label>
											<label class="checkbox inline">
												<input type="checkbox" name="profession[]" id="profession-1" value="Dealer">Dealer
											</label>
											<label class="checkbox inline">
												<input type="checkbox" name="profession[]" id="profession-3" value="End User">End User
											</label>
											<label class="inline" for="professionOther">
												Other
												<input type="text" name="professionOther" id="proffesionOther">
											</label>
										</div>
									</div>
									<div class="control-group">
										<span class="control-label">Area of specially</span>
										<div class="controls">
											<label class="checkbox inline">
												<input type="checkbox" name="specially[]" id="specially-1" value="Shop">Shop
											</label>
											<label class="checkbox inline">
												<input type="checkbox" name="specially[]" id="specially-2" value="Chain Store">Chain Store
											</label>
											<label class="checkbox inline">
												<input type="checkbox" name="specially[]" id="specially-3" value="Space Design">Space Design
											</label>
											<label class="inline" for="speciallyOther">
												Other
												<input type="text" name="speciallyOther" id="speciallyOther">
											</label>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="comment">Comment</label>
										<div class="controls">
											<textarea name="comment" id="comment" class="span5" rows="5"></textarea>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Prove you're not a robot</label>
									<div class="controls">
									<?php
										echo recaptcha_get_html($publickey);
									?>
									<p class="text-error"><strong>*The characters you entered didn't match the word verification. Please try again.</p>
									</div>
								</div>
								<div class="form-actions">
									<button type="submit" class="btn btn-primary">Submit</button>
									<button type="reset" class="btn">Reset</button>
								</div>
							</form>
						</div>
					<?php
					} else
					{
						$from = $_POST['firstName'] . ' ' . $_POST['lastName'] . '<' . $_POST['email'] . '>';
						$subject = 'POLESTAR inquiry from ' . $from;

						$_message = '<table class="table table-bordered"">';
						if (!empty($_POST['firstName']))
							$_message = $_message.'<tr><th>First Name</td><td>'.$_POST['firstName'].'</td></tr>';
						if (!empty($_POST['lastName']))
							$_message = $_message.'<tr><th>Last Name</td><td>'.$_POST['lastName'].'</td></tr>';
						if (!empty($_POST['company']))
							$_message = $_message.'<tr><th>Company</td><td>'.$_POST['company'].'</td></tr>';
						if (!empty($_POST['country']))
							$_message = $_message.'<tr><th>Country</td><td>'.$_POST['country'].'</td></tr>';
						if (!empty($_POST['city']))
							$_message = $_message.'<tr><th>City</td><td>'.$_POST['city'].'</td></tr>';
						if (!empty($_POST['address']))
							$_message = $_message.'<tr><th>Address</td><td>'.$_POST['address'].'</td></tr>';
						if (!empty($_POST['telephone']))
							$_message = $_message.'<tr><th>Telephone</td><td>'.$_POST['telephone'].'</td></tr>';
						if (!empty($_POST['faxNumber']))
							$_message = $_message.'<tr><th>Fax Number</td><td>'.$_POST['faxNumber'].'</td></tr>';
						if (!empty($_POST['email']))
							$_message = $_message.'<tr><th>E-mail</td><td>'.$_POST['email'].'</td></tr>';
						if (!empty($_POST['website']))
							$_message = $_message.'<tr><th>Website</td><td>'.$_POST['website'].'</td></tr>';
						

						$professionArray = empty($_POST['profession']) ? array() : $_POST['profession'];
						if (!empty($_POST['professionOther']))
							array_push($professionArray, $_POST['professionOther']);
						if (!empty($professionArray))
							$_message = $_message.'<tr><th>Profession</td><td>'.implode(', ', $professionArray).'</td></tr>';

						$speciallyArray = empty($_POST['specially']) ? array() : $_POST['specially'];
						if (!empty($_POST['speciallyOther']))
							array_push($speciallyArray, $_POST['speciallyOther']);
						if (!empty($speciallyArray))
							$_message = $_message.'<tr><th>Area of specially</td><td>'.implode(', ', $speciallyArray).'</td></tr>';

						$message = $_message;
						if (!empty($_POST['comment'])) {
							$message = $message.'<tr><th>Comment:</td><td> </td></tr>';
							$message = $message.'<tr><th> </td><td>'.nl2br($_POST['comment']).'</td></tr>';
						}
						$message = $message.'</table>';

						if (mail($to,$subject,$message,"From: POLESTAR website\nContent-Type: text/html;\n")){
					?>
							<p class="text-success text-center lead"><strong>Thank you for your inquiry!</strong></p>
							<p class="text-center">We have received your inquiry and will contact you soon. Thank you for your interest.</p>
							<p class="text-center">The information contained below is the detail of the inquiry letter.</p>
					<?
							$message = $_message;
							if (!empty($_POST['comment'])) {
								$message = $message.'<tr><th>Comment:</td><td>'.nl2br($_POST['comment']).'</td></tr>';
							}
							$message = $message.'</table>';
							echo '<div id="table-container">'.$message.'</div>';
						}else{
					?>
							<p class="text-error text-center lead"><strong>Your inquiry could not be sent.</strong></p>
							<p class="text-center">There are some problems with our system. please contact us by the company information.</p>
					<?
						}
					}
                }
                ?>
            </div>
        </div>

        <div id="toTop">
            <a href="javascript:void(0)">back to top</a>
        </div>

        <div class="footer">
            <div class="container">
                <p><strong>Kupo Co., Ltd</strong></p>
                <p>6F, No.4, Lane 609, Sec.5, Chung Shin Rd, San Chung District, New Taipei City, Taiwan.R.O.C.</p>
                <p>Tel:886-2-2999-1906</p>
                <p>Fax:886-2-2999-1955</p>
                <p>E-mail: <a href="mailto:display@kupo.com.tw">display@kupo.com.tw</a></p>
                <p><strong>- Copyright&copy; 2013 KUPO CO., LTD. -</strong></p>
            </div>
        </div>
  	</body>
</html>
