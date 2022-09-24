<?php 
function addModule(array $module) {
    $modules = get_file_module();
    if (!isset($modules)) {
        $modules = [];
    }

    array_push($modules, $module);
    ajouter_fichier_module($modules);
}

function get_list_module() {
    $modules = get_file_module();
    if (!isset($modules)) {
        $modules = [];
    }

    return $modules;
}

function get_module_by_id(string $id) {
    $modules = get_list_module();
    foreach ($modules as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_module() {
    $json = file_get_contents(ROUTE_DIR.'data/module.data.json');
    return json_decode($json, true);
}

function ajouter_fichier_module(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/module.data.json', $json);
}

function delete_module(string $id):bool{
    $data = get_file_module();
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
        ajouter_fichier_module($tab);
    }
    return $yes;
     
}

function modification_module(array $module){
    $modif = get_file_module();
    foreach ($modif as $key => $value) {
        if($value['id'] == $module['id']){
            $modif[$key] = $module;
        }
    }
    ajouter_fichier_module($modif);
}