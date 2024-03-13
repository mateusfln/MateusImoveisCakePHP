<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Imovel;
use App\Model\Table\CaracteristicasImoveltiposTable;
use Cake\ORM\TableRegistry;

/**
 * Imoveis Controller
 *
 * @property \App\Model\Table\ImoveisTable $Imoveis
 */


class ImovelController extends AppController
{   
    /**
     * Cria um registro na tabela Imovel de acordo com os dados fornecidos
     * 
     */
    public function index()
    {
        // echo'index de Imoveis';
        // die;
        // $Imovel = $this->Imoveis->find();
        // $this->set(compact('Imovel'));
    }
    /**
     * Cria um registro na tabela Imovel de acordo com os dados fornecidos
     * 
     * @param Imovel $Imovel Objeto Imovel com dados a serem preenchidos
     */
    public function add()
    {
        if(!empty($_POST) && !empty($_POST['negociotipo']) && !empty($_POST['valor']) && isset($_FILES['arquivo'])){
        
            $imovelTable = TableRegistry::getTableLocator()->get('Imoveis');
            $imovelEntity = $imovelTable->newEmptyEntity();
            
            $hoje = new \DateTimeImmutable();
        
            $arquivo = $_FILES['arquivo'];
        
            $imovelEntity->imoveltipo_id = ($_POST['imoveltipo']);
            $imovelEntity->identificacao = ($_POST['Identificacao']);
            $imovelEntity->matricula = ($_POST['Matricula']);
            $imovelEntity->inscricao_imobiliaria = ($_POST['inscricaoImobiliaria']);
            $imovelEntity->logradouro = ($_POST['logradouro']);
            $imovelEntity->numero_logradouro = ($_POST['NumeroLogradouro']);
            $imovelEntity->rua = ($_POST['Rua']);
            $imovelEntity->complemento = ($_POST['Complemento']);
            $imovelEntity->bairro = ($_POST['Bairro']);
            $imovelEntity->cidade = ($_POST['Cidade']);
            $imovelEntity->estado = ($_POST['Estado']);
            $imovelEntity->cep = ($_POST['Cep']);
            $imovelEntity->ibge = ($_POST['Ibge']);
            $imovelEntity->metros_quadrados = ($_POST['metrosQuadrados']);
            $imovelEntity->quartos = ($_POST['Quartos']);
            $imovelEntity->banheiros = ($_POST['Banheiros']);
            $imovelEntity->garagem = ($_POST['Garagem']);
            $imovelEntity->ativo = (true);
            $imovelEntity->criado = ($hoje);
            $imovelEntity->criador_id = (1);
            $imovelEntity->modificador_id = (1);
            $imovelEntity->modificado = ($hoje);
            $imovelTable->save($imovelEntity);
            $idImovel = $imovelEntity->id;
            
            $imovelNegociotiposTable = TableRegistry::getTableLocator()->get('ImoveisNegociotipos');
            $imovelNegociotiposEntity = $imovelNegociotiposTable->newEmptyEntity();
        
            $imovelNegociotiposEntity->imovel_id = ($idImovel);
            $imovelNegociotiposEntity->negociotipo_id = ($_POST['negociotipo']);
            $imovelNegociotiposEntity->valor = ($_POST['valor']);
            $imovelNegociotiposEntity->ativo = (true);
            $imovelNegociotiposEntity->criado = ($hoje);
            $imovelNegociotiposEntity->criador_id = (1);
            $imovelNegociotiposEntity->modificador_id = (1);
            $imovelNegociotiposEntity->modificado = ($hoje);
            $imovelNegociotiposTable->save($imovelNegociotiposEntity);
        
            foreach ($_POST['caracteristicas'] as $caracteristica) {

                $tableCaracteristicaImoveltipo = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
                $caracteristicasImoveltipos = $tableCaracteristicaImoveltipo->newEmptyEntity();
    
                $caracteristicasImoveltipos->imoveltipo_id = $idImovel;
                $caracteristicasImoveltipos->caracteristica_id = $caracteristica;
                $caracteristicasImoveltipos->ativo = true;
                $caracteristicasImoveltipos->criado = $hoje;
                $caracteristicasImoveltipos->modificado = $hoje;
                $caracteristicasImoveltipos->criador_id = 1;
                $caracteristicasImoveltipos->modificador_id = 1;

                $tableCaracteristicaImoveltipo->save($caracteristicasImoveltipos);
            }
                $arquivo = $_FILES['arquivo'];
        
                foreach($arquivo['name'] as $index => $arq){
        
                    $this->enviarArquivos($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index], $idImovel);
                }  
                return $this->redirect('/admin/imovel');
        }
    }

    /**
     * Retorna um registro na tabela Imovel de acordo com os dados fornecidos
     * 
     * @param int $id   Código do Imovel
     * @throws \Exception
     */
    public function read() 
    {
        // echo'index de Imoveis '.$this->request->getParam('id');
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


    private function enviarArquivos($error, $size, $name, $tmp_name, $id){

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
