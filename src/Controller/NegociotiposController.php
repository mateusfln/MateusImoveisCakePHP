<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Negociotipo;
use App\Model\Table\NegociotiposTable;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;


/**
 * Classe Controladora de Negociotipos
 *
 * @property \App\Model\Table\NegociotiposTable $Negociotipos
 */
class NegociotiposController extends AppController
{
    /**
     * Método que envia para a view uma variavel "$negociotipos" contendo os registros da tabela Negociotipos
     * @return void 
     */
    public function index(): void
    {
        $negociotipos = new NegociotiposTable();
        $negociotipos = $negociotipos->find();
        $this->set(compact('negociotipos'));
    }

    /**
     * Cria um registro na tabela Imovel de acordo com os dados fornecidos na view
     * @return Response|null
     */
    public function add(): ?Response
    {

        if (!empty($_POST['nome'])) {
            $hoje = new \DateTimeImmutable();
            $tableNegociotipos = TableRegistry::getTableLocator()->get('Negociotipos');

            $negociotipoEntity = $tableNegociotipos->newEmptyEntity();
            $negociotipoEntity->nome = $_POST['nome'];
            $negociotipoEntity->ativo = true;
            $negociotipoEntity->criado = $hoje;
            $negociotipoEntity->modificado = $hoje;
            $negociotipoEntity->criador_id = 1;
            $negociotipoEntity->modificador_id = 1;
            $tableNegociotipos->save($negociotipoEntity);
            return $this->redirect('admin/negociotipos');
        }
        return null;
    }

    /**
     * Retorna um registro na tabela Negociotipos de acordo com os dados fornecidos
     */
    public function read()
    {

    }

    /**
     * Edita um registro na tabela Negociotipos de acordo com os dados fornecidos
     * @return Response|null
     */
    public function update(): Response|null
    {
        if (!empty($_POST['nome'])) {
            $hoje = new \DateTimeImmutable();
            $tableNegociotipos = TableRegistry::getTableLocator()->get('Negociotipos');
            $negociotipoEntity = $tableNegociotipos->newEmptyEntity();

            $negociotipoEntity->id = $_GET['id'];
            $negociotipoEntity->nome = $_POST['nome'];
            $negociotipoEntity->ativo = 0;
            if (!empty($_POST['ativo'])) {
                $negociotipoEntity->ativo = 1;
            }
            $negociotipoEntity->criado = $hoje;
            $negociotipoEntity->modificado = $hoje;
            $negociotipoEntity->criador_id = 1;
            $negociotipoEntity->modificador_id = 1;

            $tableNegociotipos->save($negociotipoEntity);
            return $this->redirect('admin/negociotipos');
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
            $negociostiposTable = new NegociotiposTable();
            $negociostiposTable->deleteAll(['id' => $_POST['delete_id']]);
            return $this->redirect('admin/Negociotipos');
        }
        return null;
    }

}
