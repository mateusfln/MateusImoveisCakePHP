<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Imoveis Controller
 *
 * @property \App\Model\Table\ImoveisTable $Imoveis
 */
class ImoveisController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Imoveis->find()
            ->contain(['ImovelNegociotipos', 'Negociotipos', 'Imoveltipos']);
        $imoveis = $this->paginate($query);

        $this->set(compact('imoveis'));
    }

    /**
     * View method
     *
     * @param string|null $id Imovei id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $imovei = $this->Imoveis->get($id, contain: ['ImovelNegociotipos', 'Negociotipos', 'Imoveltipos', 'Midias']);
        $this->set(compact('imovel'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $imovei = $this->Imoveis->newEmptyEntity();
        if ($this->request->is('post')) {
            $imovei = $this->Imoveis->patchEntity($imovel, $this->request->getData());
            if ($this->Imoveis->save($imovei)) {
                $this->Flash->success(__('The imovel has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imovel could not be saved. Please, try again.'));
        }
        $imovelNegociotipos = $this->Imoveis->ImovelNegociotipos->find('list', limit: 200)->all();
        $negociotipos = $this->Imoveis->Negociotipos->find('list', limit: 200)->all();
        $imoveltipos = $this->Imoveis->Imoveltipos->find('list', limit: 200)->all();
        $midias = $this->Imoveis->Midias->find('list', limit: 200)->all();
        $this->set(compact('imovel', 'imovelNegociotipos', 'negociotipos', 'imoveltipos', 'midias'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Imovei id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $imovei = $this->Imoveis->get($id, contain: ['Midias']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $imovei = $this->Imoveis->patchEntity($imovei, $this->request->getData());
            if ($this->Imoveis->save($imovei)) {
                $this->Flash->success(__('The imovei has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The imovei could not be saved. Please, try again.'));
        }
        $imovelNegociotipos = $this->Imoveis->ImovelNegociotipos->find('list', limit: 200)->all();
        $negociotipos = $this->Imoveis->Negociotipos->find('list', limit: 200)->all();
        $imoveltipos = $this->Imoveis->Imoveltipos->find('list', limit: 200)->all();
        $midias = $this->Imoveis->Midias->find('list', limit: 200)->all();
        $this->set(compact('imovei', 'imovelNegociotipos', 'negociotipos', 'imoveltipos', 'midias'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Imovei id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $imovei = $this->Imoveis->get($id);
        if ($this->Imoveis->delete($imovei)) {
            $this->Flash->success(__('The imovei has been deleted.'));
        } else {
            $this->Flash->error(__('The imovei could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
