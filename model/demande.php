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
    $modif_demande = get_file_demande();
    foreach ($modif_demande as $key => $value) {
        if($value['id'] == $demande['id']){
            $modif_demande[$key] = $demande;
        }
    }
    ajouter_fichier_demande($modif_demande);
}

function getListToDisplay2(array $arrayPersonne, $page, $taillePage) {
    $indiceDepart = ($taillePage*$page) - $taillePage;
    $indiceArriver = $indiceDepart + $taillePage - 1;
    $arrayPaged = [];
 
    for ($i=$indiceDepart; $i< count($arrayPersonne); $i++){
        if ($indiceArriver < count($arrayPersonne)) {
            array_push($arrayPaged, $arrayPersonne[$i]);
            if ($i == $indiceArriver) {
                break;
            }
        }else {
            array_push($arrayPaged, $arrayPersonne[$i]);
        }
    }
    return $arrayPaged;
 }