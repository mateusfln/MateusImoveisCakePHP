<?php
declare(strict_types=1);

namespace App\Controller;

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
     * @return \App\Model\Entity\Imovei Objeto Imovel com dados preenchidos
     * @param Imovei $imovel Objeto Imovel com dados a serem preenchidos
     */
    public function create(Imovel $imovel) : Imovel
    {
        
        $sql = "INSERT INTO imoveis (imoveltipo_id,identificacao, matricula, inscricao_imobiliaria, logradouro,
                numero_logradouro, cep, rua, complemento, bairro, cidade, estado, ibge, ativo, criado, modificado, criador_id, modificador_id, metros_quadrados, quartos, banheiros, garagem)
                VALUES ('{$imovel->getImoveltipoId()}','{$imovel->getIdentificacao()}', '{$imovel->getMatricula()}', '{$imovel->getInscricaoImobiliaria()}',
                        '{$imovel->getLogradouro()}', '{$imovel->getNumeroLogradouro()}', '{$imovel->getCep()}',
                        '{$imovel->getRua()}', '{$imovel->getComplemento()}', '{$imovel->getBairro()}',
                        '{$imovel->getCidade()}', '{$imovel->getEstado()}', '{$imovel->getIbge()}', {$imovel->getAtivo()},
                        '{$imovel->getCriado()->format('Y-m-d H:i:s')}', '{$imovel->getModificado()->format('Y-m-d H:i:s')}',
                        {$imovel->getCriadorId()}, {$imovel->getModificadorId()}, '{$imovel->getMetrosQuadrados()}',
                        '{$imovel->getQuartos()}', '{$imovel->getBanheiros()}', '{$imovel->getVagasGaragem()}')";
        print_r($sql); 
        
         $this->getConexao()->query($sql);
        
         $imovel->setId($this->getInsertId());
         
         return $imovel;
    }

    /**
     * Retorna um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @param int $id   Código do imovel
     * @return Imovel
     * @throws \Exception
     */
    public function read(int $id) : Imovel
    {

        $sql = "SELECT i.id, i.identificacao, matricula, inscricao_imobiliaria, logradouro, numero_logradouro, it.id as itid, 
        complemento, rua, bairro, cidade, estado, cep, ibge, i.ativo, metros_quadrados, quartos, banheiros, garagem, n.nome as nnome, n.id as nid, it.nome as itnome, nt.valor,
        m.identificacao AS midia_identificacao, m.nome_disco AS midia_nome_disco, m.capa AS midia_capa, i.criador_id, i.modificador_id
        FROM imoveis i
        INNER JOIN imoveis_negociotipos nt ON i.id = nt.imovel_id
        INNER JOIN negociotipos n ON nt.negociotipo_id = n.id
        INNER JOIN imoveltipos it ON i.imoveltipo_id = it.id
        INNER JOIN midias m ON i.id = m.imovel_id
        WHERE i.id = '{$id}'";
        
        $qry = $this->getConexao()->query($sql);
        return (new Imovel())->hydrate(mysqli_fetch_assoc($qry));
    }
    
    /**
     * Edita um registro na tabela imoveis de acordo com os dados fornecidos
     * 
     * @throws \Exception
     * @param int $id Código do imóvel
     * @param Imovel $imovel Objeto Imovel
     * @return void
     */
    public function update(Imovel $imovel, int $id) : void
    {

        $sql = "UPDATE imoveis
                SET identificacao = '{$imovel->getIdentificacao()}',
                    imoveltipo_id = '{$imovel->getImoveltipoId()}',
                    matricula = '{$imovel->getMatricula()}',
        inscricao_imobiliaria = '{$imovel->getInscricaoImobiliaria()}',
                   logradouro = '{$imovel->getLogradouro()}',
            numero_logradouro = '{$imovel->getNumeroLogradouro()}', 
                          cep = '{$imovel->getCep()}',
                          rua = '{$imovel->getRua()}', 
                  complemento = '{$imovel->getComplemento()}', 
                       bairro = '{$imovel->getBairro()}',
                       cidade = '{$imovel->getCidade()}',
                       estado = '{$imovel->getEstado()}', 
                         ibge = '{$imovel->getIbge()}', 
                        ativo = '{$imovel->getAtivo()}', 
                       criado = '{$imovel->getCriado()->format('Y-m-d H:i:s')}', 
                   modificado = '{$imovel->getModificado()->format('Y-m-d H:i:s')}', 
                   criador_id = '{$imovel->getCriadorId()}', 
               modificador_id = '{$imovel->getModificadorId()}',
               metros_quadrados ='{$imovel->getMetrosQuadrados()}',
               quartos = '{$imovel->getQuartos()}',
               banheiros = '{$imovel->getBanheiros()}',
               garagem = '{$imovel->getVagasGaragem()}'
                
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
