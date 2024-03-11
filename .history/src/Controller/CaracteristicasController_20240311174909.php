<?php
declare(strict_types=1);

namespace App\Controller;
use App\Model\Entity\Caracteristica;

/**
 * Caracteristicas Controller
 *
 * @property \App\Model\Table\CaracteristicasTable $Caracteristicas
 */
class CaracteristicasController extends AppController
{
    /**
     * Cria um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @return void
     * @param Caracteristica $caracteristica Objeto Caracteristica com dados a serem preenchidos
     */
    public function index(Caracteristica $Caracteristica) : void
    {
        $imoveis = $this->Caracteristicas->find();
        $this->set(compact('imoveis'));
    }
    /**
     * Cria um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @return \App\Model\Entity\Caracteristica Objeto Caracteristica com dados preenchidos
     * @param Caracteristica $Caracteristica Objeto Caracteristica com dados a serem preenchidos
     */
    public function create(Caracteristica $Caracteristica) : Caracteristica
    {
        $Caracteristica;
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

        $sql = "SELECT i.id, i.identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, it.id as itid, 
        complemento, rua, bairro, cidade, estado, cep, ibge, i.ativo, metros_quadrados, quartos, banheiros, garagem, n.nome as nnome, n.id as nid, it.nome as itnome, nt.valor,
        m.identificacao AS midia_identificacao, m.nome_disco AS midia_nome_disco, m.capa AS midia_capa, i.criador_id, i.modificador_id
        FROM imoveis i
        INNER JOIN imoveis_negociotipos nt ON i.id = nt.Caracteristica_id
        INNER JOIN negociotipos n ON nt.negociotipo_id = n.id
        INNER JOIN Caracteristicatipos it ON i.Caracteristicatipo_id = it.id
        INNER JOIN midias m ON i.id = m.Caracteristica_id
        WHERE i.id = '{$id}'";
        
        $qry = $this->getConexao()->query($sql);
        return (new Caracteristica())->hydrate(mysqli_fetch_assoc($qry));
    }
    
    /**
     * Edita um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código do imóvel
     * @param Caracteristica $Caracteristica Objeto Caracteristica
     * @return void
     */
    public function update(Caracteristica $Caracteristica, int $id) : void
    {

        $sql = "UPDATE imoveis
                SET identificacao = '{$Caracteristica->getIdentificacao()}',
                    Caracteristicatipo_id = '{$Caracteristica->getCaracteristicatipoId()}',
                    matricula = '{$Caracteristica->getMatricula()}',
        inscricao_imobiliaria = '{$Caracteristica->getInscricaoImobiliaria()}',
                   logradouro = '{$Caracteristica->getLogradouro()}',
            numero_logradouro = '{$Caracteristica->getNumeroLogradouro()}', 
                          cep = '{$Caracteristica->getCep()}',
                          rua = '{$Caracteristica->getRua()}', 
                  complemento = '{$Caracteristica->getComplemento()}', 
                       bairro = '{$Caracteristica->getBairro()}',
                       cidade = '{$Caracteristica->getCidade()}',
                       estado = '{$Caracteristica->getEstado()}', 
                         ibge = '{$Caracteristica->getIbge()}', 
                        ativo = '{$Caracteristica->getAtivo()}', 
                       criado = '{$Caracteristica->getCriado()->format('Y-m-d H:i:s')}', 
                   modificado = '{$Caracteristica->getModificado()->format('Y-m-d H:i:s')}', 
                   criador_id = '{$Caracteristica->getCriadorId()}', 
               modificador_id = '{$Caracteristica->getModificadorId()}',
               metros_quadrados ='{$Caracteristica->getMetrosQuadrados()}',
               quartos = '{$Caracteristica->getQuartos()}',
               banheiros = '{$Caracteristica->getBanheiros()}',
               garagem = '{$Caracteristica->getVagasGaragem()}'
                
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
