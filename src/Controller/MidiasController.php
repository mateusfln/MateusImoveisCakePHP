<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Midia;

/**
 * Midias Controller
 *
 * @property \App\Model\Table\MidiasTable $Midias
 */


class MidiasController extends AppController
{
    /**
     * Cria um registro na tabela Midia de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Midias';
        // die;
        // $Midia = $this->Midias->find();
        // $this->set(compact('Midia'));
    }
    /**
     * Cria um registro na tabela Midia de acordo com os dados fornecidos
     * 
     * @param Midia $Midia Objeto Midia com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Midia = $this->Midia->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Midia = $this->Midia->patchEntity($Midia, $this->request->getData());
        //     if ($this->Midia->save($Midia)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Midia', $Midia);
    }

    /**
     * Retorna um registro na tabela Midia de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Midia
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Midias '.$this->request->getParam('id');
        // die;

        // $Midia = $this->Midia->get($id);
        // $this->set('Midia', $Midia);
    }
    
    /**
     * Edita um registro na tabela Midia de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Midia = $this->Midia->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Midia = $this->Midia->patchEntity($Midia, $this->request->getData());
        //     if ($this->Midia->save($Midia)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Midia', $Midia);
    }
   
    /**
     * Deleta um registro na tabela Midia de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Midia = $this->Midia->get($id);
        if ($this->Midia->delete($Midia)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
