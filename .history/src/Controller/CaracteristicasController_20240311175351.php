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
     * Cria um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @return void
     * @param Caracteristica $caracteristica Objeto Caracteristica com dados a serem preenchidos
     */
    public function index(Caracteristica $caracteristica) : void
    {
        $imoveis = $this->Caracteristicas->find();
        $this->set(compact('imoveis'));
    }
    /**
     * Cria um registro na tabela imoveis de acordo com os dados fornecidos
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
     * Retorna um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Caracteristica
     * @throws \Exception
     */
    public function read(int $id) : void
    {

        $caracteristica = $this->Imoveis->get($id);
        $this->set('caracteristica', $caracteristica);
    }
    
    /**
     * Edita um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código do imóvel
     * @param Caracteristica $caracteristica Objeto Caracteristica
     */
    public function update(Caracteristica $caracteristica, int $id)
    {

        $caracteristica = $this->Imoveis->get($id);
        if ($this->request->is(['post', 'put'])) {
            $caracteristica = $this->Imoveis->patchEntity($caracteristica, $this->request->getData());
            if ($this->Imoveis->save($caracteristica)) {
                $this->Flash->success(__('Imóvel atualizado com sucesso.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Erro ao atualizar o imóvel.'));
        }
        $this->set('caracteristica', $caracteristica);
    }
   
    /**
     * Deleta um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id) : void
    {

        $this->request->allowMethod('post', 'delete');
        $caracteristica = $this->Imoveis->get($id);
        if ($this->Imoveis->delete($caracteristica)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    }
}
