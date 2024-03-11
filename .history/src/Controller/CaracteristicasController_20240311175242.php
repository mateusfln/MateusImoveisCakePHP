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
     * @return Caracteristica
     * @throws \Exception
     */
    public function read(int $id) : Caracteristica
    {

        $imovel = $this->Imoveis->get($id);
        $this->set('imovel', $imovel);
    }
    
    /**
     * Edita um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código do imóvel
     * @param Caracteristica $caracteristica Objeto Caracteristica
     * @return void
     */
    public function update(Caracteristica $caracteristica, int $id) : void
    {

        $sql = "UPDATE imoveis
                SET identificacao = '{$caracteristica->getIdentificacao()}',
                    Caracteristicatipo_id = '{$caracteristica->getCaracteristicatipoId()}',
                    matricula = '{$caracteristica->getMatricula()}',
        inscricao_imobiliaria = '{$caracteristica->getInscricaoImobiliaria()}',
                   logradouro = '{$caracteristica->getLogradouro()}',
            numero_logradouro = '{$caracteristica->getNumeroLogradouro()}', 
                          cep = '{$caracteristica->getCep()}',
                          rua = '{$caracteristica->getRua()}', 
                  complemento = '{$caracteristica->getComplemento()}', 
                       bairro = '{$caracteristica->getBairro()}',
                       cidade = '{$caracteristica->getCidade()}',
                       estado = '{$caracteristica->getEstado()}', 
                         ibge = '{$caracteristica->getIbge()}', 
                        ativo = '{$caracteristica->getAtivo()}', 
                       criado = '{$caracteristica->getCriado()->format('Y-m-d H:i:s')}', 
                   modificado = '{$caracteristica->getModificado()->format('Y-m-d H:i:s')}', 
                   criador_id = '{$caracteristica->getCriadorId()}', 
               modificador_id = '{$caracteristica->getModificadorId()}',
               metros_quadrados ='{$caracteristica->getMetrosQuadrados()}',
               quartos = '{$caracteristica->getQuartos()}',
               banheiros = '{$caracteristica->getBanheiros()}',
               garagem = '{$caracteristica->getVagasGaragem()}'
                
               WHERE id = '{$id}'";

            //print_r($sql); die;
        $this->getConexao()->query($sql);
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

        $sql = "DELETE FROM imoveis
               WHERE id = '{$id}'";
        $this->getConexao()->query($sql);
    }
}
