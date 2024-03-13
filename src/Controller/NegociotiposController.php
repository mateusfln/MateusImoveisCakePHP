<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Negociotipo;
use Cake\ORM\TableRegistry;

/**
 * Negociotipos Controller
 *
 * @property \App\Model\Table\NegociotiposTable $Negociotipos
 */


class NegociotiposController extends AppController
{
    /**
     * Cria um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Negociotipos';
        // die;
        // $Negociotipo = $this->Negociotipos->find();
        // $this->set(compact('Negociotipo'));
    }
    /**
     * Cria um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     * @param Negociotipo $Negociotipo Objeto Negociotipo com dados a serem preenchidos
     */
    public function add()
    {
        
        if (!empty($_POST['nome']))
        {
            $hoje = new \DateTimeImmutable();
            $tableNegociotipos = TableRegistry::getTableLocator()->get('Negociotipos');
            
            $negociotipoEntity = $tableNegociotipos->newEmptyEntity();
            $negociotipoEntity->nome = $_POST['nome'];
            $negociotipoEntity->ativo = true;
            $negociotipoEntity->criado = $hoje;
            $negociotipoEntity->modificado = $hoje;
            $negociotipoEntity->criador_id = 1;
            $negociotipoEntity->modificador_id = 1;
            $tableNegociotipos->save($negociotipoEntity); 
            return $this->redirect('admin/negociotipos');
        }
    }

    /**
     * Retorna um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Negociotipo
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Negociotipos '.$this->request->getParam('id');
        // die;

        // $Negociotipo = $this->Negociotipo->get($id);
        // $this->set('Negociotipo', $Negociotipo);
    }
    
    /**
     * Edita um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
   
     */
    public function update()
    {
        //dd($_POST);
        if (!empty($_POST['nome']))
        {
            //dd($_GET);
            $hoje = new \DateTimeImmutable();
            $tableNegociotipos = TableRegistry::getTableLocator()->get('Negociotipos');
            
            $negociotipoEntity = $tableNegociotipos->newEmptyEntity();

            $negociotipoEntity->id = $_GET['id'];
            $negociotipoEntity->nome = $_POST['nome'];
            $negociotipoEntity->ativo = 0;
            if(!empty($_POST['ativo'])){
                $negociotipoEntity->ativo = 1;    
            }
            $negociotipoEntity->criado = $hoje;
            $negociotipoEntity->modificado = $hoje;
            $negociotipoEntity->criador_id = 1;
            $negociotipoEntity->modificador_id = 1;
            $tableNegociotipos->save($negociotipoEntity); 

            
            
            return $this->redirect('admin/negociotipos');
        }
    }
   
    /**
     * Deleta um registro na tabela Negociotipo de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id
     * @return void
     */
    public function delete(int $id)
    {

        $this->request->allowMethod(['post', 'delete']);
        $Negociotipo = $this->Negociotipo->get($id);
        if ($this->Negociotipo->delete($Negociotipo)) {
            $this->Flash->success(__('Imóvel excluído com sucesso.'));
        } else {
            $this->Flash->error(__('Erro ao excluir o imóvel.'));
        }
        return $this->redirect(['action' => 'index']);
    }
    
}
