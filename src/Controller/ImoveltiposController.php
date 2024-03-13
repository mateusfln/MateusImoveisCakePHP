<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Imoveltipo;
use App\Model\Table\CaracteristicasImoveltiposTable;
use Cake\ORM\TableRegistry;

/**
 * Imoveltipo Controller
 *
 * @property \App\Model\Table\ImoveltiposTable $Imoveltipo
 */


class ImoveltiposController extends AppController
{
    /**
     * Cria um registro na tabela Imoveltipo de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Imoveltipo';
        // die;
        // $Imoveltipo = $this->Imoveltipo->find();
        // $this->set(compact('Imoveltipo'));
    }
    /**
     * Cria um registro na tabela Imoveltipo de acordo com os dados fornecidos
     * 
     * @param Imoveltipo $Imoveltipo Objeto Imoveltipo com dados a serem preenchidos
     */
    public function add()
    {
        if (isset($_POST['nome']))
        {
            $this->addRegistro(); 
        }
    }

    /**
     * Retorna um registro na tabela Imoveltipo de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Imoveltipo
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Imoveltipo '.$this->request->getParam('id');
        // die;

        // $Imoveltipo = $this->Imoveltipo->get($id);
        // $this->set('Imoveltipo', $Imoveltipo);
    }
    
    /**
     * Edita um registro na tabela Imoveltipo de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {
        if(!empty($_POST['nome'])){
        $hoje = new \DateTimeImmutable();
            $tableImoveltipos = TableRegistry::getTableLocator()->get('Imoveltipos');
            
            $imoveltipoEntity = $tableImoveltipos->newEmptyEntity();
            $imoveltipoEntity->id = $_GET['id'];
            $imoveltipoEntity->nome = $_POST['nome'];
            $imoveltipoEntity->ativo = 0;
            if(!empty($_POST['ativo'])){
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

        
    }
   
    /**
     * Deleta um registro na tabela Imoveltipo de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Imoveltipo = $this->Imoveltipo->get($id);
        if ($this->Imoveltipo->delete($Imoveltipo)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function addRegistro()
    {
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
    
}

