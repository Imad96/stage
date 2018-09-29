<!DOCTYPE html>
<html lang="en">
<head>
	<title>Flight System Login</title>
  <base href="{{URL::asset('/public/')}}">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href='img/icons/sonatrach.ico'/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href='css/font-awesome.min.css'>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href='css/icon-font.min.css'>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href='css/util.css' >
	<link rel="stylesheet" type="text/css" href='css/main.css'>
<!--===============================================================================================-->
<!-- Bootstrap Styles-->
<link href={{url('css/bootstrap.css')}} rel="stylesheet" />
<!-- FontAwesome Styles-->
<link href={{url('css/font-awesome.css')}} rel="stylesheet" />
<!-- Custom Styles-->
<link href={{url('css/custom-styles.css')}} rel="stylesheet" />
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('img/OIl-Gas2.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Flight <span style="color: #1cc09f;">System </span> Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="post" id="login" action="{{route('logIn')}}">
                {{csrf_field()}}
					<div class="wrap-input100 validate-input" data-validate = "Enter username">
						<input class="input100" type="email" name="email" placeholder="Email" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<small style="color:red; margin-left:20px; opacity:0.7;">{{ $errors->first('email') }}</small>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<small style="color:red; margin-left:20px; opacity:0.7;">{{ $errors->first('password') }}</small>


					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

				</form>
			</div>

		</div>
	</div>

<!--===============================================================================================-->
	<script src='js/jquery-3.2.1.min.js'></script>
<!--===============================================================================================-->
	<script src='js/main.js'></script>

</body>
</html>
