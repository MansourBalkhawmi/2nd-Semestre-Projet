<?php
$arrayError = [];

if (isset($_SESSION['arrayError'])) {
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<title>L'UNIVERS DE LA SAGESSE</title>
	<link rel="stylesheet" href="css/inscription.css">
</head>
<body>
	<div class="box">
		<form method="POST" action="<?php echo WEB_ROUTE ?>" autocomplete="off">
		<input type="hidden" name="controller" value="securityController">
        <input type="hidden" name="action" value="inscription">
			<div><img src="images/logo1.png" alt=""></div>
			<h2>Inscription</h2>
			<div class="inputBox">
				<input type="text" name="nomcomplet" required="required">
				<span>Nom complet</span>
				<i></i>
			</div>
			<main><?php echo isset($arrayError['nomcomplet']) ? $arrayError['nomcomplet'] : '' ?></main>
			<div class="inputBox">
				<input type="email" name='email' required="required">
				<span>Login</span>
				<i></i>
			</div>
			<main><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></main>
            <div class="inputBox">
				<input type="password" name='password' required="required">
				<span>Password</span>
				<i></i>
			</div>
			<main><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></main>
			<div class="inputBox">
				<input type="password" name='confirmPassword' required="required">
				<span>Confirm Password</span>
				<i></i>
			</div>
			<main><?php echo isset($arrayError['confirmPassword']) ? $arrayError['confirmPassword'] : '' ?></main>
			<div class="links">
				<a href="<?php echo WEB_ROUTE."?controller=securityController&view=connexion"?>"> Déjà un Compte, connectez ici ?</a>
			</div>
			<input type="submit" value="S'inscrire">
		</form>
	</div>
</body>
</html>