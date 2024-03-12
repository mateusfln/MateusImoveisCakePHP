<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Imoveltipos;

/**
 * Imoveltipos Controller
 *
 * @property \App\Model\Table\ImoveltiposTable $Imoveltipo
 */


class Imoveltipos extends AppController
{
    /**
     * Cria um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Imoveltipo';
        // die;
        // $Imoveltipos = $this->Imoveltipo->find();
        // $this->set(compact('Imoveltipo'));
    }
    /**
     * Cria um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
     * @param Imoveltipos $Imoveltipos Objeto Imoveltipos com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Imoveltipos = $this->Imoveltipo->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Imoveltipos = $this->Imoveltipo->patchEntity($Imoveltipo, $this->request->getData());
        //     if ($this->Imoveltipo->save($Imoveltipo)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Imoveltipo', $Imoveltipo);
    }

    /**
     * Retorna um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Imoveltipo
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Imoveltipos '.$this->request->getParam('id');
        // die;

        // $Imoveltipos = $this->Imoveltipo->get($id);
        // $this->set('Imoveltipo', $Imoveltipo);
    }
    
    /**
     * Edita um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Imoveltipos = $this->Imoveltipo->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Imoveltipos = $this->Imoveltipo->patchEntity($Imoveltipo, $this->request->getData());
        //     if ($this->Imoveltipo->save($Imoveltipo)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Imoveltipo', $Imoveltipo);
    }
   
    /**
     * Deleta um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Imoveltipos = $this->Imoveltipo->get($id);
        if ($this->Imoveltipo->delete($Imoveltipo)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}

