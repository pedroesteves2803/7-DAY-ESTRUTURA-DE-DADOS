<?php


class Produto{
    public $nome;
    public $codigoDeBarras;
    public $preco;
    public $quantidade;
    public $proximo;
    public $anterior;

    public function __construct($nome, $codigoDeBarras, $preco, $quantidade)
    {
        $this->nome = $nome;
        $this->codigoDeBarras = $codigoDeBarras;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
        $this->proximo = null;
        $this->anterior = null;
    }
}


class ListaDeProduto{

    public $primeiro;

    public function __construct(){
        $this->primeiro = null;
    }

    public function adicionar($nome, $codigoDeBarras, $preco, $quantidade){
        $produto = new Produto($nome, $codigoDeBarras, $preco, $quantidade);

        if($this->primeiro == null){
            $this->primeiro = $produto;
        }else{
            $atual = $this->primeiro;

            while($atual->proximo !== null) {
                $atual = $atual->proximo;
            }

            $atual->proximo = $produto;
            $produto->anterior = $atual;
        }
    }

    public function remover($codigoDeBarras){
        if($this->primeiro === null){
            return;
        }

        $atual = $this->primeiro;

        while ($atual !== null) {
            if ($atual->codigoDeBarras === $codigoDeBarras) {
                if($atual === $this->primeiro){
                    $this->primeiro = $atual->proximo;
                    if($this->primeiro !== null){
                        $this->primeiro->anterior = null;
                    }
                }else{
                    $atual->anterior->proximo = $atual->proximo;
                    if($atual->proximo !== null){
                        $atual->proximo->anterior = $atual->anterior;
                    }
                }
                return;
            }
            $atual = $atual->proximo;
        }
    }

    public function atualizarQuantidade($codigoDeBarras, $quantidade){

        $atual = $this->primeiro;

        while($atual !== null){
            if($atual->codigoDeBarras === $codigoDeBarras){
                $atual->quantidade = $quantidade;
                return;
            }
            $atual = $atual->proximo;
        }
    }

    public function listar(){
        if($this->primeiro == null){
            echo "Lista esta vazia";
        }else{
            $atual = $this->primeiro;

            while($atual !== null){
                $nomeAnterior = ($atual->anterior !== null) ? $atual->anterior->nome : "N/A";
                $nomeProximo = ($atual->proximo !== null) ? $atual->proximo->nome : "N/A";

                echo "Nome: ". $atual->nome . ", Codigo de barras: ". $atual->codigoDeBarras . ", Preço: ". $atual->preco . ", Quantidade: ". $atual->quantidade . ", Proximo: ". $nomeProximo . ", Anterior: ". $nomeAnterior."\n";

                $atual = $atual->proximo;
            }
            echo "--------------------------------\n";
        }
    }


}


$lista = new ListaDeProduto();
$lista->adicionar('teste_1', 1234, 12.40, 4);
$lista->adicionar('teste_2', 123, 12.40, 4);
$lista->adicionar('teste_3', 1234, 12.40, 4);

$lista->listar();

$lista->atualizarQuantidade(123, 90);
$lista->listar();

$lista->remover(123);
$lista->listar();