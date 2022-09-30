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
       
</form>
     <?php if(!empty($etudiants)): ?>
            <table>
                <tr>
                    <th>Matricule</th>
                    <th>Nom complet Etudiant</th>
                    <th>Adresse</th>
                    <th>Telephone</th>
                    <th>Classe</th>
                    <th>Genre</th>
                    <th>Année Scolaire</th>
                    <th>Date d'inscription</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($etudiants as $key => $val):?>
                    <tr>
                        <td><?php echo $val['matricule'];?></td>
                        <td><?php echo $val['nom_complet'];?></td>
                        <td><?php echo $val['adresse'];?></td>
                        <td><?php echo $val['telephone'];?></td>
                        <td><?php echo $val['classe'];?></td>
                            <td><?php echo $val['sexe'];?></td>
                            <td><?php echo $val['anneescolaire'];?></td>
                        <td><?php echo $val['date'];?></td>
                        <td>
                        <a href="<?= WEB_ROUTE.'/?controller=etudiantController&view=editee&id='.$val['id']?>" style="margin: 2vh;"><i class=" es fa-solid fa-pen-to-square"></i></a>
                        <a href="<?= WEB_ROUTE.'/?controller=etudiantController&view=deletee&id='.$val['id']?>"><i class=" es1 fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php endforeach;?>
            </table>
         <?php endif;?>
</div>
</body>
</html>