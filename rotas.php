<?php

use Pecee\SimpleRouter\SimpleRouter;
use sistema\util\Util;

try {
    SimpleRouter::setDefaultNamespace("sistema\controlador");

    SimpleRouter::get(URL_BASE, "SiteControlador@index");
    SimpleRouter::get(URL_BASE . "sobre-nos", "SiteControlador@sobre");
    SimpleRouter::get(URL_BASE . "post/{id}", "SiteControlador@buscarPostPorId");
    SimpleRouter::get(URL_BASE . "post-categoria/{id}", "SiteControlador@buscarPostPorCategoria");

    SimpleRouter::get(URL_BASE . "404", "SiteControlador@erro");

    SimpleRouter::group(['namespace' => 'admin'], function () {
       SimpleRouter::get(URL_ADMIN . 'dashboard', "AdminDashboard@dashboard");
              SimpleRouter::get(URL_ADMIN . 'posts', "AdminPosts@buscarTodos");
              SimpleRouter::match(['get','post'],URL_ADMIN . 'post-cadastrar', "AdminPosts@cadastrar");
              

    });

    SimpleRouter::start();
} catch (\Pecee\SimpleRouter\Exceptions\NotFoundHttpException $ex) {
    if (Util::isLocalHost()) {
        echo $ex;
    } else {
        Util::redirecionar("404");
    }
}
