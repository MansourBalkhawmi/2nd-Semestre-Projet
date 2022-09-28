<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/listmodule.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/1menu.html.php'); ?> 
<div class="creer">
    <h1>Liste Demande</h1>
     <?php if(!empty($demandes)): ?>
            <table>
                <tr>
                    <th>Proprieté</th>
                    <th>Motif</th>
                    <th>Etat</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($demandes as $key => $val):?>
                    <tr>
                        <td><?php echo $val['etudiant'];?></td>
                        <td><?php echo $val['motif'];?></td>
                        <td><?php echo $val['etat'];?></td>
                        <td><?php echo $val['date'];?></td>
                    </tr>
                    <?php endforeach;?>
            </table>
         <?php endif;?>
         <div  class="pagination">
   <?php for($i = 1; $i <= $totalPage; $i++):?>
       <a href="<?= WEB_ROUTE.'/?controller=demandeController&view=1listerdemande&page='.$i.''?>">
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