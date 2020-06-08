<?php include "convert.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V5</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
				<form class="login100-form validate-form flex-sb flex-w" method="post">
					<span class="login100-form-title p-b-53">
						Cryptography Caesar Chiper
					</span>
					
					<div class="p-t-31 p-b-9">
						<span class="txt1">
							Plain Text
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<textarea class="input100" name="plantext_caesar" placeholder="Your plain text here..."></textarea>
						<span class="focus-input100"></span>
					</div>
					
					<div class="p-t-13 p-b-9">
						<span class="txt1">
							Your Key
						</span>
					</div>
					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="key_caesar" placeholder="Enter your key">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login75-form-btn m-t-17">
						<button class="login100-form-btn container-login50-form-btn" type="submit" value="Encrypt" name="encrypt_caesar">
							Encrypt
						</button>
					</div>
					<div class="container-login75-form-btn m-t-17">
						<button class="login100-form-btn container-login50-form-btn" type="submit" value="Decrypt" name="decrypt_caesar">
							Decrypt
						</button>
					</div>

				</form>
				<br/>
				<form method="post">
					<?php
	//----------------------------------------------------------------//
	// caesar														  //
	//----------------------------------------------------------------//
		if((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['encrypt_caesar'])){
			$key=$_POST['key_caesar'];
			$plantext=$_POST['plantext_caesar'];
			$split_key=str_split($key);
			$i=0;
			$split_chr=str_split($plantext);
			while ($key>52){
				$key=$key-52;
			}
			foreach($split_chr as $chr){
				if (char_to_dec($chr)!=null){
					$split_nmbr[$i]=char_to_dec($chr);
				} else {
					$split_nmbr[$i]=$chr;
				}
				$i++;
			}
			echo '<div class="wrap-input100 validate-input">';
			echo '<textarea class="input100" name="result" id="result" placeholder="Your chiper text here..." onclick="SelectAll(\'result\')">';
			foreach($split_nmbr as $nmbr){
				if (($nmbr+$key)>52){
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char(($nmbr+$key)-52);
					} else {
						echo $nmbr;
					}
				} else {
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char($nmbr+$key);
					} else {
						echo $nmbr;
					}
				}
			}
			echo '</textarea>';
			echo '<span class="focus-input100"></span>';
			echo '</div>';
		} else if ((isset($_POST['key_caesar'])) && (isset($_POST['plantext_caesar'])) && isset($_POST['decrypt_caesar'])){
			$key=$_POST['key_caesar'];
			$plantext=$_POST['plantext_caesar'];
			$i=0;
			$split_chr=str_split($plantext);
			while ($key>52){
				$key=$key-52;
			}
			foreach($split_chr as $chr){
				if (char_to_dec($chr)!=null){
					$split_nmbr[$i]=char_to_dec($chr);
				} else {
					$split_nmbr[$i]=$chr;
				}
				$i++;
			}
			echo '<div class="wrap-input100 validate-input">';
			echo '<textarea class="input100" name="result" id="result" placeholder="Your chiper text here..." onclick="SelectAll(\'result\')">';
			foreach($split_nmbr as $nmbr){
				if (($nmbr-$key)<1){
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char(($nmbr-$key)+52);
					} else {
						echo $nmbr;
					}
				} else {
					if (dec_to_char($nmbr)!=null){
						echo dec_to_char($nmbr-$key);
					} else {
						echo $nmbr;
					}
				}
			}
			echo '</textarea>';
			echo '<span class="focus-input100"></span>';
			echo '</div>';

		} 
	?>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>