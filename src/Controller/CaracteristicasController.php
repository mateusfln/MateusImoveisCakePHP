<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Caracteristica;
use App\Model\Table\CaracteristicasImoveltiposTable;
use Cake\ORM\TableRegistry;

/**
 * Caracteristicas Controller
 *
 * @property \App\Model\Table\CaracteristicasTable $caracteristicas
 */


class CaracteristicasController extends AppController
{
    /**
     * Cria um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de caracteristicas';
        // die;
        // $Caracteristica = $this->Caracteristicas->find();
        // $this->set(compact('Caracteristica'));
    }
    
    /**
     * Cria um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @param Caracteristica $caracteristica Objeto Caracteristica com dados a serem preenchidos
     */
    public function add()
    {
        if (isset($_POST['nome']))
        {
            $this->addRegistro(); 
        }
        
    }

    /**
     * Retorna um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Caracteristica
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de caracteristicas '.$this->request->getParam('id');
        // die;

        // $caracteristica = $this->Caracteristica->get($id);
        // $this->set('caracteristica', $caracteristica);
    }
    
    /**
     * Edita um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {
        if(!empty($_POST['nome'])){

        
            $hoje = new \DateTimeImmutable();
            $tableCaracteristicas = TableRegistry::getTableLocator()->get('Caracteristicas');
            
            $caracteristicaEntity = $tableCaracteristicas->newEmptyEntity();
            $caracteristicaEntity->id = $_GET['id'];
            $caracteristicaEntity->nome = $_POST['nome'];
            $caracteristicaEntity->ativo = 0;
            if(!empty($_POST['ativo'])){
                $caracteristicaEntity->ativo = 1;    
            }
            $caracteristicaEntity->criado = $hoje;
            $caracteristicaEntity->modificado = $hoje;
            $caracteristicaEntity->criador_id = 1;
            $caracteristicaEntity->modificador_id = 1;
            $tableCaracteristicas->save($caracteristicaEntity);


             $caracteristicasImoveltiposTable = new CaracteristicasImoveltiposTable();
             $caracteristicasImoveltiposTable->deleteAll(['caracteristica_id' => $caracteristicaEntity->id]);

            foreach ($_POST['imoveltipos'] as $imovel) {

                $tableCaracteristicaImoveltipo = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
                $caracteristicasImoveltipos = $tableCaracteristicaImoveltipo->newEmptyEntity();
    
                $caracteristicasImoveltipos->caracteristica_id = $caracteristicaEntity->id;
                $caracteristicasImoveltipos->imoveltipo_id = $imovel;
                $caracteristicasImoveltipos->ativo = true;
                $caracteristicasImoveltipos->criado = $hoje;
                $caracteristicasImoveltipos->modificado = $hoje;
                $caracteristicasImoveltipos->criador_id = 1;
                $caracteristicasImoveltipos->modificador_id = 1;

                $tableCaracteristicaImoveltipo->save($caracteristicasImoveltipos);
            }
            return $this->redirect('admin/caracteristicas');
        }
    }
   
    /**
     * Deleta um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        // if (isset($_POST['delete_id']))
        // {
        //     $entity = $this->Caracteristica->get($id);
        //     $this->Caracteristica->delete($entity); 
        // }
        // return $this->redirect('admin/caracteristicas');
        
    }
    
    /**
     * método que fornece a lógica de adição de um novo registro de caracteristicas
     * 
     */
    public function addRegistro()
    {
            $hoje = new \DateTimeImmutable();
            $tableCaracteristicas = TableRegistry::getTableLocator()->get('Caracteristicas');
            
            $caracteristicaEntity = $tableCaracteristicas->newEmptyEntity();
            $caracteristicaEntity->nome = $_POST['nome'];
            $caracteristicaEntity->ativo = true;
            $caracteristicaEntity->criado = $hoje;
            $caracteristicaEntity->modificado = $hoje;
            $caracteristicaEntity->criador_id = 1;
            $caracteristicaEntity->modificador_id = 1;
            $tableCaracteristicas->save($caracteristicaEntity);

            foreach ($_POST['imoveltipos'] as $imovel) {

                $tableCaracteristicaImoveltipo = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
                $caracteristicasImoveltipos = $tableCaracteristicaImoveltipo->newEmptyEntity();
    
                $caracteristicasImoveltipos->caracteristica_id = $caracteristicaEntity->id;
                $caracteristicasImoveltipos->imoveltipo_id = $imovel;
                $caracteristicasImoveltipos->ativo = true;
                $caracteristicasImoveltipos->criado = $hoje;
                $caracteristicasImoveltipos->modificado = $hoje;
                $caracteristicasImoveltipos->criador_id = 1;
                $caracteristicasImoveltipos->modificador_id = 1;

                $tableCaracteristicaImoveltipo->save($caracteristicasImoveltipos);
            }
            return $this->redirect('admin/caracteristicas');
    }
}
