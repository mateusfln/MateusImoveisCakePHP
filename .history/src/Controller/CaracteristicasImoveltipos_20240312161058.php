<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Caracte;

/**
 * CaractesImoveltipos Controller
 *
 * @property \App\Model\Table\CaractesImoveltiposTable $CaractesImoveltipos
 */


class CaractesImoveltiposController extends AppController
{
    /**
     * Cria um registro na tabela Caracte de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de CaractesImoveltipos';
        // die;
        // $Caracte = $this->CaractesImoveltipos->find();
        // $this->set(compact('Caracte'));
    }
    /**
     * Cria um registro na tabela Caracte de acordo com os dados fornecidos
     * 
     * @param Caracte $Caracte Objeto Caracte com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Caracte = $this->Caracte->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Caracte = $this->Caracte->patchEntity($Caracte, $this->request->getData());
        //     if ($this->Caracte->save($Caracte)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Caracte', $Caracte);
    }

    /**
     * Retorna um registro na tabela Caracte de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Caracte
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de CaractesImoveltipos '.$this->request->getParam('id');
        // die;

        // $Caracte = $this->Caracte->get($id);
        // $this->set('Caracte', $Caracte);
    }
    
    /**
     * Edita um registro na tabela Caracte de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Caracte = $this->Caracte->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Caracte = $this->Caracte->patchEntity($Caracte, $this->request->getData());
        //     if ($this->Caracte->save($Caracte)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Caracte', $Caracte);
    }
   
    /**
     * Deleta um registro na tabela Caracte de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Caracte = $this->Caracte->get($id);
        if ($this->Caracte->delete($Caracte)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
