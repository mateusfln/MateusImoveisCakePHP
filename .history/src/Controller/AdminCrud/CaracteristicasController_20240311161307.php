<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AdminCrud/Caracteristicas Controller
 *
 */
class AdminCrud\\/CaracteristicasController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->AdminCrud/Caracteristicas->find();
        $adminCrud/caracteristicas = $this->paginate($query);

        $this->set(compact('adminCrud/caracteristicas'));
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
        $adminCrud/caracteristica = $this->AdminCrud/Caracteristicas->get($id, contain: []);
        $this->set(compact('adminCrud/caracteristica'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adminCrud/caracteristica = $this->AdminCrud/Caracteristicas->newEmptyEntity();
        if ($this->request->is('post')) {
            $adminCrud/caracteristica = $this->AdminCrud/Caracteristicas->patchEntity($adminCrud/caracteristica, $this->request->getData());
            if ($this->AdminCrud/Caracteristicas->save($adminCrud/caracteristica)) {
                $this->Flash->success(__('The admin crud/caracteristica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin crud/caracteristica could not be saved. Please, try again.'));
        }
        $this->set(compact('adminCrud/caracteristica'));
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
        $adminCrud/caracteristica = $this->AdminCrud/Caracteristicas->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adminCrud/caracteristica = $this->AdminCrud/Caracteristicas->patchEntity($adminCrud/caracteristica, $this->request->getData());
            if ($this->AdminCrud/Caracteristicas->save($adminCrud/caracteristica)) {
                $this->Flash->success(__('The admin crud/caracteristica has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin crud/caracteristica could not be saved. Please, try again.'));
        }
        $this->set(compact('adminCrud/caracteristica'));
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
        $adminCrud/caracteristica = $this->AdminCrud/Caracteristicas->get($id);
        if ($this->AdminCrud/Caracteristicas->delete($adminCrud/caracteristica)) {
            $this->Flash->success(__('The admin crud/caracteristica has been deleted.'));
        } else {
            $this->Flash->error(__('The admin crud/caracteristica could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
