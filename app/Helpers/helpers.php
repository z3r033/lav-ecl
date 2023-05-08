<?php 

define("PAGELIST","liste");
define("PAGECREATEFORM","create");
define("PAGEEDITFORM","edit");

 function userfullName(){

    return auth()->user()->nom . " " . auth()->user()->prenom;
    
}

function setMenuClass($route, $classe){
    $routeActuel = request()->route()->getName();

    if(contains($routeActuel, $route) ){
        return $classe;
    }
    return "";
}

function setMenuActive($route){
    $routeActuel = request()->route()->getName();

    if($routeActuel === $route ){
        return "active";
    }
    return "";
}

function contains($container, $contenu){
    return str_contains($container, $contenu);
}
