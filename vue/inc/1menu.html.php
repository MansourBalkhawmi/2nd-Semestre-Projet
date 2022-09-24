<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/menu1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<header>
    <div>
<img src="images/logo1.png" alt="">
    </div>
    <div class="text">
Bienvenue Cher ATTACHÉ Pédagogique
    </div>
</header> 
<article>
    <div class="logo"><img src="images/logo1.png" alt=""></div>
    <div class="nav"><a href="<?php echo WEB_ROUTE.'?controller=formController&view=attache'?>"><i class="tbord fa-sharp fa-solid fa-gauge"></i> Tableau de Bord</a></div>
    <div class="dropdown">
      <button class="dropbtn"><i class="ic fa-solid fa-users"></i> Gestion Etudiants</button>
      <div id="myDropdown" class="dropdown-content">
        <a href="<?php echo WEB_ROUTE.'?controller=etudiantController&view=inscrireetudiant'?>">Inscrire etudiant</a>
        <a href="<?php echo WEB_ROUTE.'?controller=etudiantController&view=listeretudiant'?>">Lister les étudiants</a>
      </div>
    </div>
    <div class="dropdown">
      <button class="dropbtn"><i class="ic fa-solid fa-newspaper"></i>  Gestion Demandes</button>
      <div id="myDropdown" class="dropdown-content">
        <a href="<?php echo WEB_ROUTE.'?controller=demandeController&view=1listerdemande'?>">Lister les Demandes</a>
      </div>
    </div>
    <div class="deconnecte"><a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>"><button><i class="fa-solid fa-power-off"></i> Déconnexion</button></a></div>
</article>
</body>
</html>