<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Negociotipo;

/**
 * Negociotipos Controller
 *
 * @property \App\Model\Table\NegociotiposTable $Negociotipos
 */


class NegociotiposController extends AppController
{
    /**
     * Cria um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Negociotipos';
        // die;
        // $Negociotipo = $this->Negociotipos->find();
        // $this->set(compact('Negociotipo'));
    }
    /**
     * Cria um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     * @param Negociotipo $Negociotipo Objeto Negociotipo com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Negociotipo = $this->Negociotipo->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Negociotipo = $this->Negociotipo->patchEntity($Negociotipo, $this->request->getData());
        //     if ($this->Negociotipo->save($Negociotipo)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Negociotipo', $Negociotipo);
    }

    /**
     * Retorna um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Negociotipo
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Negociotipos '.$this->request->getParam('id');
        // die;

        // $Negociotipo = $this->Negociotipo->get($id);
        // $this->set('Negociotipo', $Negociotipo);
    }
    
    /**
     * Edita um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Negociotipo = $this->Negociotipo->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Negociotipo = $this->Negociotipo->patchEntity($Negociotipo, $this->request->getData());
        //     if ($this->Negociotipo->save($Negociotipo)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Negociotipo', $Negociotipo);
    }
   
    /**
     * Deleta um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Negociotipo = $this->Negociotipo->get($id);
        if ($this->Negociotipo->delete($Negociotipo)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
