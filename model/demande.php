<?php 
function addDemande(array $demande) {
    $demandes = get_file_demande();
    if (!isset($demandes)) {
        $demandes = [];
    }

    array_push($demandes, $demande);
    ajouter_fichier_demande($demandes);
}

function get_list_demande() {
    $demandes = get_file_demande();
    if (!isset($demandes)) {
        $demandes = [];
    }

    return $demandes;
}

function get_demande_by_id(string $id) {
    $demandes = get_list_demande();
    foreach ($demandes as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_demande() {
    $json = file_get_contents(ROUTE_DIR.'data/demande.data.json');
    return json_decode($json, true);
}

function ajouter_fichier_demande(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/demande.data.json', $json);
}

function delete_demande(string $id):bool{
    $data = get_file_demande();
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
        ajouter_fichier_demande($tab);
    }
    return $yes;
     
}

function modification_demande(array $demande){
    $modif = get_file_demande();
    foreach ($modif as $key => $value) {
        if($value['id'] == $demande['id']){
            $modif[$key] = $demande;
        }
    }
    ajouter_fichier_demande($modif);
}