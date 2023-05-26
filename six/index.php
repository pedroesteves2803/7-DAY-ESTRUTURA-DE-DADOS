<?php

//Cria classe de rank de jogadores
class Rank {
    public $jogadores; //varaivel de jogadores

    //Transfroma a variavel $this->jogadores em array
    public function __construct() {
        $this->jogadores = array();
    }

    //Adicionar jogador passando por usuário e pontos
    public function adicionarJogador($usuario, $pontos){
        $this->jogadores[$usuario] = $pontos; //adiciona o nome do usuário como chave e pontos como valor
        return;
    }

    //Atualiza ponto do jogador pelo usuário
    public function atualizarPontuacao($usuario, $pontos){
        $this->jogadores[$usuario] = $pontos; //atualiza o nome do usuário como chave e pontos como valor
        return;
    }

    //Remover jogador pelo usuário
    public function removerJogador($usuario){
        unset($this->jogadores[$usuario]); //Remove o usuário
        return;
    }

    //Listar jogadores
    public function listar(){
        arsort($this->jogadores); //Deixa o array em ordem decrescente

        //Para cada jogador liste o usuário e os pontos
        foreach($this->jogadores as $usuario => $pontos){
            echo "Usuário: ".$usuario. ", Pontos: ".$pontos. "\n";
        }
        echo "------------------ \n";
        return;
    }

    //Obtenha o usuário com mais pontos
    public function obterVencedor() {
        arsort($this->jogadores); //Deixa o array em ordem decrescente

        //Verifica se a lista de jogadores é diferente de vazia
        if (!empty($this->jogadores)) {
            $vencedor = key($this->jogadores); //pega o nome do usuário pela chave
            $pontuacao = $this->jogadores[$vencedor]; //pega ap do usuário pela chave
            echo "O vencedor é: $vencedor com $pontuacao pontos.";
            return;
        }
    
        echo "Não há um vencedor definido.";
    }
    
}

//Exemplo de uso
$rank = new Rank(); //Cria uma Rank de jogadores

//Adiciona jogadores passando o usuário e os pontos
$rank->adicionarJogador('PePer', 100);
$rank->adicionarJogador('OCB', 300);
$rank->adicionarJogador('Clebinho', 1);
$rank->adicionarJogador('PaoComOVO', 88);

//Listar todos os jogadores
$rank->listar();

//Atualiza pontos de jogadores
$rank->atualizarPontuacao('PePer', 1000);
$rank->atualizarPontuacao('OCB', 900);
$rank->atualizarPontuacao('Clebinho', 500);
$rank->atualizarPontuacao('PaoComOVO', 880);

//Listar todos os jogadores
$rank->listar();

//Remove jogador por usuário
$rank->removerJogador('Clebinho');

//Listar todos os jogadores
$rank->listar();

//Obtenha o vencedor 
$rank->obterVencedor();