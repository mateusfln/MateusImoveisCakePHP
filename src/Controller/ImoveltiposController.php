<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\Imoveltipo;
use App\Model\Table\CaracteristicasImoveltiposTable;
use App\Model\Table\ImoveltiposTable;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Classe Controladora de Imoveltipo
 *
 * @property \App\Model\Table\ImoveltiposTable $Imoveltipo
 */
class ImoveltiposController extends AppController
{
    /**
     * Método que envia para a view uma variavel "$imoveltipos" contendo os registros da tabela Imoveltipos
     * @return void 
     */
    public function index(): void
    {
        $imoveltipos = new ImoveltiposTable();
        $imoveltipos = $imoveltipos->find();
        $this->set(compact('imoveltipos'));
    }

    /**
     * Cria um registro na tabela Imoveltipo de acordo com os dados fornecidos na view
     * @return void
     */
    public function add(): void
    {
        if (isset($_POST['nome'])) {
            $this->addRegistro();
        }
    }

    /**
     * Retorna um registro na tabela Imoveltipo de acordo com os dados fornecidos
     */
    public function read()
    {

    }

    /**
     * Edita um registro na tabela Imoveltipo de acordo com os dados fornecidos
     * @return Response|null
     */
    public function update(): Response|null
    {
        if (!empty($_POST['nome'])) {
            $hoje = new \DateTimeImmutable();
            $tableImoveltipos = TableRegistry::getTableLocator()->get('Imoveltipos');

            $imoveltipoEntity = $tableImoveltipos->newEmptyEntity();
            $imoveltipoEntity->id = $_GET['id'];
            $imoveltipoEntity->nome = $_POST['nome'];
            $imoveltipoEntity->ativo = 0;
            if (!empty($_POST['ativo'])) {
                $imoveltipoEntity->ativo = 1;
            }
            $imoveltipoEntity->criado = $hoje;
            $imoveltipoEntity->modificado = $hoje;
            $imoveltipoEntity->criador_id = 1;
            $imoveltipoEntity->modificador_id = 1;
            $tableImoveltipos->save($imoveltipoEntity);

            $caracteristicasImoveltiposTable = new CaracteristicasImoveltiposTable();
            $caracteristicasImoveltiposTable->deleteAll(['imoveltipo_id' => $imoveltipoEntity->id]);

            foreach ($_POST['caracteristicas'] as $caracteristica) {

                $tableCaracteristicaImoveltipo = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
                $caracteristicasImoveltipos = $tableCaracteristicaImoveltipo->newEmptyEntity();

                $caracteristicasImoveltipos->imoveltipo_id = $imoveltipoEntity->id;
                $caracteristicasImoveltipos->caracteristica_id = $caracteristica;
                $caracteristicasImoveltipos->ativo = true;
                $caracteristicasImoveltipos->criado = $hoje;
                $caracteristicasImoveltipos->modificado = $hoje;
                $caracteristicasImoveltipos->criador_id = 1;
                $caracteristicasImoveltipos->modificador_id = 1;

                $tableCaracteristicaImoveltipo->save($caracteristicasImoveltipos);
            }
            return $this->redirect('admin/imoveltipos');
        }
        return null;

    }

    /**
     * Deleta um registro na tabela Imoveltipo de acordo com os dados fornecidos
     * @return Response|null
     */
    public function delete(): Response|null
    {

        if (!empty($_POST['delete_id'])) {
            $imoveltiposTable = new ImoveltiposTable();
            $imoveltiposTable->deleteAll(['id' => $_POST['delete_id']]);
        }
        return $this->redirect('admin/Imoveltipos');
    }

    /**
     * método que fornece a lógica de adição de um novo registro de Imoveltipos
     * @return Response|null
     */
    public function addRegistro(): Response|null
    {
        if (!empty($_POST['nome']) && !empty($_POST['caracteristicas'])) {

            $hoje = new \DateTimeImmutable();
            $tableImoveltipos = TableRegistry::getTableLocator()->get('Imoveltipos');

            $imoveltipoEntity = $tableImoveltipos->newEmptyEntity();
            $imoveltipoEntity->nome = $_POST['nome'];
            $imoveltipoEntity->ativo = true;
            $imoveltipoEntity->criado = $hoje;
            $imoveltipoEntity->modificado = $hoje;
            $imoveltipoEntity->criador_id = 1;
            $imoveltipoEntity->modificador_id = 1;
            $tableImoveltipos->save($imoveltipoEntity);

            foreach ($_POST['caracteristicas'] as $caracteristica) {

                $tableCaracteristicaImoveltipo = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
                $caracteristicasImoveltipos = $tableCaracteristicaImoveltipo->newEmptyEntity();

                $caracteristicasImoveltipos->imoveltipo_id = $imoveltipoEntity->id;
                $caracteristicasImoveltipos->caracteristica_id = $caracteristica;
                $caracteristicasImoveltipos->ativo = true;
                $caracteristicasImoveltipos->criado = $hoje;
                $caracteristicasImoveltipos->modificado = $hoje;
                $caracteristicasImoveltipos->criador_id = 1;
                $caracteristicasImoveltipos->modificador_id = 1;

                $tableCaracteristicaImoveltipo->save($caracteristicasImoveltipos);
            }
            return $this->redirect('admin/imoveltipos');
        }
        return null;
    }

}

