<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Pessoas;

/**
 * Pessoas Controller
 *
 * @property \App\Model\Table\PessoasTable $Pessoas
 */


class PessoasController extends AppController
{
    /**
     * Cria um registro na tabela Pessoas de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Pessoas';
        // die;
        // $Pessoas = $this->Pessoas->find();
        // $this->set(compact('Pessoas'));
    }
    /**
     * Cria um registro na tabela Pessoas de acordo com os dados fornecidos
     * 
     * @param Pessoa $Pessoas Objeto Pessoas com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Pessoas = $this->Pessoas->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Pessoas = $this->Pessoas->patchEntity($Pessoas, $this->request->getData());
        //     if ($this->Pessoas->save($Pessoas)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Pessoas', $Pessoas);
    }

    /**
     * Retorna um registro na tabela Pessoas de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Pessoas
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Pessoas '.$this->request->getParam('id');
        // die;

        // $Pessoas = $this->Pessoas->get($id);
        // $this->set('Pessoas', $Pessoas);
    }
    
    /**
     * Edita um registro na tabela Pessoas de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Pessoas = $this->Pessoas->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Pessoas = $this->Pessoas->patchEntity($Pessoas, $this->request->getData());
        //     if ($this->Pessoas->save($Pessoas)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Pessoas', $Pessoas);
    }
   
    /**
     * Deleta um registro na tabela Pessoas de acordo com os dados fornecidos
     * 
     */
    public function delete()
    {

        // $this->request->allowMethod(['post', 'delete']);
        // $Pessoas = $this->Pessoas->get($id);
        // if ($this->Pessoas->delete($Pessoas)) {
        //     $this->Flash->success(__('Imóvel excluído com sucesso.'));
        // } else {
        //     $this->Flash->error(__('Erro ao excluir o imóvel.'));
        // }
        // return $this->redirect(['action' => 'index']);
    }
    
}
