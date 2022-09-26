<?php
function est_vide($str) {
    $valeur=str_replace(" ","",$str);
    return empty($valeur);
}

function est_entier($str) {
    $valeur=str_replace(" ","",$str);
    return is_numeric($valeur);
}

function valid_champ(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    } else if (!est_entier($valeur)) {
        $arrayError[$key] = "Veuillez saisir des nombres";
    }
}

function valid_champ_user(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    }
}
function valid_champ_select(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Choisit son grade";
    }
}

function valid_champ_sele(array &$arrayError, $str, string $key) {
        $valeur=str_replace(" ","",$str);
        if (est_vide($valeur)) {
            $arrayError[$key] = "Choisit l'Année Scolaire";
        }
    
}
function valid_champ_sele1(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Choisit votre Genre";
    }

}
function valid_champ_select1(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Choisit la classe";
    }
}
function valid_champ_select2(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Choisit module";
    }
}
function valid_champ_select3(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Choisit l'etat du demande";
    }
}
function valid_champ_select4(array &$arrayError, $str, string $key) {
    $valeur=str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Choisit l'étudiant";
    }
}
 function valideEmail(array &$arrayError, $email, string $key){
   // $email=str_replace(" ","",$str);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $arrayError[$key] = "  Le format E-mail est invalide. (aa@gmail.com)";
    }
 }

 function validePassword(array &$arrayError, $password1,$password2, string $key){
    // $email=str_replace(" ","",$str);
     if ($password2 != $password1) {
         $arrayError[$key] = "Ce mot de passe est diffferent du premier";
     }
  }

  function valid_input(array &$arrayError, $str, string $key) {
      $valeur = str_replace(" ","",$str);
      if (empty($valeur)) {
          $arrayError[$key]= "Ce champ est obligatoire";
      }elseif ($valeur.trim(" ") == "") {
        $arrayError[$key]= "Ce champ est obligatoire";
    }
  }
  function valid_point( array &$arrayError, $valeur, string $key) {
      if (empty($valeur)) {
          $arrayError[$key] = "Ce champ est obligatoire";
      }  elseif ($valeur <= 0) {
        $arrayError[$key] = "Veillez saisir de nombres positifs";
  }

}
?>
