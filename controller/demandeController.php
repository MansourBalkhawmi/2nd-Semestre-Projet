<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "ajouterdemande") {
            require_once(ROUTE_DIR.'vue/ADMIN/ajouterdemande.html.php');
        } elseif ($_GET['view'] == "listerdemande") {
            $demandes= get_list_demande();
            require_once(ROUTE_DIR.'vue/ADMIN/listerdemande.html.php');
        }elseif ($_GET['view'] == "succes") {
            require_once(ROUTE_DIR.'vue/ADMIN/ajouterdemande1.html.php');
        }elseif ($_GET['view'] == "1listerdemande") {
            $demandes= get_list_demande();
            require_once(ROUTE_DIR.'vue/ATTACHE/listerdemande.html.php');
        }elseif ($_GET['view'] == "edit") {
           

        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
       if ($_POST['action'] == "demande") {
        demandeajou($_POST);
    }
}
}

function demandeajou($demandeajou) {          
$arrayError = [];
extract($demandeajou);
                
                        valid_champ_user($arrayError, $motif, 'motif');
                        valid_champ_select3($arrayError, $etat, 'etat');
                        if (empty($arrayError)) {
                           
                            if($data['id'] != ""){
            
                                modification($data);
                            }else{
                                $demande = [
                                "motif" => $motif,
                                "etat" => $etat,
                                "date" => date('Y-m-d H:i:s'),
                                "id" =>uniqid(),
                            ];
                            }
                            
                            addDemande($demande);
                            header("location:".WEB_ROUTE."?controller=demandeController&view=succes");
                           
                        } else {
                            $_SESSION['arrayError'] = $arrayError;
                            header("location:".WEB_ROUTE."?controller=demandeController&view=ajouterdemande");
                        }
                        
            
                        
            }

?>