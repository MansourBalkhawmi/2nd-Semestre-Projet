<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "succes") {
            require_once(ROUTE_DIR.'vue/ADMIN/creerclasse1.html.php');
        }elseif ($_GET['view'] == "creerclasse") {
            require_once(ROUTE_DIR.'vue/ADMIN/creerclasse.html.php');
        } elseif ($_GET['view'] == "listerclasse") {
            $classes = get_list_classe();
            require_once(ROUTE_DIR.'vue/ADMIN/listerclasse.html.php');
        } elseif ($_GET['view'] == "ajoutermodule") {
            require_once(ROUTE_DIR.'vue/ADMIN/ajoutermodule.html.php');
        }elseif ($_GET['view'] == "succes1") {
            require_once(ROUTE_DIR.'vue/ADMIN/ajoutermodule1.html.php');
        }elseif ($_GET['view'] == "voiremodule") {
            $modules = get_list_module();
            require_once(ROUTE_DIR.'vue/ADMIN/voirmodule.html.php');
        } elseif ($_GET['view'] == "ajouterprof") {
            $classes = get_list_classe();
            $modules = get_list_module();
            require_once(ROUTE_DIR.'vue/ADMIN/ajouterprof.html.php');
        }elseif ($_GET['view'] == "succes2") {
            $classes = get_list_classe();
            $modules = get_list_module();
            require_once(ROUTE_DIR.'vue/ADMIN/ajouterprof1.html.php');
        } elseif ($_GET['view'] == "voirprof") {
            $profs = get_list_prof();
            require_once(ROUTE_DIR.'vue/ADMIN/voirprof.html.php');
        }elseif ($_GET['view'] == "deleted") {
            if(isset($_GET['id'])){
                delete_classe($_GET['id']);
            }
            header("location:".WEB_ROUTE."?controller=classeController&view=listerclasse");
        } elseif ($_GET['view'] == "edite") {
            $classe=get_classe_by_id($_GET['id']);
           
            require_once(ROUTE_DIR.'vue/ADMIN/creerclasse.html.php');

        }elseif ($_GET['view'] == "deletedp") {
            if(isset($_GET['id'])){
                delete_prof($_GET['id']);
            }
            header("location:".WEB_ROUTE."?controller=classeController&view=voirprof");
        } elseif ($_GET['view'] == "editep") {
            $prof=get_prof_by_id($_GET['id']);
            $classes = get_list_classe();
            $modules = get_list_module();
           
            require_once(ROUTE_DIR.'vue/ADMIN/ajouterprof.html.php');

        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
       if ($_POST['action'] == "creer_classe") {
        Creer($_POST);
    }elseif ($_POST['action'] == "ajouter_module") {
        Ajoutermodule($_POST);   
    }elseif ($_POST['action'] == "ajouteprof") {
        Creer_Prof($_POST);   
    }
}
}

    function Creer($Creer) {
    
        $arrayError = [];
        extract($Creer);
        
                valid_champ_user($arrayError, $libelle, 'libelle');
                valid_champ_user($arrayError, $filiere, 'filiere');
                valid_champ_user($arrayError, $niveau, 'niveau');
                if (empty($arrayError)) {
                   
                    if($data['id'] != ""){
    
                        modification_classe($data);
                    }else{
                        $classe = [
                        "libelle" => $libelle,
                        "filiere" => $filiere,
                        "niveau" => $niveau,
                        "id" =>uniqid(),
                    ];
                    }
                    
                    addClasse($classe);
                    header("location:".WEB_ROUTE."?controller=classeController&view=succes");
                   
                } else {
                    $_SESSION['arrayError'] = $arrayError;
                    header("location:".WEB_ROUTE."?controller=classeController&view=creerclasse");
                }
                
            }

function Ajoutermodule($Ajoutermodule) {
            
                $arrayError = [];
                extract($Ajoutermodule);
                
                        valid_champ_user($arrayError, $libelmodule, 'libelmodule');
                        if (empty($arrayError)) {
                           
                            if($data['id'] != ""){
            
                                modification_module($data);

                            }else{
                                $module = [
                                "libelmodule" => $libelmodule,
                                "id" =>uniqid(),
                            ];
                            }
                            
                            addModule($module);
                            header("location:".WEB_ROUTE."?controller=classeController&view=succes1");
                           
                        } else {
                            $_SESSION['arrayError'] = $arrayError;
                            header("location:".WEB_ROUTE."?controller=classeController&view=ajoutermodule");
                        }
                        
                    }

    function Creer_Prof($Creer_Prof) {
                    
                        $arrayError = [];
                        extract($Creer_Prof);
                        
                                valid_champ_user($arrayError, $Nom_complet, 'Nom_complet');
                                valid_champ_select($arrayError, $grade, 'grade');
                                valid_champ_select1($arrayError, $classe, 'classe');
                                valid_champ_select2($arrayError, $module, 'module');
                                if (empty($arrayError)) {
                                   
                                    if($Creer_Prof['id']=$prof['id'] != ""){
                                        $prof = [
                                            "Nom_complet" => $Nom_complet,
                                            "grade" => $grade,
                                            "classe" => $classe,
                                            "module" => $module,
                                        ];
                                        modification_prof($prof);
                                    }else{
                                        $prof = [
                                        "Nom_complet" => $Nom_complet,
                                        "grade" => $grade,
                                        "classe" => $classe,
                                        "module" => $module,
                                        "id" =>uniqid(),
                                    ];
                                    }
                                    
                                    addProf($prof);
                                    header("location:".WEB_ROUTE."?controller=classeController&view=succes2");
                                   
                                } else {
                                    $_SESSION['arrayError'] = $arrayError;
                                    header("location:".WEB_ROUTE."?controller=classeController&view=ajouterprof");
                                }
                                
                    
                                
                    }
                         
?>