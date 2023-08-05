<?php

namespace sistema\model;

use sistema\shared\Conexao;

class CategoriaModel {
    public function buscarTodos(): array {
        $query = "SELECT * FROM categorias";
        $stm = Conexao::getStancia()->query($query);

        $resultado = $stm->fetchAll();

        return $resultado;
    }

    public function buscarTodosAtivos(): array {
        $query = "SELECT * FROM categorias WHERE categoria_status = 1";
        $stm = Conexao::getStancia()->query($query);

        $resultado = $stm->fetchAll();

        return $resultado;
    }

    public function buscarPorId($id): array {
        $query = "SELECT * FROM categorias WHERE categoria_id = {$id}";
        $stm = Conexao::getStancia()->query($query);
        $resultado = $stm->fetch();

        return $resultado;
    }

}
