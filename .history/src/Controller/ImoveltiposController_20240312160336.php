<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Imoveltipos;

/**
 * Imoveltiposs Controller
 *
 * @property \App\Model\Table\ImoveltipossTable $Imoveltipos
 */


class Imoveltipos extends AppController
{
    /**
     * Cria um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Imoveltiposs';
        // die;
        // $Imoveltipos = $this->Imoveltiposs->find();
        // $this->set(compact('Imoveltipos'));
    }
    /**
     * Cria um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
     * @param Imoveltipos $Imoveltipos Objeto Imoveltipos com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Imoveltipos = $this->Imoveltipos->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Imoveltipos = $this->Imoveltipos->patchEntity($Imoveltipos, $this->request->getData());
        //     if ($this->Imoveltipos->save($Imoveltipos)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Imoveltipos', $Imoveltipos);
    }

    /**
     * Retorna um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Imoveltipos
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Imoveltiposs '.$this->request->getParam('id');
        // die;

        // $Imoveltipos = $this->Imoveltipos->get($id);
        // $this->set('Imoveltipos', $Imoveltipos);
    }
    
    /**
     * Edita um registro na tabela Imoveltipos de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Imoveltipos = $this->Imoveltipos->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Imoveltipos = $this->Imoveltipos->patchEntity($Imoveltipos, $this->request->getData());
        //     if ($this->Imoveltipos->save($Imoveltipos)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Imoveltipos', $Imoveltipos);
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
        $Imoveltipos = $this->Imoveltipos->get($id);
        if ($this->Imoveltipos->delete($Imoveltipos)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}

