<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "inscrireetudiant") {
            $classes = get_list_classe();
            
            $etudiants = [];
            if(isset($_GET["matricule"])) {
                $etudiants = get_list_etudiant_by_matricule($_GET["matricule"]);
                $etudiants[0]["matricule"];
            if(isset($etudiants) && count($etudiants)>0){
                require_once(ROUTE_DIR.'vue/ATTACHE/inscrireetudiant1.html.php');
            }else{
                require_once(ROUTE_DIR.'vue/ATTACHE/inscrireetudiant.html.php');
            }
            }else {
            require_once(ROUTE_DIR.'vue/ATTACHE/inscrireetudiant.html.php');
        }
    }elseif ($_GET['view'] == "succes") {
            $classes = get_list_classe();
            require_once(ROUTE_DIR.'vue/ATTACHE/inscrireetudiant1.html.php');

        }elseif ($_GET['view'] == "listeretudiant") {
            $etudiants = get_list_etudiant();
            $etudiants = [];
            if(isset($_GET["matricule"])) {
                $etudiants = get_list_etudiant_by_matricule($_GET["matricule"]);
                require_once(ROUTE_DIR.'vue/ATTACHE/listeretudiant1.html.php');
            }else {
                $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
                $etudiants = get_list_etudiant();
                 $totalPage=countpage(5, $etudiants);
            $etudiants= getListToDisplay3($etudiants, $page , 5);
                require_once(ROUTE_DIR.'vue/ATTACHE/listeretudiant.html.php');
            }
            
        }elseif ($_GET['view'] == "deletee") {
            if(isset($_GET['id'])){
                delete_etudiant($_GET['id']);
            }
            header("location:".WEB_ROUTE."?controller=etudiantController&view=listeretudiant");

        }elseif ($_GET['view'] == "editee") {
            $classes = get_list_classe();
            $etudiant=get_etudiant_by_id($_GET['id']);
           
            require_once(ROUTE_DIR.'vue/ATTACHE/inscrireetudiant.html.php');

        }
    }
}elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
       if ($_POST['action'] == "inscrit") {
        if(isset($_POST['inscrit']) && $_POST['inscrit']== "inscrit"){
        inscrire($_POST);
    }else {
        $matricule = $_POST['matricule'];
        header("Location:".WEB_ROUTE."?controller=etudiantController&view=inscrireetudiant&matricule=".$matricule);
    }
    } elseif ($_POST['action'] == "search") {
        $matricule = $_POST["matricule"];
        header("Location:".WEB_ROUTE."?controller=etudiantController&view=listeretudiant&matricule=".$matricule);
    }elseif ($_POST['action'] == "inscrite") {
        inscrire($_POST);
    }
}

}
    
function inscrire($data) {
    
        $arrayError = [];
        extract($data);
        
                valid_champ_user($arrayError, $nom_complet, 'nom_complet');
                valid_champ($arrayError, $telephone, 'telephone');
                valid_champ_user($arrayError, $adresse, 'adresse');
                valid_champ_sele($arrayError, $anneescolaire, 'anneescolaire');
                valid_champ_sele1($arrayError, $sexe, 'sexe');
                valid_champ_select1($arrayError, $classe, 'classe');

                if (empty($arrayError)) {
                   
                    if($data['id'] != ""){
                        $etudiant = [
                            "nom_complet" => $nom_complet,
                            "telephone" => $telephone,
                            "adresse" => $adresse,
                            "sexe" => $sexe,
                            "anneescolaire" => $anneescolaire,
                            "classe" => $classe,
                            "date" => date('Y-m-d H:i:s'),
                            "matricule" =>$matriculeedit,
                            "id" =>$id,
                        ];
                        //var_dump($data);die;
                        modification_etudiant($etudiant);
                      
                    }else{
                        $etudiant = [
                        "nom_complet" => $nom_complet,
                        "telephone" => $telephone,
                        "adresse" => $adresse,
                        "sexe" => $sexe,
                        "anneescolaire" => $anneescolaire,
                        "classe" => $classe,
                        "demande" => $demande,
                        "date" => date('Y-m-d H:i:s'),
                        "matricule" =>uniqid(),
                        "id" =>uniqid(),
                    ];
                    addEtudiant($etudiant);
                }
                    header("location:".WEB_ROUTE."?controller=etudiantController&view=listeretudiant");
                } else {
                    $_SESSION['arrayError'] = $arrayError;
                    header("location:".WEB_ROUTE."?controller=etudiantController&view=inscrireetudiant");
                }
                
            }

?>