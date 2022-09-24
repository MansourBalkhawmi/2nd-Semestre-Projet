<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/listprof.css">
    <title>Document</title>
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?> 
<div class="creer">
    <h1>Liste Professeur</h1>
     <?php if(!empty($profs)): ?>
            <table>
                <tr>
                    <th>Nom du Prof</th>
                    <th>Grade</th>
                    <th>Classes du Prof</th>
                    <th>Modules du Pros</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($profs as $key => $val):?>
                    <tr>
                        <td><?php echo $val['Nom_complet'];?></td>
                        <td><?php echo $val['grade'];?></td>
                        <td><?php foreach ($val['classe'] as $key => $clas):?><?php echo $clas?>-<?php endforeach;?></td>
                        <td><?php foreach ($val['module'] as $key => $mod):?><?php echo $mod?>-<?php endforeach;?></td>
                            <td>
                        <a href="<?= WEB_ROUTE.'/?controller=classeController&view=editep&id='.$val['id']?>" style="margin: 2vh;"><i class=" es fa-solid fa-pen-to-square"></i></a>
                        <a href="<?= WEB_ROUTE.'/?controller=classeController&view=deletedp&id='.$val['id']?>"><i class=" es1 fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                
                
                <?php endforeach;?>
            </table>
         <?php endif;?>
</div>
</body>
</html>