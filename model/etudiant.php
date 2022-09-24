<?php 
function addEtudiant(array $etudiant) {
    $etudiants = get_file_etudiant();
    if (!isset($etudiants)) {
        $etudiants = [];
    }

    array_push($etudiants, $etudiant);
    ajouter_fichier_etudiant($etudiants);
}

function get_list_etudiant() {
    $etudiants = get_file_etudiant();
    if (!isset($etudiants)) {
        $etudiants = [];
    }

    return $etudiants;
}
function get_list_etudiant_by_matricule($matricule) {
    $etudiants = get_list_etudiant();
    $etudiantsTemp = [];
    if (!isset($etudiants)) {
        $etudiants = [];
    } else {
        foreach ($etudiants as $key => $value) {
            if($value["categorie"] == $matricule) {
                array_push($etudiantsTemp, $value);
            }
        }
    }

    return $etudiantsTemp;
}

function get_etudiant_by_id(string $id) {
    $etudiants = get_list_etudiant();
    foreach ($etudiants as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_etudiant() {
    $json = file_get_contents(ROUTE_DIR.'data/etudiant.data.json');
    return json_decode($json, true);
}

function ajouter_fichier_etudiant(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/etudiant.data.json', $json);
}

function delete_etudiant(string $id):bool{
    $data = get_file_etudiant();
    $tab=[];
    $yes=false;
    foreach ($data as $value) {
        if ($value['id'] == $id) {
            $yes = true;
        }else{
            $tab [] = $value;
        }
    }
    if($yes){
        ajouter_fichier_etudiant($tab);
    }
    return $yes;
     
}

function modification_etudiant(array $etudiant){
    $modif = get_file_etudiant();
    foreach ($modif as $key => $value) {
        if($value['id'] == $etudiant['id']){
            $modif[$key] = $etudiant;
        }
    }
    ajouter_fichier_etudiant($modif);
}