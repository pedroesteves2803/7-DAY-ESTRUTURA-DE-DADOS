<?php 

//Cria classe de produto
class Produto {
    public $id;
    public $nome;
    public $quantidadeEmEstoque;

    //Adiciona id, nome e quantidade em estoque
    public function __construct($id, $nome, $quantidadeEmEstoque){
        $this->id = $id;
        $this->nome = $nome;
        $this->quantidadeEmEstoque = $quantidadeEmEstoque;
    }
}

//Cria classe no da arvore
class No{
    public $produto;
    public $esquerda;
    public $direita;

    //Adiciona produto
    public function __construct($produto){
        $this->produto = $produto;
        $this->esquerda = null;
        $this->direita  = null;
    }
}

//Cria classe de Arvore binaria
class ArvoreBinaria{
    public $raiz; //Variavel da raiz da arvore

    //Adiciona null a raiz
    public function __construct(){
        $this->raiz = null;
    }

    //Adiciona produto passando id, nome e quantidade em estoque
    public function adicionarProduto($id, $nome, $quantidadeEmEstoque){
        
        //Instancia novo produto passando id, nome e quantidade em estoque
        $produto = new Produto($id, $nome, $quantidadeEmEstoque);

        //Se a raiz da arvore for identico a null
        if($this->raiz === null){
            //Instancia um no passando o produto na raiz
            $this->raiz = new No($produto);

        }else{ // Se não for identico

            $noAtual = $this->raiz; //coloca a raiz da arvore no no atual

            //Sempre fique no while
            while(true){

                //Se o id enviado pelo usuario for igual ao id do produto atual
                if($id == $noAtual->produto->id) {
                    //Altera o produto
                    $noAtual->produto->nome = $nome; //Altera o nome do produto
                    $noAtual->produto->quantidadeEmEstoque = $quantidadeEmEstoque; //Altera a quantidade em estoque
                    return;
                }

                //Se o produto id for menor que o id do produto atual
                if($produto->id < $noAtual->produto->id){

                    //Se a esquerda do nó atual for identico a null
                    if($noAtual->esquerda === null){
                        //Adicione um novo no passando o produto na esquerda do atual
                        $noAtual->esquerda = new No($produto);
                        break;
                    }else{//Se a esqeruda do no atual for diferente de null
                        $noAtual = $noAtual->esquerda; // adicione ao no atual o proximo no da esquerda
                    }
                }

                //Se o produto id for maior que o id do produto atual
                if($produto->id > $noAtual->produto->id){

                    //Se a direita do nó atual for identico a null
                    if($noAtual->direita === null){

                        //Adicione um novo no passando o produto na direita do atual
                        $noAtual->direita = new No($produto);
                        break;
                    }else{//Se a direita no nó atual for diferente de null
                        $noAtual = $noAtual->direita; // adicione ao no atual o proximo no da direita
                    }
                }
            }
        }

    }


    //Busca produto pelo ID
    public function buscarProdutoPorId($id){

        $noAtual = $this->raiz; //Variavel noatual recebe a raiz da arvore binaria

        //Enquanto no ataul for diferente de null
        while ($noAtual != null) {
            //Se o id enviado pelo usuario for igual ao id do produto atual
            if ($id == $noAtual->produto->id) {

                //Exiba o id do produto, nome do produto e Quantidade em estoque
                echo "Produto encontrado - ID: " . $noAtual->produto->id . ", Nome: " . $noAtual->produto->nome . ", Quantidade em estoque: " . $noAtual->produto->quantidadeEmEstoque . "\n";
                return;
            } elseif ($id < $noAtual->produto->id) { // Se o id enviado pelo usuario for menor que o id o produto
                $noAtual = $noAtual->esquerda; // Altere o no atual para o proximo no da esquerda do atual
            } else {
                $noAtual = $noAtual->direita; // Altere o no atual para o proximo no da direita do atual
            }
        }

        return null; // Produto não encontrado
    }
}

//Exemplo de uso

$arvore = new ArvoreBinaria(); //Instancia uma nova Arvore binaria


//Adiciona produto passando o id, nome e quantidade em estoque
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


//Busca produto por id
$arvore->buscarProdutoPorId(60);
