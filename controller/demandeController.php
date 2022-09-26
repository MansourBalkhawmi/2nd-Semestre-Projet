<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "ajouterdemande") {
            $etudiants=get_list_etudiant(); 
            require_once(ROUTE_DIR.'vue/ADMIN/ajouterdemande.html.php');
        } elseif ($_GET['view'] == "listerdemande") {
            $demandes= get_list_demande();
            $etudiants=get_list_etudiant(); 
            require_once(ROUTE_DIR.'vue/ADMIN/listerdemande.html.php');
        }elseif ($_GET['view'] == "1listerdemande") {
            $demandes= get_list_demande();
            require_once(ROUTE_DIR.'vue/ATTACHE/listerdemande.html.php');
        }elseif ($_GET['view'] == "edite") {
            $demande=get_demande_by_id($_GET['id']);
            $etudiants=get_list_etudiant(); 
            require_once(ROUTE_DIR.'vue/ADMIN/ajouterdemande.html.php');
        }elseif ($_GET['view'] == "delete") {
            if(isset($_GET['id'])){
                delete_demande($_GET['id']);
            }
            header("location:".WEB_ROUTE."?controller=demandeController&view=listerdemande");
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "demande") {
            demandeajou($_POST);
        }
    }
}


function demandeajou($data) {          
$arrayError = [];
extract($data);
                
                        valid_champ_user($arrayError, $motif,'motif');
                        valid_champ_select3($arrayError, $etat,'etat');
                        valid_champ_select4($arrayError, $etudiant,'etudiant');

                        if (empty($arrayError)) {
                           
                            if($data['id'] != ""){
                                $demande = [
                                    "motif" => $motif,
                                    "etat" => $etat,
                                    "etudiant" => $etudiant,
                                    "date" => date('Y-m-d H:i:s'),
                                    "id" =>$id,
                                ];
                                modification_demande($demande);
                             
                            }else{
                                $demande = [
                                "motif" => $motif,
                                "etat" => $etat,
                                "etudiant" => $etudiant,
                                "date" => date('Y-m-d H:i:s'),
                                "id" =>uniqid(),
                            ];
                            addDemande($demande);
                        }
                        
                       header("location:".WEB_ROUTE."?controller=demandeController&view=listerdemande");
                           
                        } else {
                            $_SESSION['arrayError'] = $arrayError;
                            header("location:".WEB_ROUTE."?controller=demandeController&view=ajouterdemande");
                        }
                        
            
                        
            }

?>