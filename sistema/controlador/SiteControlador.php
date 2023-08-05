<?php

namespace sistema\controlador;

use sistema\shared\Controlador;
use sistema\model\PostModel;
use sistema\model\CategoriaModel;

class SiteControlador extends Controlador {

    public function __construct() {
        parent::__construct('sistema/templates/site/view');
    }

    public function index(): void {
        $posts = (new PostModel())->buscarTodos();
        $categorias = (new CategoriaModel)->buscarTodos();
        echo $this->template->renderizar('index.html', ['posts' => $posts, 'categorias'=>$categorias]);
    }
    
     public function buscarPostPorId(int $id): void {
        $posts = (new PostModel())->buscarPorId($id);
        $categorias = (new CategoriaModel)->buscarTodos();
        echo $this->template->renderizar('post.html', ['posts' => $posts, 'categorias'=>$categorias]);
    }
    
      public function buscarPostPorCategoria(int $idCategoria): void {
        $posts = (new PostModel())->buscarPorCategoria($idCategoria);
        $categorias = (new CategoriaModel)->buscarTodos();
        echo $this->template->renderizar('index.html', ['posts' => $posts, 'categorias'=>$categorias]);
    }

    public function sobre(): void {
        echo  $this->template->renderizar('sobre-nos.html', []);
    }
    
    public function erro(): void {
        echo  $this->template->renderizar('404.html', []);
    }


}
