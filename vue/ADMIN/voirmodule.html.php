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
    <h1>Liste Modules</h1>
     <?php if(!empty($modules)): ?>
            <table>
                <tr>
                    <th>id-Module</th>
                    <th>Libellé du Module</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($modules as $key => $val):?>
                    <tr>
                        <td><?php echo $val['id'];?></td>
                        <td><?php echo $val['libelmodule'];?></td>
                        <td>
                        <a href="<?= WEB_ROUTE.'/?controller=classeController&view=editem&id='.$val['id']?>" style="margin: 2vh;"><i class=" es fa-solid fa-pen-to-square" title="Modification"></i></a>
                        <a href="<?= WEB_ROUTE.'/?controller=classeController&view=deletedm&id='.$val['id']?>"><i class=" es1 fa-solid fa-trash" title="Supprimer"></i></a>
                        </td>
                    </tr>
                <?php endforeach;?>
            </table>
         <?php endif;?>
</div>
</body>
</html>