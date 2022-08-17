<!DOCTYPE html>
<head>
  <meta charset="utf-8">
	<title> </title>
	<link href="css/login.css" rel="stylesheet" type="text/css">
</head>
</head>
<body>


<div id="log">

	<div id="error">
		<?php if(isset($loginError)): ?>
			<p><?php echo($loginError); ?>
		<?php endif ?>
	</div>
	
	<form action="" method="post">
		<div id="log_f">
			<label for="email"><input type="text" name="email" id="email" placeholder="E-mail"></label></br>
			<label for="password"><input type="password" name="password" id="password" placeholder="Hasło"></label>
			<input type="hidden" name="action" value="login"></br>
			<input type="submit" value="Zaloguj">
		</div>
	</form>
	
</body>
</html>