<?php

// class jogador {
//     public $usuario;
//     public $pontos;

//     public function __construct($usuario, $pontos) {
//         $this->usuario = $usuario;
//         $this->pontos = $pontos;
//     }
// }


class Rank {
    public $jogadores;

    public function __construct() {
        $this->jogadores = array();
    }

    public function adicionarJogador($usuario, $pontos){
        $this->jogadores[$usuario] = $pontos;
        return;
    }

    public function atualizarPontuacao($usuario, $pontos){
        $this->jogadores[$usuario] = $pontos;
        return;
    }

    public function removerJogador($usuario){
        unset($this->jogadores[$usuario]);
        return;
    }

    public function listar(){
        arsort($this->jogadores);

        foreach($this->jogadores as $usuario => $pontos){
            echo "Usuário: ".$usuario. ", Pontos: ".$pontos. "\n";
        }
        echo "------------------ \n";
        return;
    }

    public function obterVencedor() {
        arsort($this->jogadores);

        if (!empty($this->jogadores)) {
            $vencedor = key($this->jogadores);
            $pontuacao = $this->jogadores[$vencedor];
            echo "O vencedor é: $vencedor com $pontuacao pontos.";
            return;
        }
    
        echo "Não há um vencedor definido.";
    }
    


}


$rank = new Rank();

$rank->adicionarJogador('PePer', 100);
$rank->adicionarJogador('OCB', 300);
$rank->adicionarJogador('Clebinho', 1);
$rank->adicionarJogador('PaoComOVO', 88);

$rank->listar();

$rank->atualizarPontuacao('PePer', 1000);
$rank->atualizarPontuacao('OCB', 900);
$rank->atualizarPontuacao('Clebinho', 500);
$rank->atualizarPontuacao('PaoComOVO', 880);

$rank->listar();

$rank->removerJogador('Clebinho');

$rank->listar();

$rank->obterVencedor();