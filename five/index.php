<?php 


//cria clase de livro
class Livro{
    public $nome;
    public $quantidadeDePagina;

    //adiciona nome e quantidade de pagina
    public function __construct($nome, $quantidadeDePagina)
    {
        $this->nome = $nome;
        $this->quantidadeDePagina = $quantidadeDePagina;
    }
}

// cria classe de pilha de livro
class PilhaDeLivros{
    private $pilha;// variavel privada para pilha de livro

    //tranforma variavel $this->pilha em array
    public function __construct()
    {
        $this->pilha = array();
    }

    //adiciona um novo livro na pilha
    public function adicionarNaPilha($nomeLivro, $quantidadeDePagina){
        $livro = new Livro($nomeLivro, $quantidadeDePagina); //cria novo livro

        array_unshift($this->pilha, $livro); //adiciona livro no final da pilha
    }

    //remove livro da pilja
    public function removerDaPilha(){
        array_shift($this->pilha);// remove primeiro livro da pilha
    }

    //lista o primeiro item
    public function primeroDaLista(){
        $livro = reset($this->pilha);// recupera o primeiro item da pilha

        //retorna o nome e pagina do livro
        echo "Nome: ".$livro->nome. ", Paginas: ".$livro->quantidadeDePagina. "\n";
        echo "------------------ \n";
    }

    //lista todos os livros da pilha
    public function listarPilha(){
        //percorre a pilha de livros
        foreach($this->pilha as $livros){
            //retorna o nome e pagina do livro
            echo "Nome: ".$livros->nome. ", Paginas: ".$livros->quantidadeDePagina. "\n";
        }

        echo "------------------ \n";
    }
}

//exemplo de uso

$pilhaDeLivros = new PilhaDeLivros(); //instancia pilha de livro

//adiciona novos livros a pilha
$pilhaDeLivros->adicionarNaPilha('Teste 1', 10);
$pilhaDeLivros->adicionarNaPilha('Teste 2', 20);
$pilhaDeLivros->adicionarNaPilha('Teste 3', 30);
$pilhaDeLivros->adicionarNaPilha('Teste 4', 40);

//lista todos os livros da pilha
$pilhaDeLivros->listarPilha();

//adiciona livro a pilha
$pilhaDeLivros->adicionarNaPilha('Teste 5', 50);

//lista todos os livros da pilha
$pilhaDeLivros->listarPilha();

//remove o primeiro livro da pilha
$pilhaDeLivros->removerDaPilha();

//lista todos os livros da pilha
$pilhaDeLivros->listarPilha();

//lista primeiro livro da pilha
$pilhaDeLivros->primeroDaLista();