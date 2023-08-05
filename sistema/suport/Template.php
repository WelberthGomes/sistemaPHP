<?php

namespace sistema\suport;

use Twig\Environment;
use Twig\Lexer;
use Twig\TwigFunction;
use sistema\util\Util;

class Template {

    private Environment $twig;

    public function __construct(string $diretorio) {
        $loader = new \Twig\Loader\FilesystemLoader($diretorio);
        $this->twig = new \Twig\Environment($loader);
        $lexer = new Lexer($this->twig, array($this->adicionarFuncoesAoTwig()));
        $this->twig->setLexer($lexer);
    }

    function renderizar(string $view, array $dados): string {
        return $this->twig->render($view, $dados);
    }

    private function adicionarFuncoesAoTwig(): void {
        array(
            $this->twig->addFunction(
                    new TwigFunction('url', function (string $url = null) {
                                return Util::url($url);
                            })
            ),
            $this->twig->addFunction(
                    new TwigFunction('resumirTexto', function (string $texto, int $limite) {
                                return Util::resumirTexto($texto, $limite);
                            })
            ),
            $this->twig->addFunction(
                    new TwigFunction('fomataParaMoeda', function (float $valor = 0) {
                                return Util::fomataParaMoeda($valor);
                            })
            ),
            $this->twig->addFunction(
                    new TwigFunction('formataNumero', function (int $valor = 0) {
                                return Util::formataNumero($valor);
                            })
            )
        );
    }

}
