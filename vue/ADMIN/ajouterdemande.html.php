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
    <link rel="stylesheet" href="css/ajoudemande.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?> 
<div class="creer">
<form method="POST" action="<?php echo WEB_ROUTE ?>">
		<input type="hidden" name="controller" value="demandeController">
        <input type="hidden" name="action" value="demande">
        <input type="hidden" name="id" value="<?=isset($demande['id']) ? $demande['id'] : '' ?>">
<h1>Ajouter Demande</h1>
<div class="form_input">
    <label for="" >Motif</label>
     <textarea name="motif" id="" cols="30" rows="10"><?=isset($demande['motif']) ? $demande['motif'] : ''?></textarea>
     <main><?php echo isset($arrayError['motif']) ? $arrayError['motif'] : '' ?></main>
</div>
<div class="form_input1">
    <label for="" >Etat Demande</label> 
    <?php if($demande["etat"] == "Accepter"): ?>
            <select name="etat" id="etat">
           <option value="Accepter"  selected >Accepter</option>
       </select>
<?php endif?>
 <?php if($demande["etat"] == "En Traitement"): ?>
    <select name="etat" id="etat" >
           <option value="Traitement" selected >Traitement</option>
          
       </select>
 <?php endif?>
 <?php if($demande["etat"] == "Refuser"): ?>
    <select name="etat" id="etat">
           <option value="Refuser"selected>Refuser</option>
       </select>
  <?php endif?>
    <select name="etat" id="" >
    <option value="Choisir l'etat">Choisir l'Etat</option>
    <option value="Accepter" >Accepter</option>
    <option value="Traitement" >Traitement</option>
    <option value="Refuser" >Refuser</option>
  </select>
  <main><?php echo isset($arrayError['etat']) ? $arrayError['etat'] : '' ?></main>
</div>
<button type="submit">Création</button>
</form>
</div>

</body>
</html>