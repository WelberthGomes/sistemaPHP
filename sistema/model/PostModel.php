<?php

namespace sistema\model;

use sistema\shared\Conexao;

class PostModel {

    public function buscarTodos(): array {
        $query = "SELECT * FROM  POSTS P LEFT JOIN CATEGORIAS C ON P.categoria_id = C.categoria_id";
        $stm = Conexao::getStancia()->query($query);

        $resultado = $stm->fetchAll();

        return $resultado;
    }

    public function buscarTodosAtivos(): array {
        $query = "SELECT * FROM posts WHERE status = 1";
        $stm = Conexao::getStancia()->query($query);

        $resultado = $stm->fetchAll();

        return $resultado;
    }

    public function buscarPorId($id): array {
        $query = "SELECT * FROM posts WHERE post_id = {$id}";
        $stm = Conexao::getStancia()->query($query);
        $resultado = $stm->fetchAll();

        return $resultado;
    }
    
    public function buscarPorCategoria($idCategoria): array {
        $query = "SELECT * FROM  POSTS P INNER JOIN CATEGORIAS C ON P.categoria_id = C.categoria_id WHERE C.categoria_id = {$idCategoria}";
        $stm = Conexao::getStancia()->query($query);
        $resultado = $stm->fetchAll();

        return $resultado;
    }
    
     public function cadastrar(): array {
        $query = "SELECT * FROM  POSTS P INNER JOIN CATEGORIAS C ON P.categoria_id = C.categoria_id WHERE C.categoria_id = {$idCategoria}";
        $stm = Conexao::getStancia()->query($query);
        $resultado = $stm->fetchAll();

        return $resultado;
    }

    public function buscarFiltrado($filtro) {
        $query = "SELECT * FROM posts";
    }

}
