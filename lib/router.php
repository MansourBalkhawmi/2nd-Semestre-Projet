<?php


if (is_user_connect() || (isset($_REQUEST['controller']) && $_REQUEST['controller'] == "securityController")) {
   
    if (isset($_REQUEST['controller'])) {
        if($_REQUEST['controller'] == "formController") {
            require_once(ROUTE_DIR.'controller/formController.php');
        } elseif ($_REQUEST['controller'] == "affiche") {
            require_once(ROUTE_DIR.'controller/afficheController.php');
        } elseif ($_REQUEST['controller'] == "userController") {
            require_once(ROUTE_DIR.'controller/userController.php');
        } elseif ($_REQUEST['controller'] == "securityController") {
            require_once(ROUTE_DIR.'controller/securityController.php');
        }elseif ($_REQUEST['controller'] == "etudiantController") {
            require_once(ROUTE_DIR.'controller/etudiantController.php');
        }elseif ($_REQUEST['controller'] == "classeController") {
            require_once(ROUTE_DIR.'controller/classeController.php');
        }elseif ($_REQUEST['controller'] == "demandeController") {
            require_once(ROUTE_DIR.'controller/demandeController.php');
        }
    } else {
       
        require_once(ROUTE_DIR.'vue/security/connexion.html.php');
    } 
} else {
    require_once(ROUTE_DIR.'vue/security/connexion.html.php');
} 


?>
