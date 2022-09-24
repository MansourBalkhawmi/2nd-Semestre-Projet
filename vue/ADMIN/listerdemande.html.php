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
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?> 
<div class="creer">
    <h1>Liste Demande</h1>
     <?php if(!empty($demandes)): ?>
            <table>
                <tr>
                    <th>Motif</th>
                    <th>Etat</th>
                    <th>Date</th>
                </tr>
                <?php foreach ($demandes as $key => $val):?>
                    <tr>
                        <td><?php echo $val['motif'];?></td>
                        <td><?php echo $val['etat'];?></td>
                        <td><?php echo $val['date'];?></td>
                    </tr>
                <?php endforeach;?>
            </table>
         <?php endif;?>
</div>
</body>
</html>