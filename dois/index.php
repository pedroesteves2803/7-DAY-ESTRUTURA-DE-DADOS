<?php 

// cria uma classe de paciente
class paciente {
    public $nome;
    public $identificador;
    public $saude;
    public $proximo; // guarda o objeto do proximo paciente

    public function __construct($nome, $identificador, $saude){
        $this->nome = $nome;
        $this->identificador = $identificador;
        $this->saude = $saude;
        $this->proximo = null;
    }
}

//cria uma lista de pacientes
class listaDePacientes {
    public $primeiro; // variavel para armazenar primeiro paciente da lista

    public function __construct(){
        $this->primeiro = null;
    }

    //adiciona paciente a lista de pacientes
    public function adicionarPaciente($nome, $identificador, $saude){

        $paciente = new paciente($nome, $identificador, $saude); //cria uma nova instancia de pacinete 

        //se não houver paciente adiona um paciente a variavel de primeiro paciente
        //caso $this->primeiro for diferente de null percorre a lista e adiciona ao proximo nó da lista "$this->proximo" o paciente
        if($this->primeiro == null){
            $this->primeiro = $paciente;
        }else {
            $atual = $this->primeiro;

            while($atual->proximo !== null){
                $atual = $atual->proximo;
            }

            $atual->proximo = $paciente;
        }
    }

    //remove o paciente da lista
    public function removerPaciente($identificador){

        //se não houver paciente no $this->primeiro so retorna;
        if($this->primeiro === null){
            return;
        }

        //se o identificador enviado for igual ao identificador do primeiro paciente 
        //então adiciona o proximo paciente da lista como primeiro e retorna
        if($this->primeiro->identificador === $identificador){
            $this->primeiro = $this->primeiro->proximo;
            return;
        }

        $anterior = $this->primeiro; //sempre fica com o paciente anteriror caso n for o primeiro
        $atual = $this->primeiro->proximo; // sempre fica com o atual paciente recebendo o proximo da lista

        //percorre a lista e se o identificador enviado for identico ao do paciente atual
        //adicione o proximo paciente no lugar do paciente identificado assim removendo o paciente identificado
        while ($atual !== null) {
            if ($atual->identificador === $identificador) {
                $anterior->proximo = $atual->proximo;
                return;
            }
            $anterior = $atual;
            $atual = $atual->proximo;
        }
    }

    //lista os pacientes
    public function listar(){

        //caso o primeiro da lista for null avise que não tem pacientes
        //caso tenha um  paciente exiba os dados dele na tela e adicone o nó do proximo da variavel $atual
        if($this->primeiro === null){
            echo "Não á pacientes";
        }else{
            $atual = $this->primeiro;

            while($atual !== null){
                echo "Nome: ". $atual->nome . ", Identificação: ". $atual->identificador . ", Estado de Saúde: ". $atual->saude . "\n";
                $atual = $atual->proximo;
            }
            echo "--------------------------------\n";

        }
    }

}

//exemplo de uso

$listaDePacientes = new listaDePacientes(); //Cria lista de pacientes

//Adiciona pacientes a lista Passando Nome, Identificador, Estado de Saúde
$listaDePacientes->adicionarPaciente("Pedro", 1, "Bem");
$listaDePacientes->adicionarPaciente("Giovanna", 2, "Bem");
$listaDePacientes->adicionarPaciente("Gabriel", 3, "Bem");

//Lista todos os pacientes
$listaDePacientes->listar();

//Remove um apciente passando o identificador
$listaDePacientes->removerPaciente(1);
$listaDePacientes->listar();