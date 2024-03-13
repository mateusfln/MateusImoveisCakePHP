<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Pessoa;
use Cake\ORM\TableRegistry;

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
        
        if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['login']) && !empty($_POST['senha']))
        {
            $hoje = new \DateTimeImmutable();
            $tablePessoas = TableRegistry::getTableLocator()->get('Pessoas');
            
            $pessoaEntity = $tablePessoas->newEmptyEntity();
            $pessoaEntity->nome = $_POST['nome'];
            $pessoaEntity->cpf = $_POST['cpf'];
            $pessoaEntity->login = $_POST['login'];
            $pessoaEntity->senha = $_POST['senha'];
            $pessoaEntity->ativo = true;
            $pessoaEntity->criado = $hoje;
            $pessoaEntity->modificado = $hoje;
            $pessoaEntity->criador_id = 1;
            $pessoaEntity->modificador_id = 1;
            $tablePessoas->save($pessoaEntity); 
            return $this->redirect('admin/pessoas');
        }
        
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

        if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['login']) && !empty($_POST['senha']))
        {
            $hoje = new \DateTimeImmutable();
            $tablePessoas = TableRegistry::getTableLocator()->get('Pessoas');
            
            $pessoaEntity = $tablePessoas->newEmptyEntity();

            $pessoaEntity->id = $_GET['id'];
            $pessoaEntity->nome = $_POST['nome'];
            $pessoaEntity->cpf = $_POST['cpf'];
            $pessoaEntity->login = $_POST['login'];
            $pessoaEntity->senha = $_POST['senha'];
            $pessoaEntity->ativo = 0;
            if(!empty($_POST['ativo'])){
                $pessoaEntity->ativo = 1;    
            }
            $pessoaEntity->criado = $hoje;
            $pessoaEntity->modificado = $hoje;
            $pessoaEntity->criador_id = 1;
            $pessoaEntity->modificador_id = 1;
            $tablePessoas->save($pessoaEntity); 
            return $this->redirect('admin/pessoas');
        }
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
