<?php 

if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "connexion") {
            require_once(ROUTE_DIR.'vue/security/connexion.html.php');
        } elseif ($_GET['view'] == "inscription") {
            require_once(ROUTE_DIR.'vue/security/inscription.html.php');
        }elseif ($_GET['view'] == "deconnexion") {
            destroy_session();
            require_once(ROUTE_DIR.'vue/security/connexion.html.php');
        }elseif ($_GET['view'] == "inscription1") {
            require_once(ROUTE_DIR.'vue/accueil.html.php');
        }elseif ($_GET['view'] == "edit") {
            $user=get_user_by_id($_GET['id']);
           
            require_once(ROUTE_DIR.'vue/accueil.html.php');

        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    
        if (isset($_POST['action'])) {
        //var_dump($_POST);die;
       if ($_POST['action'] == "connexion") {
         connexion($_POST);
       } elseif ($_POST['action'] == "inscription") {
            inscription($_POST);
       } 
    }
    }


function connexion($data) {
    $arrayError = [];
    extract($data);
    
    valid_champ_user($arrayError, $email, 'email');
    valideEmail($arrayError, $email, 'email'); 
    valid_champ_user($arrayError, $password, 'password');
    
    
    if (empty($arrayError)) {
        $result = login_password_exist($email, $password);
        if ($result != null) {

            $_SESSION['userConnected'] = $result;

            if ( $_SESSION['userConnected']['role'] == 'ROLE_Admin') {
                header("location:".WEB_ROUTE."?controller=formController&view=admin");
            }else {
                header("location:".WEB_ROUTE."?controller=formController&view=attache");
            }
         
            
        } else {
            $arrayError['error'] = "E-mail ou mot de passe incorrect";
            $_SESSION['arrayError'] = $arrayError;
            header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
        }
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
    }

    
}
function deconnexion(){
    unset($_SESSION['userConnected']);
}

function inscription($inscription) {
    
    $arrayError = [];
    extract($inscription);
    
            valid_champ_user($arrayError, $nomcomplet, 'nomcomplet');
            valideEmail($arrayError, $email, 'email'); 
            valid_champ_user($arrayError, $password, 'password');
            validePassword($arrayError, $password,$confirmPassword, 'confirmPassword');
            valid_champ_user($arrayError, $confirmPassword, 'confirmPassword');
            findUserByEmail($email , "email" , $arrayError);
            if (empty($arrayError)) {
               
                if($data['id'] != ""){

                    modification($data);
                }else{
                    $user = [
                    "nomcomplet" => $nomcomplet,
                    "email" => $email,
                    "password" => $password,
                    "id" =>uniqid(),
                    "role"=> 'ROLE_attaché',
                ];
                }
                
                addUser($user);
                $_SESSION['userConnected'] = $user;
                header("location:".WEB_ROUTE."?controller=securityController&view=connexion");
               
            } else {
                $_SESSION['arrayError'] = $arrayError;
                header("location:".WEB_ROUTE."?controller=securityController&view=inscription");
            }
            

            
}


?>
