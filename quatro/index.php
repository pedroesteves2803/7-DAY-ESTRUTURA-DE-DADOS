<?php

// criar classse de Pedido
class Pedido{
    public $nomePrato;
    public $mesa;

    //adiciona nome e mesa ao pedido
    public function __construct($nomePrato, $mesa){
        $this->nomePrato = $nomePrato;
        $this->mesa = $mesa;
    }
}

//criar classse de pedido
class ListaDePedidos{
    
    private $lista;// criar lista de pedidos

    //adiciona array a variavel de lista de pedidos
    public function __construct(){
        $this->lista = array();
    }

    //adciona pedido a lista passando os parametros nome e mesa
    public function adicionarPedido($nomePrato, $mesa){
        $pedido = new Pedido($nomePrato, $mesa); // instancia uma nova classe de pedido
        array_push($this->lista, $pedido); // adiciona o pedido a lista de pedidos 
    }

    //remover o primeiro pedidio da lista
    public function removerPedido(){
        array_shift($this->lista);
    }

    //lista todos os os pedidos
    public function listarPedidos(){
        foreach($this->lista as $pedido){
            echo "Prato: ".$pedido->nomePrato. ", Mesa: ".$pedido->mesa. "\n";
        }

        echo "------------------ \n";
    }
}

//exemplo de uso

$listaDePedidos = new ListaDePedidos(); // cria uma lista de pedidos


//adiciona pedido a lista de pedidos passando o nome e a mesa
$listaDePedidos->adicionarPedido('Macarrão', 1);
$listaDePedidos->adicionarPedido('Pão na chapa', 2);
$listaDePedidos->adicionarPedido('Chopp', 9);

//lista todos os pedidos
$listaDePedidos->listarPedidos();

$listaDePedidos->adicionarPedido('Peixe', 5); //adiciona pedido a lista

//lista todos os pedidos
$listaDePedidos->listarPedidos();

//remove primeiro pedido
$listaDePedidos->removerPedido();

//lista todos os pedidos
$listaDePedidos->listarPedidos();
