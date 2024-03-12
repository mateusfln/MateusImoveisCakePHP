
<?php
use App\Model\Table\CaracteristicasImoveltiposTable;
use App\Model\Table\CaracteristicasTable;
use App\Model\Table\ImoveltiposTable;
$caracteristicasDAO = new CaracteristicasTable();
$caracteristicas = $caracteristicasDAO->find();

$caracteristicasImoveltiposDao = new CaracteristicasImoveltiposTable();
$caracteristicasImoveltipos = $caracteristicasImoveltiposDao->find();

$arrImoveltipos = [];

foreach ($caracteristicasImoveltipos as $imoveltipos) {
    $arrImoveltipos[] = $imoveltipos->getCaracteristicaId();
}

//  echo '<pre>';
//  print_r($arrImoveltipos); die;

$imovelNegociostiposDAO = new ImovelNegociotiposDAO();
$imovelNegociostipos = $imovelNegociostiposDAO->readPorImoveltipoId($_GET['id']);

$imoveltiposDAO = new ImoveltiposTable();
$imoveltipos = $imoveltiposDAO->find();

$negociotipos = new NegociotiposDAO();
$negociotipos = $negociotipos->find();

?>
        <!--==================================*
                   Main Section
        *====================================-->
        <div class="main-content-inner">
            <div class="row mb-4">
                <div class="col-md-12 grid-margin">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-center dashboard-header flex-wrap mb-3 mb-sm-0">
                            <h5 class="mr-4 mb-0 font-weight-bold">Dashboard</h5>
                            <div class="d-flex align-items-baseline dashboard-breadcrumb">
                                <p class="text-muted mb-0 mr-1 hover-cursor">Imóveis</p>
                                <i class="bi bi-chevron-right"></i>
                                <p class="text-muted mb-0 mr-1 hover-cursor">Read</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Progress Table start -->
                <div class="col-12 mt-4">
                    <div class="card">
                    <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                

                                    <form method="POST">
                                        <div class="card">
                                        <div class="col-12 d-flex">
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Cadastro de Imóveis</h4>
                                                            
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">IDENTIFICACAO</label>
                                                                    <input class="form-control" required type="text"name="IDENTIFICACAO" value="<?=$imovel['identificacao']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">MATRICULA</label>
                                                                    <input class="form-control" required type="text"name="MATRICULA" value="<?=$imovel['matricula']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">INSCRICAO IMOBILIARIA</label>
                                                                    <input class="form-control" required type="text"name="INSCRICAO IMOBILIARIA" value="<?=$imovel['inscricao_imobiliaria']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">LOGRADOURO</label>
                                                                    <input class="form-control" required type="text"name="LOGRADOURO" value="<?=$imovel['logradouro']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">NUMERO LOGRADOURO</label>
                                                                    <input class="form-control" required type="text"name="NUMERO LOGRADOURO" value="<?=$imovel['numero_logradouro']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">RUA</label>
                                                                    <input class="form-control" required type="text"name="RUA" value="<?=$imovel['rua']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">BAIRRO</label>
                                                                    <input class="form-control" required type="text"name="BAIRRO" value="<?=$imovel['bairro']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">CIDADE</label>
                                                                    <input class="form-control" required type="text"name="CIDADE" value="<?=$imovel['cidade']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">ESTADO</label>
                                                                    <input class="form-control" required type="text"name="ESTADO" value="<?=$imovel['estado']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">CEP</label>
                                                                    <input class="form-control" required type="text"name="CEP" value="<?=$imovel['cep']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">IBGE</label>
                                                                    <input class="form-control" required type="text"name="IBGE" value="<?=$imovel['ibge']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">metrosQuadrados</label>
                                                                    <input class="form-control" required type="text"name="metrosQuadrados" value="<?=$imovel['metrosQuadrados']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Quartos</label> 
                                                                    <select class="form-control" name="Quartos" value="<?=$imovel['quartos']?>">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Banheiros</label> 
                                                                    <select class="form-control" name="Banheiros" value="<?=$imovel['banheiros']?>">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Garagem</label> 
                                                                    <select class="form-control" name="Garagem" value="<?=$imovel['vagasGaragem']?>">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                
                                                    </div>
                                                </div>
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Tipo do Imóvel:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='imoveltipo' id='imoveltipo'>
                                                                <?php foreach($imoveltipos as $imoveltipo):?>
                                                                <option value="<?=$imoveltipo['id']?>" <?= $imovel->imovelTipos['id'] == $imoveltipo['id']?  'selected="selected"': '' ?> id="<?=$imoveltipo['nome']?>"><?=$imoveltipo['nome']?></option>
                                                                <label for="<?=$imoveltipo['nome']?>" class="col-form-label"><?=$imoveltipo['nome']?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Tipo de Negócio:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='negociotipo'>
                                                                <?php foreach($negociotipos as $negociotipo):?>
                                                                <option value="<?=$negociotipo['id']?>" <?= $imovel->negocioTipos['id'] == $negociotipo['id']?  'selected="selected"': '' ?> id="<?=$negociotipo['nome']?>"><?=$negociotipo['nome']?></option>
                                                                <label for="<?=$negociotipo['nome']?>" class="col-form-label"><?=$negociotipo['nome']?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Caracteristicas inclusas:</h4>
                                                            <div class="form-group">
                                                            
                                                                <?php foreach($caracteristicas as $caracteristica):?>
                                                                <div>
                                                                <input type="checkbox" name="caracteristicas[]" id="<?=$caracteristica['id']?>" value="<?=$caracteristica['id']?>" <?= in_array($caracteristica['id'], $arrImoveltipos) ? ' checked="checked"' : '' ?>>
                                                                <label for="<?=$caracteristica['id']?>" class="col-form-label"><?=$caracteristica['nome']?></label>
                                                                <br>
                                                                </div>
                                                                <?php endforeach;?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="col-form-label">Valor</label>
                                                                <input class="form-control" required type="number" name="valor" value="<?=$imovelNegociostipos['Valor']?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Progress Table end -->
            </div>
            
        </div>
        <!--==================================*
                   End Main Section
        *====================================-->
    
<script>
    let jsonCaracteristicaImoveltipo = JSON.parse('<?=$jsonCaracteristicaImoveltipo?>');

function getCaracteristicasByImovelTipoId(imovelTipoId) {
    for (item in jsonCaracteristicaImoveltipo) {
        if (item == imovelTipoId) {
            return jsonCaracteristicaImoveltipo[item];
        }
    }
}

$('#imoveltipo').change(function(){
    let imovelTipoId = $(this).val();
    let caracteristicas = getCaracteristicasByImovelTipoId(imovelTipoId);
    $("input[name='caracteristicas[]']").each(function(index){
        if (caracteristicas.includes(parseInt($(this).val()))) {
            $(this).parent().show();
        } else {
            $(this).parent().hide();
        }
    });
});

$('#imoveltipo').trigger('change');
</script>
