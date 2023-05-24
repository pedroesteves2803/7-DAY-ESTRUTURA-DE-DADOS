<?php

//cria classe de produto
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

//Cria classe de lista de q
class ListaDeProduto{

    public $primeiro;

    public function __construct(){
        $this->primeiro = null;
    }

    //função para adicinar produtos a lista
    public function adicionar($nome, $codigoDeBarras, $preco, $quantidade){
        $produto = new Produto($nome, $codigoDeBarras, $preco, $quantidade);//instacia um produto passando nome, codido de barras, preço e quantidade

        //se a variavel primeiro vor null adiciona o primeiro item da lista
        //caso contrario adicione o proximo item da lista passando a refencia para o anterior
        if($this->primeiro == null){
            $this->primeiro = $produto;
        }else{
            //variavel atual recebe o primeiro item da lista
            $atual = $this->primeiro;

            //faz o looping na variavel atual verificando se é diferente de null
            while($atual->proximo !== null) {
                //quando entrar aqui achou o ultimo item da lista
                $atual = $atual->proximo;
            }

            $atual->proximo = $produto; //adiciona o novo item no final da lista
            $produto->anterior = $atual; //adiciona ao novo item o item anterior a ele
        }
    }

    //função para remover item pelo codifo de barras
    public function remover($codigoDeBarras){
        //verifica se o primeiro item não é null 
        //caso for null so retorna, pois a lista é vazia
        if($this->primeiro === null){
            return;
        }

        //atiual receve p primeiro item da lista
        $atual = $this->primeiro;

        //faz lopping no item da lista
        while ($atual !== null) {
            //caso o codigo de barras do item atual for igual ao enviado pelo usuario o item foi encontrado.
            if ($atual->codigoDeBarras === $codigoDeBarras) {

                //se o item atual for igual ao primeiro item
                // o primeiro item sera removido
                //caso contrario o item a ser removido esta no meiomda lista ou no finak
                if($atual === $this->primeiro){

                    //altere o primeiro item pelo proximo da lista
                    $this->primeiro = $atual->proximo;

                    //se o primeiro item for diferente de null
                    //adicione na referencia do anterior null pois ele virou o primeiro.
                    if($this->primeiro !== null){
                        $this->primeiro->anterior = null;
                    }
                }else{
                    //Atualize a referência do item anterior para receber o próximo item da lista. 
                    //removendo o item desejado
                    // A <--> B <--> C
                    // A ------> C
                    // ^
                    // |
                    // B (removido)
                    $atual->anterior->proximo = $atual->proximo;

                    //se o proximo item do atual for diferente de null
                    //Atualize a referência do item atual, que está presente na referência do próximo item, para incluir o item atual anteriormente.
                    if($atual->proximo !== null){
                        $atual->proximo->anterior = $atual->anterior;
                    }
                }
                return;
            }
            //Troca o proximo item atual pelo proximo;
            $atual = $atual->proximo;
        }
    }

    //função para atualizar a quantidade pdo item pelo codigo de barras
    public function atualizarQuantidade($codigoDeBarras, $quantidade){

        //busca pelo primeiro items
        $atual = $this->primeiro;

        //se o item atual for diferente de null
        while($atual !== null){
            //verifica de o codigo de barras do item atual é identico ao codigo de barras enviado pelo usuario
            if($atual->codigoDeBarras === $codigoDeBarras){
                //caso o codigos de barras esteja identicos
                //altere a quantida e retorna
                $atual->quantidade = $quantidade;
                return;
            }
            //se não for igual passe para o proximo item
            $atual = $atual->proximo;
        }
    }

    //função para listar itens
    public function listar(){

        //verifica se o primeiro item é igual a null
        if($this->primeiro == null){
            echo "Lista esta vazia";
        }else{
            //atual recebe o primeiro item
            $atual = $this->primeiro;

            //enquanto o item atual for diferente de null
            while($atual !== null){
                // verifica se item anterior é difernte de null
                //caso for diferente de null adicione o nome do item anterior a varivel $nomeAnterior
                $nomeAnterior = ($atual->anterior !== null) ? $atual->anterior->nome : "N/A";
                
                // verifica se proximo item é difernte de null
                //caso for diferente de null adicione o nome do proximo item a varivel $nomeProximo
                $nomeProximo = ($atual->proximo !== null) ? $atual->proximo->nome : "N/A";

                //exiba o Nome, Codigo de barras, Preço, Quantidade, Nome do proximo item e Nome do item anterior
                echo "Nome: ". $atual->nome . ", Codigo de barras: ". $atual->codigoDeBarras . ", Preço: ". $atual->preco . ", Quantidade: ". $atual->quantidade . ", Proximo: ". $nomeProximo . ", Anterior: ". $nomeAnterior."\n";

                $atual = $atual->proximo;
            }
            echo "--------------------------------\n";
        }
    }


}

//exemplo de uso
$lista = new ListaDeProduto(); //Cria lista de prdodutos
$lista->adicionar('teste_1', 1234, 12.40, 4); // adiciona produto passando o Nome, Codigo de barras, Preço e Quantidade
$lista->adicionar('teste_2', 123, 12.40, 4);
$lista->adicionar('teste_3', 1234, 12.40, 4);

//Listar todos os produtos
$lista->listar();

//Atualiza quantidade do produto com o codigo de barras
$lista->atualizarQuantidade(123, 90);
$lista->listar();

//remove um produto pelo codigo de barras
$lista->remover(123);
$lista->listar();