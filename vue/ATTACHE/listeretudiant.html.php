<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/listetudiant.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/1menu.html.php'); ?> 
<div class="creer">
    <h1>Liste Etudiant</h1>
    <form action="<?= WEB_ROUTE?>" method="post" class="form">
        <div class="matri">
    <input type="hidden" name="controller" value="etudiantController">
    <input type="hidden" name="action" value="search">
<input class="matri1" type="text" name="matricule" placeholder="Saisir le Matricule" id=""><button type="submit" name="search" ><i class=" sear fa-sharp fa-solid fa-magnifying-glass" title="Filtrer"></i></button>
</div>
</form>
     <?php if(!empty($etudiants)): ?>
            <table>
                <tr>
                    <th>Matricule</th>
                    <th>Nom complet Etudiant</th>
                    <th>class</th>
                    <th>Genre</th>
                    <th>Année Scolaire</th>
                    <th>Date d'inscription</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($etudiants as $key => $val):?>
                    <tr>
                        <td><?php echo $val['matricule'];?></td>
                        <td><?php echo $val['nom_complet'];?></td>
                        <td><?php echo $val['classe'];?></td>
                            <td><?php echo $val['sexe'];?></td>
                            <td><?php echo $val['anneescolaire'];?></td>
                        <td><?php echo $val['date'];?></td>
                        <td>
                        <a href="<?= WEB_ROUTE.'/?controller=etudiantController&view=editee&id='.$val['id']?>" style="margin: 2vh;"><i class=" es fa-solid fa-pen-to-square" title="Modifier"></i></a>
                        <a href="<?= WEB_ROUTE.'/?controller=etudiantController&view=deletee&id='.$val['id']?>"><i class=" es1 fa-solid fa-trash" title="Supprimer"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </table>
         <?php endif;?>
         <div  class="pagination">
   <?php for($i = 1; $i <= $totalPage; $i++):?>
       <a href="<?= WEB_ROUTE.'/?controller=etudiantController&view=listeretudiant&page='.$i.''?>">
     <button class="mm"><?php echo $i; ?></button> 
   </a>
       <?php endfor;?>

       </div>
       </div>  
       <style>
        .mm{
       width: 5vh;
       background-color: #957000;
       color:black;
       margin: 5px;
        } 
        .mm:hover{
       background-color: #0D0B68;
       color:#ffffff;
       margin: 5px;
        } 
        .pagination{
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            
        }
       </style>
</div>
</body>
</html>