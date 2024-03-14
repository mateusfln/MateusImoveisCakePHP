<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\CaracteristicasImoveltiposTable;
use App\Model\Table\ImoveisTable;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Classe Controladora de Imóveis
 *
 * @property \App\Model\Table\ImoveisTable $Imoveis
 */
class ImovelController extends AppController
{
    /**
     * Método que envia para a view uma variavel "$imoveis" contendo os registros da tabela Imoveis
     * @return void 
     */
    public function index() : void
    {
        $imoveis = new ImoveisTable();
        $imoveis = $imoveis->find();
        $this->set(compact('imoveis'));
    }

    /**
     * Cria um registro na tabela Imovel de acordo com os dados fornecidos na view
     * @return Response|null
     */
    public function add() : Response|null
    {
        if (!empty($_POST) && !empty($_POST['negociotipo']) && !empty($_POST['valor']) && isset($_FILES['arquivo'])) {

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

            foreach ($arquivo['name'] as $index => $arq) {

                $this->enviarArquivos($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index], $idImovel);
            }
            return $this->redirect('/admin/imovel');
        }
        return null;
    }

    /**
     * Retorna um registro na tabela Imovel de acordo com os dados fornecidos
     */
    public function read()
    {
        
    }

    /**
     * Edita um registro na tabela Imovel de acordo com os dados fornecidos
     * @return Response|null
     */
    public function update() : Response|null
    {

        if (!empty($_POST) && !empty($_POST['negociotipo']) && !empty($_POST['valor']) && isset($_FILES['arquivo'])) {

            $imovelTable = TableRegistry::getTableLocator()->get('Imoveis');
            $imovelEntity = $imovelTable->newEmptyEntity();
            $hoje = new \DateTimeImmutable();

            $arquivo = $_FILES['arquivo'];
            $imovelEntity->id = $_GET['id'];
            $imovelEntity->imoveltipo_id = $_POST['imoveltipo'];
            $imovelEntity->identificacao = $_POST['identificacao'];
            $imovelEntity->matricula = $_POST['matricula'];
            $imovelEntity->inscricao_imobiliaria = $_POST['inscricao_imobiliaria'];
            $imovelEntity->logradouro = $_POST['logradouro'];
            $imovelEntity->numero_logradouro = $_POST['numero_logradouro'];
            $imovelEntity->rua = $_POST['rua'];
            $imovelEntity->complemento = $_POST['complemento'];
            $imovelEntity->bairro = $_POST['bairro'];
            $imovelEntity->cidade = $_POST['cidade'];
            $imovelEntity->estado = $_POST['estado'];
            $imovelEntity->cep = $_POST['cep'];
            $imovelEntity->ibge = $_POST['ibge'];
            $imovelEntity->metros_quadrados = $_POST['metros_quadrados'];
            $imovelEntity->quartos = $_POST['quartos'];
            $imovelEntity->banheiros = $_POST['banheiros'];
            $imovelEntity->garagem = $_POST['garagem'];
            $imovelEntity->ativo = true;
            $imovelEntity->criado = $hoje;
            $imovelEntity->criador_id = 1;
            $imovelEntity->modificador_id = 1;
            $imovelEntity->modificado = $hoje;

            $imovelTable->save($imovelEntity);

            $imovelNegociotiposTable = TableRegistry::getTableLocator()->get('ImoveisNegociotipos');
            $imovelNegociotiposEntity = $imovelNegociotiposTable->newEmptyEntity();
            $imovelNegociotiposEntity = $imovelNegociotiposTable->find()->where(['ImoveisNegociotipos.imovel_id =' => $imovelEntity->id])->firstOrFail();

            $imovelNegociotiposEntity->imovel_id = ($imovelEntity->id);
            $imovelNegociotiposEntity->negociotipo_id = ($_POST['negociotipo']);
            $imovelNegociotiposEntity->valor = ($_POST['valor']);
            $imovelNegociotiposEntity->ativo = (true);
            $imovelNegociotiposEntity->criado = ($hoje);
            $imovelNegociotiposEntity->criador_id = (1);
            $imovelNegociotiposEntity->modificador_id = (1);
            $imovelNegociotiposEntity->modificado = ($hoje);

            $imovelNegociotiposTable->save($imovelNegociotiposEntity);

            $caracteristicasImoveltiposTable = new CaracteristicasImoveltiposTable();
            $caracteristicasImoveltiposTable->deleteAll(['imoveltipo_id' => $_POST['imoveltipo']]);


            foreach ($_POST['caracteristicas'] as $caracteristica) {

                $tableCaracteristicaImoveltipo = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
                $caracteristicasImoveltipos = $tableCaracteristicaImoveltipo->newEmptyEntity();

                $caracteristicasImoveltipos->imoveltipo_id = $_POST['imoveltipo'];
                $caracteristicasImoveltipos->caracteristica_id = $caracteristica;
                $caracteristicasImoveltipos->ativo = true;
                $caracteristicasImoveltipos->criado = $hoje;
                $caracteristicasImoveltipos->modificado = $hoje;
                $caracteristicasImoveltipos->criador_id = 1;
                $caracteristicasImoveltipos->modificador_id = 1;

                $tableCaracteristicaImoveltipo->save($caracteristicasImoveltipos);
            }
            $arquivo = $_FILES['arquivo'];

            foreach ($arquivo['name'] as $index => $arq) {

                $this->enviarArquivos($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index], $imovelEntity->id);
            }
            return $this->redirect('/admin/imovel');
        }
        return null;
    }

    /**
     * Deleta um registro na tabela Imovel de acordo com os dados fornecidos
     * @return Response|null
     */
    public function delete() : Response|null
    {

        if (!empty($_POST['delete_id'])) {
            $imovelTable = new ImoveisTable();
            $imovelTable->deleteAll(['id' => $_POST['delete_id']]);
            return $this->redirect('admin/Imovel');
        }
        return null;
        

    }

    /**
     * Método que envia para o banco e salva dentro do projeto os arquivos referente as mídias dos imóveis
     * @param int $error
     * @param int $size
     * @param string $name
     * @param string $tmp_name
     * @param string|int $id
     * @return boolean|null
     */
    private function enviarArquivos(int $error, int $size, string $name, string $tmp_name, string|int $id) : bool|null
    {
        $doisMegaBytes = 2097152;
         
        if ($error) {
            echo ('Falha ao enviar o arquivo');
        }

        if ($size > $doisMegaBytes) {
            echo ('Arquivo maior que o limite máximo de tamanho (2Mb)');
        }

        $pasta = "C:/wamp64/www/micake/html/plugins/Frontend/webroot/images/midiasImoveis/";

        $nomeDoArquivo = $name;
        $nomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        $path = $pasta . $nomeDoArquivo . "." . $extensao;
        $caminho = "/Frontend/images/midiasImoveis/" . $nomeDoArquivo . '.' . $extensao;
        $sucesso = move_uploaded_file($tmp_name, $path);

        if ($extensao != 'jpg' && $extensao != 'png') {
            header('Location: https://micake.localadmin/midias/add?erro=tipo de midia não suportado, favor inserir uma midia com a extensão PNG ou JPG.');
            exit;
        }
        if ($sucesso) {
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
        } else {
            return false;
        }
        return null;
    }

}
