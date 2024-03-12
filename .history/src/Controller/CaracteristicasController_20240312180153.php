<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Caracteristica;
use App\Model\Entity\CaracteristicasImoveltipo;
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
        if (isset($_POST['nome'])){

            $this->addRegistro
            }
            return $this->redirect('admin/caracteristicas');
        };
        // $caracteristica = $this->Caracteristica->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $caracteristica = $this->Caracteristica->patchEntity($caracteristica, $this->request->getData());
        //     if ($this->Caracteristica->save($caracteristica)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$caracteristica', $caracteristica);
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

        // $caracteristica = $this->Caracteristica->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $caracteristica = $this->Caracteristica->patchEntity($caracteristica, $this->request->getData());
        //     if ($this->Caracteristica->save($caracteristica)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('caracteristica', $caracteristica);
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

        $this->request->allowMethod(['post', 'delete']);
        $caracteristica = $this->Caracteristica->get($id);
        if ($this->Caracteristica->delete($caracteristica)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
