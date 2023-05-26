<?php 

//cria uma lista de compras
class listaDeCompras {
    public $lista;

    //transforma a lista de compras em array
    public function __construct() {
        $this->lista = [];
    }

    //adicona um item a lista de compras
    public function adicionarItem($nomeProduto, $quantidade) {
        $this->lista[$nomeProduto] = $quantidade;
    }

    //remove um item da lista de compras
    public function removerItem($nomeProduto) {
        unset($this->lista[$nomeProduto]);
    }

    //lista um item da lista de compras
    public function listarItens(){
        foreach ($this->lista as $nomeItem => $quantidadeItem) {
            echo nl2br("Produto: " . $nomeItem . ", Quantidade: " . $quantidadeItem. "\n");
        }
    echo nl2br("-------------------\n");

    }
}

//exemplo de uso
$lista = new listaDeCompras(); // cria uma lista
//Adiciona itens
$lista->adicionarItem('Pão', 10);
$lista->adicionarItem('Sorvete', 10);
$lista->adicionarItem('Arroz', 10);

$lista->listarItens(); //Listar itens

$lista->removerItem('Pão');

$lista->listarItens();

 ?>