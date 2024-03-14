<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Table\MidiasTable;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Classe Controladora de Midias
 *
 * @property \App\Model\Table\MidiasTable $Midias
 */
class MidiasController extends AppController
{
    /**
     * Método que envia para a view uma variavel "$midias" contendo os registros da tabela Midias
     * @return void 
     */
    public function index()
    {
        $midias = new MidiasTable();
        $midias = $midias->find();
        $this->set(compact('midias'));
    }

    /**
     * Cria um registro na tabela Imovel de acordo com os dados fornecidos na view
     * @return Response|null
     */
    public function add(): Response|null
    {

        if (isset($_FILES['arquivo']) && isset($_POST['imovel_id'])) {
            $id = $_POST['imovel_id'];
            $arquivo = $_FILES['arquivo'];

            foreach ($arquivo['name'] as $index => $arq) {

                $this->enviarArquivos($arquivo['error'][$index], $arquivo['size'][$index], $arquivo['name'][$index], $arquivo['tmp_name'][$index], $id);
            }
            return $this->redirect('admin/midias');
        }
        return null;
    }

    /**
     * Retorna um registro na tabela Midias de acordo com os dados fornecidos
     */
    public function read()
    {

    }

    /**
     * Edita um registro na tabela Midias de acordo com os dados fornecidos
     * @return Response|null
     */
    public function update(): Response|null
    {
        if (isset($_POST['imovel_id'])) {
            $hoje = new \DateTimeImmutable();
            $midiaTable = TableRegistry::getTableLocator()->get('Midias');
            $midiaEntity = $midiaTable->newEmptyEntity();

            $midiaEntity->id = $_GET['id'];
            $midiaEntity->imovel_id = $_POST['imovel_id'];
            $midiaEntity->capa = 0;
            if (!empty($_POST['capa'])) {
                $midiaEntity->capa = 1;
            }
            $midiaEntity->ativo = 0;
            if (!empty($_POST['ativo'])) {
                $midiaEntity->ativo = 1;
            }
            $midiaEntity->criado = $hoje;
            $midiaEntity->criador_id = 1;
            $midiaEntity->modificador_id = 1;
            $midiaEntity->modificado = $hoje;

            $midiaTable->save($midiaEntity);
            return $this->redirect('admin/midias');
        }
        return null;
    }

    /**
     * Deleta um registro na tabela Midias de acordo com os dados fornecidos
     * @return Response|null
     */
    public function delete(): Response|null
    {
        if (!empty($_POST['delete_id'])) {
            $midiasTable = new MidiasTable();
            $midiasTable->deleteAll(['id' => $_POST['delete_id']]);

            return $this->redirect('admin/Midias');
        }
        return null;

    }

    /**
     * Método que envia para o banco e salva dentro do projeto os arquivos referente as mídias dos imóveis
     * @param int $error
     * @param int $size
     * @param string $name
     * @param string $tmp_name
     * @param string $id
     * @return boolean|null
     */
    public function enviarArquivos(int $error, int $size, string $name, string $tmp_name, int $id): bool|null
    {

        if ($error) {
            echo ('Falha ao enviar o arquivo');
        }

        if ($size > 2097152) {
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
