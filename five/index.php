<?php 

class Livro{
    public $nome;
    public $quantidadeDePagina;

    public function __construct($nome, $quantidadeDePagina)
    {
        $this->nome = $nome;
        $this->quantidadeDePagina = $quantidadeDePagina;
    }
}

class PilhaDeLivros{
    private $pilha;

    public function __construct()
    {
        $this->pilha = array();
    }

    public function adicionarNaPilha($nomeLivro, $quantidadeDePagina){
        $livro = new Livro($nomeLivro, $quantidadeDePagina);

        array_unshift($this->pilha, $livro);
    }

    public function removerDaPilha(){
        array_shift($this->pilha);
    }

    public function primeroDaLista(){
        $livro = reset($this->pilha);

        echo "Nome: ".$livro->nome. ", Paginas: ".$livro->quantidadeDePagina. "\n";
        echo "------------------ \n";
    }

    public function listarPilha(){
        foreach($this->pilha as $livros){
            echo "Nome: ".$livros->nome. ", Paginas: ".$livros->quantidadeDePagina. "\n";
        }

        echo "------------------ \n";
    }
}

$pilhaDeLivros = new PilhaDeLivros();

$pilhaDeLivros->adicionarNaPilha('Teste 1', 10);
$pilhaDeLivros->adicionarNaPilha('Teste 2', 20);
$pilhaDeLivros->adicionarNaPilha('Teste 3', 30);
$pilhaDeLivros->adicionarNaPilha('Teste 4', 40);
$pilhaDeLivros->listarPilha();

$pilhaDeLivros->adicionarNaPilha('Teste 5', 50);
$pilhaDeLivros->listarPilha();

$pilhaDeLivros->removerDaPilha();
$pilhaDeLivros->listarPilha();

$pilhaDeLivros->primeroDaLista();