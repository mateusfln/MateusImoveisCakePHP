<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Caracteristicas Controller
 *
 */
class CaracteristicasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Caracteristicas->find();
        $caracteristicas = $this->paginate($query);

        $this->set(compact('caracteristicas'));
    }

    /**
     * View method
     *
     * @param string|null $id Admin Crud/caracteristica id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $caracteristica = $this->Caracteristicas->get($id, contain: []);
        $this->set(compact('caracteristica'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caracteristica = $this->Caracteristicas->newEmptyEntity();
        if ($this->request->is('post')) {
            $caracteristica = $this->Caracteristicas->patchEntity($caracteristica, $this->request->getData());
            if ($this->Caracteristicas->save($caracteristica)) {
                $this->Flash->success(__('The admin crud/caracteristica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin crud/caracteristica could not be saved. Please, try again.'));
        }
        $this->set(compact('caracteristica'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Admin Crud/caracteristica id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caracteristica = $this->Caracteristicas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caracteristica = $this->Caracteristicas->patchEntity($caracteristica, $this->request->getData());
            if ($this->Caracteristicas->save($caracteristica)) {
                $this->Flash->success(__('The admin crud/caracteristica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin crud/caracteristica could not be saved. Please, try again.'));
        }
        $this->set(compact('caracteristica'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Admin Crud/caracteristica id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $caracteristica = $this->Caracteristicas->get($id);
        if ($this->Caracteristicas->delete($caracteristica)) {
            $this->Flash->success(__('The admin crud/caracteristica has been deleted.'));
        } else {
            $this->Flash->error(__('The admin crud/caracteristica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
