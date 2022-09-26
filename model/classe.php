<?php 
function addClasse(array $classe) {
    $classes = get_file_classe();
    if (!isset($classes)) {
        $classes = [];
    }

    array_push($classes, $classe);
    ajouter_fichier_classe($classes);
}

function get_list_classe() {
    $classes = get_file_classe();
    if (!isset($classes)) {
        $classes = [];
    }
 
    return $classes;
 }

function get_classe_by_id(string $id) {
    $classes = get_list_classe();
    foreach ($classes as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_classe() {
    $json = file_get_contents(ROUTE_DIR.'data/classe.data.json');
    return json_decode($json, true);
}

function ajouter_fichier_classe(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/classe.data.json', $json);
}

function delete_classe(string $id):bool{
    $data = get_file_classe();
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
        ajouter_fichier_classe($tab);
    }
    return $yes;
     
}

function modification_classe(array $classe){
    $modif_classe = get_file_classe();
    foreach ($modif_classe as $key => $value) {
        if($value['id'] == $classe['id']){
            $modif_classe[$key] = $classe;
        }
    }
    ajouter_fichier_classe($modif_classe);
}