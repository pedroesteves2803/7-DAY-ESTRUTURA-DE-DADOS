<?php

class Pedido{
    public $nomePrato;
    public $mesa;

    public function __construct($nomePrato, $mesa){
        $this->nomePrato = $nomePrato;
        $this->mesa = $mesa;
    }
}

class ListaDePedidos{
    
    private $lista;

    public function __construct(){
        $this->lista = array();
    }

    public function adicionarPedido($nomePrato, $mesa){
        $pedido = new Pedido($nomePrato, $mesa);
        array_push($this->lista, $pedido);
    }

    public function removerPedido(){
        array_shift($this->lista);
    }

    public function listarPedidos(){
        foreach($this->lista as $pedido){
            echo "Prato: ".$pedido->nomePrato. ", Mesa: ".$pedido->mesa. "\n";
        }

        echo "------------------ \n";
    }
}

$listaDePedidos = new ListaDePedidos();

$listaDePedidos->adicionarPedido('Macarrão', 1);
$listaDePedidos->adicionarPedido('Pão na chapa', 2);
$listaDePedidos->adicionarPedido('Chopp', 9);

$listaDePedidos->listarPedidos();

$listaDePedidos->adicionarPedido('Peixe', 5);

$listaDePedidos->listarPedidos();

$listaDePedidos->removerPedido();

$listaDePedidos->listarPedidos();
