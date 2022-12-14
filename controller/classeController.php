<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "succes") {
            require_once(ROUTE_DIR.'vue/ADMIN/creerclasse1.html.php');
        }elseif ($_GET['view'] == "creerclasse") {
            require_once(ROUTE_DIR.'vue/ADMIN/creerclasse.html.php');
        } elseif ($_GET['view'] == "listerclasse") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $classes = get_list_classe();
            $totalPage=countpage(5, $classes);
         $classes= getListToDisplay($classes, $page , 5);
            require_once(ROUTE_DIR.'vue/ADMIN/listerclasse.html.php');
        } elseif ($_GET['view'] == "ajoutermodule") {
            require_once(ROUTE_DIR.'vue/ADMIN/ajoutermodule.html.php');
        }elseif ($_GET['view'] == "succes1") {
            require_once(ROUTE_DIR.'vue/ADMIN/ajoutermodule1.html.php');
        }elseif ($_GET['view'] == "voiremodule") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $modules = get_list_module();
            $totalPage=countpage(5, $modules);
            $modules= getListToDisplay1($modules, $page , 5);
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
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $profs = get_list_prof();
            $totalPage=countpage(5, $profs);
            $profs= getListToDisplay1($profs, $page , 5);
            require_once(ROUTE_DIR.'vue/ADMIN/voirprof.html.php');
        }elseif ($_GET['view'] == "deleted") {
            if(isset($_GET['id'])){
                delete_classe($_GET['id']);
            }
            header("location:".WEB_ROUTE."?controller=classeController&view=listerclasse");
        }elseif ($_GET['view'] == "edite") {
            $classe=get_classe_by_id($_GET['id']);
           
            require_once(ROUTE_DIR.'vue/ADMIN/creerclasse.html.php');

        }elseif ($_GET['view'] == "deletedm") {
            if(isset($_GET['id'])){
                delete_module($_GET['id']);
            }
            header("location:".WEB_ROUTE."?controller=classeController&view=voiremodule");
        }  elseif ($_GET['view'] == "editem") {
            $module=get_module_by_id($_GET['id']);
           
            require_once(ROUTE_DIR.'vue/ADMIN/ajoutermodule.html.php');

        }elseif ($_GET['view'] == "deletep") {
            if(isset($_GET['id'])){
                delete_prof($_GET['id']);
            }
            header("location:".WEB_ROUTE."?controller=classeController&view=voirprof");
        } elseif ($_GET['view'] == "editep") {
            $classes = get_list_classe();
            $modules = get_list_module();
            $prof=get_prof_by_id($_GET['id']);
           
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

    function Creer($data) {
    
        $arrayError = [];
        extract($data);
        
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
                    addClasse($classe);
                    }
    
                    header("location:".WEB_ROUTE."?controller=classeController&view=listerclasse");
                    
                } else {
                    $_SESSION['arrayError'] = $arrayError;
                header("location:".WEB_ROUTE."?controller=classeController&view=creerclasse");
                }
                
            }

function Ajoutermodule($data) {
            
                $arrayError = [];
                extract($data);
                
                        valid_champ_user($arrayError, $libelmodule, 'libelmodule');
                        if (empty($arrayError)) {
                           
                            if($data['id'] != ""){
            
                                modification_module($data);

                            }else{
                                $module = [
                                "libelmodule" => $libelmodule,
                                "id" =>uniqid(),
                            ];
                            addModule($module);
                            }
                            
                            header("location:".WEB_ROUTE."?controller=classeController&view=voiremodule");
                           
                        } else {
                            $_SESSION['arrayError'] = $arrayError;
                            header("location:".WEB_ROUTE."?controller=classeController&view=ajoutermodule");
                        }
                        
                    }

    function Creer_Prof($data) {
                    
                        $arrayError = [];
                        extract($data);
                        
                                valid_champ_user($arrayError, $Nom_complet, 'Nom_complet');
                                valid_champ_select($arrayError, $grade, 'grade');
                                valid_champ_select1($arrayError, $classe, 'classe');
                                valid_champ_select2($arrayError, $module, 'module');
                                if (empty($arrayError)) {
                                   
                                    if($data['id'] != ""){
                        
                                        modification_prof($data);
                                    }else{
                                        $prof = [
                                        "Nom_complet" => $Nom_complet,
                                        "grade" => $grade,
                                        "classe" => $classe,
                                        "module" => $module,
                                        "id" =>uniqid(),
                                    ];
                                    addProf($prof);
                                    }
                                    
                                    header("location:".WEB_ROUTE."?controller=classeController&view=voirprof");
                                   
                                } else {
                                    $_SESSION['arrayError'] = $arrayError;
                                    header("location:".WEB_ROUTE."?controller=classeController&view=ajouterprof");
                                }
                                
                    
                                
                    }
                         
?>