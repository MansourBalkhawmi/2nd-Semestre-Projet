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
    <link rel="stylesheet" href="css/ajouprof.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?> 
<div class="creer">

<form method="POST" action="<?php echo WEB_ROUTE ?>">
		<input type="hidden" name="controller" value="classeController">
        <input type="hidden" name="action" value="ajouteprof">
        <input type="hidden" name="id" value="<?=isset($prof['id']) ? $prof['id'] : '' ?>">
<h1>Ajouter un Professeur</h1>
<div class="form_input">
    <label for="" >Nom Complet</label>
     <input class="input" type="text" name="Nom_complet" value="<?=isset($prof['Nom_complet']) ? $prof['Nom_complet'] : '' ?>">
     <main><?php echo isset($arrayError['Nom_complet']) ? $arrayError['Nom_complet'] : '' ?></main>
</div>
<div class="form_input">
    <label for="" >Grade</label> 
    <?php if($prof["grade"] == "BFEM"): ?>
            <select name="grade" id="grade">
           <option value="BFEM"  selected >BFEM</option>
       </select>
<?php endif?>
 <?php if($prof["grade"] == "BAC"): ?>
    <select name="grade" id="grade" >
           <option value="BAC" selected >BAC</option>
          
       </select>
 <?php endif?>
 <?php if($prof["grade"] == "BAC+3"): ?>
    <select name="grade" id="grade">
           <option value="BAC+3"selected>BAC+3</option>
       </select>
  <?php endif?>
  <?php if($prof["grade"] == "BAC+5"): ?>
    <select name="grade" id="grade">
           <option value="BAC+5"selected>BAC+5</option>
       </select>
  <?php endif?>
    <select name="grade" id="">
    <option value="Choisir la Classe">Choisir grade</option>
    <option value="BFEM" >BFEM</option>
    <option value="BAC" >BAC</option>
    <option value="BAC+3" >BAC+3</option>
    <option value="BAC+5" >BAC+5</option>
  </select><br>
  <main><?php echo isset($arrayError['grade']) ? $arrayError['grade'] : '' ?></main>
</div>
<div class="form_input1">
    <label for="">La Classe afectée</label> <br>
    <?php foreach ($classes as $key => $val):?>
        <?php echo $val['libelle'];?>
     <input type="checkbox" name="classe[]" value="<?=$val['libelle'];?>"  id=""><br>
     
    <?php endforeach;?>
     <main><?php echo isset($arrayError['classe']) ? $arrayError['classe'] : '' ?></main>
</div>
<div class="form_input1">
    <label for="">Module du Prof</label> <br>
    <?php foreach ($modules as $key => $val):?> 
        <?php echo $val['libelmodule'];?>
     <input type="checkbox" name="module[]" value="<?=$val['libelmodule'];?>" id=""><br>

    <?php endforeach;?>
     <main><?php echo isset($arrayError['module']) ? $arrayError['module'] : '' ?></main>
</div>
<button type="submit">Création</button>
</form>
</div>
</body>
</html>