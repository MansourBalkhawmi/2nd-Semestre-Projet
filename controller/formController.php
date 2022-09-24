<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "admin") {
            require_once(ROUTE_DIR.'vue/ADMIN/accueil-admin.html.php');
        } elseif ($_GET['view'] == "attache") {
            require_once(ROUTE_DIR.'vue/ATTACHE/accueil-attache.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {

}



?>