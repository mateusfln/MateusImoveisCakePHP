<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\CaracteristicasImoveltipo;

/**
 * CaracteristicasImoveltiposImoveltipos Controller
 *
 * @property \App\Model\Table\CaracteristicasImoveltipos $CaracteristicasImoveltipos
 */


class CaracteristicasImoveltiposImoveltiposController extends AppController
{
    /**
     * Cria um registro na tabela CaracteristicasImoveltipo de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de CaracteristicasImoveltiposImoveltipos';
        // die;
        // $CaracteristicasImoveltipo = $this->CaracteristicasImoveltiposImoveltipos->find();
        // $this->set(compact('CaracteristicasImoveltipo'));
    }
    /**
     * Cria um registro na tabela CaracteristicasImoveltipo de acordo com os dados fornecidos
     * 
     * @param CaracteristicasImoveltipo $CaracteristicasImoveltipo Objeto CaracteristicasImoveltipo com dados a serem preenchidos
     */
    public function add()
    {
        
        // $CaracteristicasImoveltipo = $this->CaracteristicasImoveltipo->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $CaracteristicasImoveltipo = $this->CaracteristicasImoveltipo->patchEntity($CaracteristicasImoveltipo, $this->request->getData());
        //     if ($this->CaracteristicasImoveltipo->save($CaracteristicasImoveltipo)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$CaracteristicasImoveltipo', $CaracteristicasImoveltipo);
    }

    /**
     * Retorna um registro na tabela CaracteristicasImoveltipo de acordo com os dados fornecidos
     * 
     * @param int $id   Código do CaracteristicasImoveltipo
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de CaracteristicasImoveltiposImoveltipos '.$this->request->getParam('id');
        // die;

        // $CaracteristicasImoveltipo = $this->CaracteristicasImoveltipo->get($id);
        // $this->set('CaracteristicasImoveltipo', $CaracteristicasImoveltipo);
    }
    
    /**
     * Edita um registro na tabela CaracteristicasImoveltipo de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $CaracteristicasImoveltipo = $this->CaracteristicasImoveltipo->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $CaracteristicasImoveltipo = $this->CaracteristicasImoveltipo->patchEntity($CaracteristicasImoveltipo, $this->request->getData());
        //     if ($this->CaracteristicasImoveltipo->save($CaracteristicasImoveltipo)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('CaracteristicasImoveltipo', $CaracteristicasImoveltipo);
    }
   
    /**
     * Deleta um registro na tabela CaracteristicasImoveltipo de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete()
    {

        // $this->request->allowMethod(['post', 'delete']);
        // $CaracteristicasImoveltipo = $this->CaracteristicasImoveltipo->get($id);
        // if ($this->CaracteristicasImoveltipo->delete($CaracteristicasImoveltipo)) {
        //     $this->Flash->success(__('Imóvel excluído com sucesso.'));
        // } else {
        //     $this->Flash->error(__('Erro ao excluir o imóvel.'));
        // }
        // return $this->redirect(['action' => 'index']);
    }
    
}
