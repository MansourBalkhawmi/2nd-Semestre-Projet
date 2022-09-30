<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bord.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/1menu.html.php'); ?>    
<div class="bord">
<div class="esta">
    <div class="esta1"><i class="icone fa-solid fa-users"></i>    Etudiants</div>
    <div class="esta2">
    <div class="esta22">
      <div>
        <p><i class="icone fa-solid fa-users"></i>  TAUX TOTAL = 100%</p>
      </div>
      <div>
        <p><i class=" icone fa-solid fa-venus"></i>  TAUX DE FILLES = 40%</p>
      </div>
      <div>
      <p><i class="icone fa-solid fa-mars"></i> TAUX DE GARÇONS = 60%</p>
      </div>
    </div>
    </div>
</div>
<div class="esta">
<div class="esta3"><i class="icone fa-sharp fa-solid fa-school"></i>   Classes</div>
    <div class="esta2">
    <div class="esta23">
      <div>
        <p><i class="icone fa-sharp fa-solid fa-school"></i>  NOMBRE DE CLASSE = 7</p>
      </div>
      <div>
        <p><i class="icone fa-sharp fa-solid fa-school"></i> CAPACITÉ CLASSE = 10 </p>
      </div>
      <div style="background-color: white; box-shadow:none">
      </div>
    </div>
    </div>
</div>
<div class="esta">
<div class="esta4"><i class=" icone fa-solid fa-user-tie"></i>  Professeurs</div>
    <div class="esta2">
    <div class="esta24">
      <div>
        <p><i class=" icone fa-solid fa-user-tie"></i>  NOMBRE DE PROF = 5</p>
      </div>
      <div>
        <p><i class=" icone fa-solid fa-user-tie"></i>  NBR PROF/CLASSE = 10</p>
      </div>
      <div style="background-color: white; box-shadow:none">
      </div>
    </div>
    </div>
</div>
<div class="esta">
<div class="esta5"><i class="icone fa-solid fa-bars-progress"></i>   Modules</div>
    <div class="esta2">
    <div class="esta25">
      <div>
        <p><i class="icone fa-solid fa-bars-progress"></i>  NOMBRE DE MODULE = 10</p>
      </div>
      <div style="background-color: white; box-shadow:none">
      </div>
      <div style="background-color: white; box-shadow:none">
      </div>
    </div>
    </div>
</div>
</div>
<div class="person">
<div class="nom"><i class=" ic1 fa-solid fa-user"></i> : <?php echo $_SESSION['userConnected']['nomcomplet']?></div>
<div><i class=" ic1 fa-sharp fa-solid fa-at"></i> : <?php echo $_SESSION['userConnected']['email']?></div>
</div>
</body>
</html>