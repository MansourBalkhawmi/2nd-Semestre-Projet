<?php 
function addProf(array $prof) {
    $profs = get_file_prof();
    if (!isset($profs)) {
        $profs = [];
    }

    array_push($profs, $prof);
    ajouter_fichier_prof ($profs);
}

function get_list_prof() {
    $profs = get_file_prof();
    if (!isset($profs)) {
        $profs = [];
    }

    return $profs;
}

function get_prof_by_id(string $id) {
    $profs = get_list_prof();
    foreach ($profs as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_prof() {
    $json = file_get_contents(ROUTE_DIR.'data/professeur.data.json');
    return json_decode($json, true);
}

function ajouter_fichier_prof(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/professeur.data.json', $json);
}

function delete_prof(string $id):bool{
    $data = get_file_prof();
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
        ajouter_fichier_prof($tab);
    }
    return $yes;
     
}

function modification_prof(array $prof){
    $modif = get_file_prof();
    foreach ($modif as $key => $value) {
        if($value['id'] == $prof['id']){
            $modif[$key] = $prof;
        }
    }
    ajouter_fichier_prof($modif);
}