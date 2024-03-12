<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Negociotipos;

/**
 * Negociotiposs Controller
 *
 * @property \App\Model\Table\NegociotipossTable $Negociotiposs
 */


class NegociotipossController extends AppController
{
    /**
     * Cria um registro na tabela Negociotipos de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Negociotiposs';
        // die;
        // $Negociotipos = $this->Negociotiposs->find();
        // $this->set(compact('Negociotipos'));
    }
    /**
     * Cria um registro na tabela Negociotipos de acordo com os dados fornecidos
     * 
     * @param Negociotipos $Negociotipos Objeto Negociotipos com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Negociotipos = $this->Negociotipos->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Negociotipos = $this->Negociotipos->patchEntity($Negociotipos, $this->request->getData());
        //     if ($this->Negociotipos->save($Negociotipos)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Negociotipos', $Negociotipos);
    }

    /**
     * Retorna um registro na tabela Negociotipos de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Negociotipos
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Negociotiposs '.$this->request->getParam('id');
        // die;

        // $Negociotipos = $this->Negociotipos->get($id);
        // $this->set('Negociotipos', $Negociotipos);
    }
    
    /**
     * Edita um registro na tabela Negociotipos de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Negociotipos = $this->Negociotipos->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Negociotipos = $this->Negociotipos->patchEntity($Negociotipos, $this->request->getData());
        //     if ($this->Negociotipos->save($Negociotipos)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Negociotipos', $Negociotipos);
    }
   
    /**
     * Deleta um registro na tabela Negociotipos de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Negociotipos = $this->Negociotipos->get($id);
        if ($this->Negociotipos->delete($Negociotipos)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
