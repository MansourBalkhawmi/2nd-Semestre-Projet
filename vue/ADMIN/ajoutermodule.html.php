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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/ajoumodule.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?> 
<div class="creer">
<form method="POST" action="<?php echo WEB_ROUTE ?>">
		<input type="hidden" name="controller" value="classeController">
        <input type="hidden" name="action" value="ajouter_module">
        <input type="hidden" name="id" value="<?=isset($module['id']) ? $module['id'] : '' ?>">
<h1>Ajouter un Module</h1>
<div class="form_input">
    <label for="" >Libellé</label>
     <input type="text" name="libelmodule" value="<?=isset($module['libelmodule']) ? $module['libelmodule'] : '' ?>" >
     <main><?php echo isset($arrayError['libelmodule']) ? $arrayError['libelmodule'] : '' ?></main>
</div>
<button type="submit">Création</button>
</form>
</div>
</body>
</html>