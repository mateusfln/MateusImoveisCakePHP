<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Midia;
use App\Model\Table\MidiasTable;
use Cake\ORM\TableRegistry;

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

        if (isset($_FILES['arquivo']) && isset($_POST['imovel_id'])){
            $id = $_POST['imovel_id'];
            $arquivo = $_FILES['arquivo'];
    
            foreach($arquivo['name'] as $index => $arq){
    
                $this->enviarArquivos($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index], $id);
            }
            return $this->redirect('admin/midias');
        }
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
        if(isset($_POST['imovel_id'])){
        $hoje = new \DateTimeImmutable();
            $midiaTable = TableRegistry::getTableLocator()->get('Midias');
            
            $midiaEntity = $midiaTable->newEmptyEntity();
        
            $midiaEntity->id = $_GET['id'];
            $midiaEntity->imovel_id = $_POST['imovel_id'];
            $midiaEntity->capa = 0;
            if(!empty($_POST['capa'])){
                $midiaEntity->capa = 1;    
            }
            $midiaEntity->ativo = 0;
            if(!empty($_POST['ativo'])){
                $midiaEntity->ativo = 1;    
            }
            $midiaEntity->criado = $hoje;
            $midiaEntity->criador_id = 1;
            $midiaEntity->modificador_id = 1;
            $midiaEntity->modificado = $hoje;
            $midiaTable->save($midiaEntity);
            return $this->redirect('admin/midias');
        }
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

    public function enviarArquivos($error, $size, $name, $tmp_name, $id){

        if($error){
            echo('Falha ao enviar o arquivo');
        }

        if($size > 2097152){
            echo('Arquivo maior que o limite máximo de tamanho (2Mb)');
        }

        $pasta = "C:/wamp64/www/micake/html/plugins/Frontend/webroot/images/midiasImoveis/";
        
        $nomeDoArquivo = $name;
        $nomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $pasta.$nomeDoArquivo.".".$extensao;
        $caminho = "/Frontend/images/midiasImoveis/".$nomeDoArquivo.'.'.$extensao;
        $sucesso = move_uploaded_file($tmp_name, $path);
        
        if($extensao != 'jpg' && $extensao != 'png' ){
            header('Location: https://micake.localadmin/midias/add?erro=tipo de midia não suportado, favor inserir uma midia com a extensão PNG ou JPG.');
            exit;
        }
        if($sucesso){
            $hoje = new \DateTimeImmutable();
            $midiaTable = TableRegistry::getTableLocator()->get('Midias');
            
            $midiaEntity = $midiaTable->newEmptyEntity();
        
            $midiaEntity->imovel_id = $id;
            $midiaEntity->identificacao = $nomeDoArquivo;
            $midiaEntity->nome_disco = $caminho;
            $midiaEntity->capa = true;
            $midiaEntity->ativo = true;
            $midiaEntity->criado = $hoje;
            $midiaEntity->criador_id = 1;
            $midiaEntity->modificador_id = 1;
            $midiaEntity->modificado = $hoje;
            $midiaTable->save($midiaEntity);
        }else{
            return false;
        }
    }    
}
