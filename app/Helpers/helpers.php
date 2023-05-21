<?php

define("PAGELIST","liste");
define("PAGECREATEFORM","create");
define("PAGEEDITFORM","edit");

use Illuminate\Pagination\LengthAwarePaginator;
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


if (! function_exists('paginateCollection')) {
    function paginateCollection($collection, $perPage = 15, $pageName = 'page') {
        $page = request()->get($pageName, 1);
        $offset = ($page - 1) * $perPage;

        $paginator = new LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $collection->count(),
            $perPage,
            $page,
            ['path' => url()->current(), 'query' => request()->query()]
        );

        return $paginator;
    }
}
