<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\PessoasTable;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Classe Controladora de Pessoas
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 */
class PessoasController extends AppController
{
    /**
     * Método que envia para a view uma variavel "$pessoas" contendo os registros da tabela Pessoas
     * @return void 
     */
    public function index(): void
    {
        $pessoas = new PessoasTable();
        $pessoas = $pessoas->find();
        $this->set(compact('pessoas'));
    }

    /**
     * Cria um registro na tabela Pessoas de acordo com os dados fornecidos na view
     * @return Response|null
     */
    public function add(): Response|null
    {

        if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
            $hoje = new \DateTimeImmutable();
            $tablePessoas = TableRegistry::getTableLocator()->get('Pessoas');
            $pessoaEntity = $tablePessoas->newEmptyEntity();

            $pessoaEntity->nome = $_POST['nome'];
            $pessoaEntity->cpf = $_POST['cpf'];
            $pessoaEntity->login = $_POST['login'];
            $pessoaEntity->senha = $_POST['senha'];
            $pessoaEntity->ativo = true;
            $pessoaEntity->criado = $hoje;
            $pessoaEntity->modificado = $hoje;
            $pessoaEntity->criador_id = 1;
            $pessoaEntity->modificador_id = 1;

            $tablePessoas->save($pessoaEntity);
            return $this->redirect('admin/pessoas');
        }
        return null;

    }

    /**
     * Retorna um registro na tabela Pessoas de acordo com os dados fornecidos
     */
    public function read()
    {

    }

    /**
     * Edita um registro na tabela Pessoas de acordo com os dados fornecidos
     * @return Response|null
     */
    public function update(): Response|null
    {

        if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['login']) && !empty($_POST['senha'])) {
            $hoje = new \DateTimeImmutable();
            $tablePessoas = TableRegistry::getTableLocator()->get('Pessoas');

            $pessoaEntity = $tablePessoas->newEmptyEntity();

            $pessoaEntity->id = $_GET['id'];
            $pessoaEntity->nome = $_POST['nome'];
            $pessoaEntity->cpf = $_POST['cpf'];
            $pessoaEntity->login = $_POST['login'];
            $pessoaEntity->senha = $_POST['senha'];
            $pessoaEntity->ativo = 0;
            if (!empty($_POST['ativo'])) {
                $pessoaEntity->ativo = 1;
            }
            $pessoaEntity->criado = $hoje;
            $pessoaEntity->modificado = $hoje;
            $pessoaEntity->criador_id = 1;
            $pessoaEntity->modificador_id = 1;
            $tablePessoas->save($pessoaEntity);
            return $this->redirect('admin/pessoas');
        }
        return null;
    }

    /**
     * Deleta um registro na tabela Imovel de acordo com os dados fornecidos
     * @return Response|null
     */
    public function delete(): Response|null
    {
        if (!empty($_POST['delete_id'])) {
            $pessoasTable = new PessoasTable();
            $pessoasTable->deleteAll(['id' => $_POST['delete_id']]);
            return $this->redirect('admin/pessoas');
        }
        return null;
    }

}
