<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "inscrireetudiant") {
            $classes = get_list_classe();
            require_once(ROUTE_DIR.'vue/ATTACHE/inscrireetudiant.html.php');
        }elseif ($_GET['view'] == "succes") {
            $classes = get_list_classe();
            require_once(ROUTE_DIR.'vue/ATTACHE/inscrireetudiant1.html.php');
        }elseif ($_GET['view'] == "listeretudiant") {
            $etudiants = [];
            if(isset($_GET["matricule"])) {
                $etudiants = get_list_etudiant_by_matricule($_GET["matricule"]);
            } else {
                $etudiants = get_list_etudiant();
            }
            require_once(ROUTE_DIR.'vue/ATTACHE/listeretudiant.html.php');
        }elseif ($_GET['view'] == "edit") {
            $user=get_user_by_id($_GET['id']);
           
            require_once(ROUTE_DIR.'vue/accueil.html.php');

        }
    }
}elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
       if ($_POST['action'] == "inscrit") {
        inscrire($_POST);
    } elseif ($_POST['action'] == "search") {
        $matricule = $_POST["matricule"];
        header("Location:".WEB_ROUTE."?controller=etudiantController&view=listeretudiant&matricule=".$matricule);
    }
}
}
    function inscrire($inscrire) {
    
        $arrayError = [];
        extract($inscrire);
        
                valid_champ_user($arrayError, $nom_complet, 'nom_complet');
                valid_champ($arrayError, $telephone, 'telephone');
                valid_champ_user($arrayError, $adresse, 'adresse');
                valid_champ_sele($arrayError, $anneescolaire, 'anneescolaire');
                valid_champ_select1($arrayError, $classe, 'classe');

                if (empty($arrayError)) {
                   
                    if($data['id'] != ""){
    
                        modification($data);
                    }else{
                        $etudiant = [
                        "nom_complet" => $nom_complet,
                        "telephone" => $telephone,
                        "adresse" => $adresse,
                        "anneescolaire" => $anneescolaire,
                        "classe" => $classe,
                        "date" => date('Y-m-d H:i:s'),
                        "matricule" =>uniqid(),
                        "id" =>uniqid(),
                    ];
                    }
                    
                    addEtudiant($etudiant);
                    header("location:".WEB_ROUTE."?controller=etudiantController&view=succes");
                   
                } else {
                    $_SESSION['arrayError'] = $arrayError;
                    header("location:".WEB_ROUTE."?controller=etudiantController&view=inscrireetudiant");
                }
                
            }

?>