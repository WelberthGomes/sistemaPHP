<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace sistema\controlador\admin;

use sistema\model\PostModel;
use sistema\model\CategoriaModel;

class AdminPosts extends AdminControlador {

    public function buscarTodos(): void {
        $posts = (new PostModel())->buscarTodos();
        echo $this->template->renderizar('posts/listar.html', ['posts' => $posts]);
    }
    
    public function cadastrar(): void {
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $categorias = (new CategoriaModel)->buscarTodosAtivos();
        echo $this->template->renderizar('posts/cadastrar.html', ['categorias'=> $categorias]);
    }

}
