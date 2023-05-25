<?php 

class Produto {
    public $id;
    public $nome;
    public $quantidadeEmEstoque;

    public function __construct($id, $nome, $quantidadeEmEstoque){
        $this->id = $id;
        $this->nome = $nome;
        $this->quantidadeEmEstoque = $quantidadeEmEstoque;
    }
}

class No{
    public $produto;
    public $esquerda;
    public $direita;

    public function __construct($produto){
        $this->produto = $produto;
        $this->esquerda = null;
        $this->direita  = null;
    }
}

class ArvoreBinaria{
    public $raiz;

    public function __construct(){
        $this->raiz = null;
    }

    public function adicionarProduto($id, $nome, $quantidadeEmEstoque){
        $produto = new Produto($id, $nome, $quantidadeEmEstoque);

        if($this->raiz === null){
            $this->raiz = new No($produto);
        }else{
            $noAtual = $this->raiz;

            while(true){
                if($id == $noAtual->produto->id) {
                    $noAtual->produto->nome = $nome;
                    $noAtual->produto->quantidadeEmEstoque = $quantidadeEmEstoque;
                    return;
                }

                if($produto->id < $noAtual->produto->id){
                    if($noAtual->esquerda === null){
                        $noAtual->esquerda = new No($produto);
                        break;
                    }else{
                        $noAtual = $noAtual->esquerda;
                    }
                }

                if($produto->id > $noAtual->produto->id){
                    if($noAtual->direita === null){
                        $noAtual->direita = new No($produto);
                        break;
                    }else{
                        $noAtual = $noAtual->direita;
                    }
                }
            }
        }

    }

    public function buscarProdutoPorId($id){

        $noAtual = $this->raiz;

        while ($noAtual != null) {
            if ($id == $noAtual->produto->id) {
                echo "Produto encontrado - ID: " . $noAtual->produto->id . ", Nome: " . $noAtual->produto->nome . ", Quantidade em estoque: " . $noAtual->produto->quantidadeEmEstoque . "\n";
                return;
            } elseif ($id < $noAtual->produto->id) {
                $noAtual = $noAtual->esquerda;
            } else {
                $noAtual = $noAtual->direita;
            }
        }

        return null; // Produto não encontrado
    }
}


$arvore = new ArvoreBinaria();

$arvore->adicionarProduto(10, 'Teste 10', 10);
$arvore->adicionarProduto(20, 'Teste 20', 20);
$arvore->adicionarProduto(30, 'Teste 30', 30);
$arvore->adicionarProduto(40, 'Teste 40', 40);
$arvore->adicionarProduto(50, 'Teste 50', 50);
$arvore->adicionarProduto(60, 'Teste 60', 60);

$arvore->adicionarProduto(1, 'Teste 1', 1);
$arvore->adicionarProduto(2, 'Teste 2', 2);
$arvore->adicionarProduto(3, 'Teste 3', 3);
$arvore->adicionarProduto(4, 'Teste 4', 4);
$arvore->adicionarProduto(5, 'Teste 5', 5);
$arvore->adicionarProduto(6, 'Teste 6', 6);

$arvore->buscarProdutoPorId(60);
