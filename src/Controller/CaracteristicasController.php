<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Table\CaracteristicasImoveltiposTable;
use App\Model\Table\CaracteristicasTable;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Classe Controladora de Caracteristicas
 *
 * @property \App\Model\Table\CaracteristicasTable $Caracteristicas
 */
class CaracteristicasController extends AppController
{
    /**
     * Método que envia para a view uma variavel "$caracteristicas" contendo os registros da tabela caracteristica
     * @return void 
     */
    public function index() : void
    {
        $caracteristicas = new CaracteristicasTable();
        $caracteristicas = $caracteristicas->find();
        $this->set(compact('caracteristicas'));
    }
    
    /**
     * Cria um registro na tabela Caracteristica de acordo com os dados fornecidos na view
     * @return void 
     */
    public function add() : void
    {
        if (isset($_POST['nome']))
        {
            $this->addRegistro(); 
        }
        
    }

    /**
     * Retorna um registro na tabela Caracteristica de acordo com os dados fornecidos
     */
    public function read() 
    {
        
    }
    
    /**
     * Edita um registro na tabela Caracteristica de acordo com os dados fornecidos na view
     * @return Response|null
     */
    public function update() : Response|null
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
        return null;
    }
   
    /**
     * Deleta um registro na tabela Caracteristica de acordo com os dados fornecidos na view
     * @return Response|null
     */
    public function delete() : Response|null
    {

        if(!empty($_POST['delete_id'])){
            $caracteristicasTable = new CaracteristicasTable();
            $caracteristicasTable->deleteAll(['id' => $_POST['delete_id']]);
            return $this->redirect('admin/Caracteristicas');
        }
        return null;
    }
    
    /**
     * método que fornece a lógica de adição de um novo registro de caracteristicas
     * @return Response|null
     */
    public function addRegistro() : Response|null
    {
        if(!empty($_POST['nome']) && !empty($_POST['imoveltipos'])){

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
        return null;
    }
}
