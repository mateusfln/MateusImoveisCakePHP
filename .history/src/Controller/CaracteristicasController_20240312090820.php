<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Caracteristica;

/**
 * Caracteristicas Controller
 *
 * @property \App\Model\Table\CaracteristicasTable $caracteristicas
 */
class CaracteristicasController extends AppController
{
    /**
     * Cria um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @return void
     * @param Caracteristica $caracteristica Objeto Caracteristica com dados a serem preenchidos
     */
    public function index(Caracteristica $caracteristica) : void
    {
        var_dump('oi');
        $Caracteristica = $this->Caracteristicas->find();
        $this->set(compact('Caracteristica'));
    }
    /**
     * Cria um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @param Caracteristica $caracteristica Objeto Caracteristica com dados a serem preenchidos
     */
    public function create(Caracteristica $caracteristica)
    {
        $caracteristica = $this->Caracteristica->newEmptyEntity();
        if ($this->request->is('post')) {
            $caracteristica = $this->Caracteristica->patchEntity($caracteristica, $this->request->getData());
            if ($this->Caracteristica->save($caracteristica)) {
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao salvar o imóvel.'));
        }
        $this->set('$caracteristica', $caracteristica);
    }

    /**
     * Retorna um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Caracteristica
     * @throws \Exception
     */
    public function read(int $id) : void
    {

        $caracteristica = $this->Caracteristica->get($id);
        $this->set('caracteristica', $caracteristica);
    }
    
    /**
     * Edita um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código do imóvel
     * @param Caracteristica $caracteristica Objeto Caracteristica
     */
    public function update(Caracteristica $caracteristica, int $id)
    {

        $caracteristica = $this->Caracteristica->get($id);
        if ($this->request->is(['post', 'put'])) {
            $caracteristica = $this->Caracteristica->patchEntity($caracteristica, $this->request->getData());
            if ($this->Caracteristica->save($caracteristica)) {
                $this->Flash->success(__('Imóvel atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        }
        $this->set('caracteristica', $caracteristica);
    }
   
    /**
     * Deleta um registro na tabela Caracteristica de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $caracteristica = $this->Caracteristica->get($id);
        if ($this->Caracteristica->delete($caracteristica)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
