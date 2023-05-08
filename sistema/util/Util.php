<?php

namespace sistema\util;

abstract class Util {

    public static function resumirTesto(string $texto, int $limite): string {
        $textoLimpo = trim(strip_tags($texto));
        return (mb_strlen($textoLimpo) > $limite) ? (mb_substr($textoLimpo, 0, mb_strrpos(mb_substr($textoLimpo, 0, $limite), ''))) . '...' : $texto;
    }

    public static function fomataParaMoeda(float $valor = 0): string {
        return 'R$ ' . number_format($valor, 2, ',', '.');
    }

    public static function fomataNumero(int $valor = 0): string {
        return number_format($valor, 0, '.', '.');
    }

    public static function isEmailValido(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isUrlValida(string $url): bool {
        return filter_var($url, FILTER_VALIDATE_URL);
    }

    public static function isLocalHost(): bool {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        return ($servidor == 'localhost');
    }

    public static function url(string $uri): string {
        $servidor = filter_input(INPUT_SERVER, 'SERVER_NAME');
        $ambiente = ($servidor == 'localhost' ? URL_DESENVOLVIMENTO : URL_PRODUCAO);
        return $ambiente . $uri;
    }

    public static function limpaCpf(string $cpf): string {
        return preg_replace('/[^0-9]/', '', $cpf);
    }

    public static function isCpfValido(string $cpf): bool {
        $cpfNumerico = preg_replace('/[^0-9]/is', '', $cpf);

        if (strlen($cpfNumerico) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpfNumerico)) {
            return false;
        }
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpfNumerico[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpfNumerico[$c] != $d) {
                return false;
            }
        }
        return true;
    }

}
