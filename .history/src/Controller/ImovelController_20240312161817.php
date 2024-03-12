<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Imovel;

/**
 * Imovels Controller
 *
 * @property \App\Model\Table\ImovelsTable $Imovels
 */


class ImovelsController extends AppController
{
    /**
     * Cria um registro na tabela Imovel de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Imovels';
        // die;
        // $Imovel = $this->Imovels->find();
        // $this->set(compact('Imovel'));
    }
    /**
     * Cria um registro na tabela Imovel de acordo com os dados fornecidos
     * 
     * @param Imovel $Imovel Objeto Imovel com dados a serem preenchidos
     */
    public function add()
    {
        
        // $Imovel = $this->Imovel->newEmptyEntity();
        // if ($this->request->is('post')) {
        //     $Imovel = $this->Imovel->patchEntity($Imovel, $this->request->getData());
        //     if ($this->Imovel->save($Imovel)) {
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao salvar o imóvel.'));
        // }
        // $this->set('$Imovel', $Imovel);
    }

    /**
     * Retorna um registro na tabela Imovel de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Imovel
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Imovels '.$this->request->getParam('id');
        // die;

        // $Imovel = $this->Imovel->get($id);
        // $this->set('Imovel', $Imovel);
    }
    
    /**
     * Edita um registro na tabela Imovel de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {

        // $Imovel = $this->Imovel->get($id);
        // if ($this->request->is(['post', 'put'])) {
        //     $Imovel = $this->Imovel->patchEntity($Imovel, $this->request->getData());
        //     if ($this->Imovel->save($Imovel)) {
        //         $this->Flash->success(__('Imóvel atualizado com sucesso.'));
        //         return $this->redirect(['action' => 'index']);
        //     }
        //     $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        // }
        // $this->set('Imovel', $Imovel);
    }
   
    /**
     * Deleta um registro na tabela Imovel de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Imovel = $this->Imovel->get($id);
        if ($this->Imovel->delete($Imovel)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
