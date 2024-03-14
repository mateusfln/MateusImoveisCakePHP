
<?php
use App\Model\Table\CaracteristicasTable;
use App\Model\Table\ImoveltiposTable;
use App\Model\Table\NegociotiposTable;
use Cake\ORM\TableRegistry;
$caracteristicasDAO = new CaracteristicasTable();
$caracteristicas = $caracteristicasDAO->find();

$caracteristicasImoveltiposTable = TableRegistry::getTableLocator()->get('CaracteristicasImoveltipos');
$caracteristicasImoveltipos = $caracteristicasImoveltiposTable->find()->where(['CaracteristicasImoveltipos.imoveltipo_id =' => $_GET['itp']]);

$imoveltiposDAO = new ImoveltiposTable();
$imoveltipos = $imoveltiposDAO->find();

//dd($imoveltipos);

$negociotipos = new NegociotiposTable();
$negociotipos = $negociotipos->find();

 $imovelNegociostiposTable = TableRegistry::getTableLocator()->get('ImoveisNegociotipos');
 $imovelNegociostipos = $imovelNegociostiposTable->find()->where(['ImoveisNegociotipos.imovel_id =' => $_GET['id']])->firstOrFail();
 //dd($imovelNegociostipos);

$imovelTable = TableRegistry::getTableLocator()->get('Imoveis');
$imovel = $imovelTable->get($_GET['id']);

$arrImoveltipos = [];

foreach ($caracteristicasImoveltipos as $imoveltiposItem) {
    $arrImoveltipos[] = $imoveltiposItem->caracteristica_id;
}
//dd($arrImoveltipos);


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
                                

                                    <?=$this->Form->create(null, ['type' => 'file', 'method' => 'post'])?>
                                        <div class="card">
                                        <div class="col-12 d-flex">
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Cadastro de Imóveis</h4>
                                                            
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">IDENTIFICACAO</label>
                                                                    <input class="form-control" required type="text"name="identificacao" value="<?=$imovel['identificacao']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">MATRICULA</label>
                                                                    <input class="form-control" required type="text"name="matricula" value="<?=$imovel['matricula']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">INSCRICAO IMOBILIARIA</label>
                                                                    <input class="form-control" required type="text"name="inscricao imobiliaria" value="<?=$imovel['inscricao_imobiliaria']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">LOGRADOURO</label>
                                                                    <input class="form-control" required type="text"name="logradouro" value="<?=$imovel['logradouro']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">NUMERO LOGRADOURO</label>
                                                                    <input class="form-control" required type="text"name="numero logradouro" value="<?=$imovel['numero_logradouro']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">RUA</label>
                                                                    <input class="form-control" required type="text"name="rua" value="<?=$imovel['rua']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">COMPLEMENTO</label>
                                                                    <input class="form-control" required type="text"name="complemento" value="<?=$imovel['complemento']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">BAIRRO</label>
                                                                    <input class="form-control" required type="text"name="bairro" value="<?=$imovel['bairro']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">CIDADE</label>
                                                                    <input class="form-control" required type="text"name="cidade" value="<?=$imovel['cidade']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Estado</label>
                                                                    <select class="form-control" required name="estado">
                                                                        <option value="AC">AC </option>
                                                                        <option value="AL">AL </option>
                                                                        <option value="AM">AM </option>
                                                                        <option value="AP">AP </option>
                                                                        <option value="BA">BA </option>
                                                                        <option value="CE">CE </option>
                                                                        <option value="DF">DF </option>
                                                                        <option value="ES">ES </option>
                                                                        <option value="GO">GO </option>
                                                                        <option value="MA">MA </option>
                                                                        <option value="MG">MG </option>
                                                                        <option value="MS">MS </option>
                                                                        <option value="MT">MT </option>
                                                                        <option value="PA">PA </option>
                                                                        <option value="PB">PB </option>
                                                                        <option value="PE">PE </option>
                                                                        <option value="PI">PI </option>
                                                                        <option value="PR">PR </option>
                                                                        <option value="RJ">RJ </option>
                                                                        <option value="RN">RN </option>
                                                                        <option value="RO">RO </option>
                                                                        <option value="RR">RR </option>
                                                                        <option value="RS">RS </option>
                                                                        <option value="SC">SC </option>
                                                                        <option value="SE">SE </option>
                                                                        <option value="SP">SP </option>
                                                                        <option value="TO">TO </option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">CEP</label>
                                                                    <input class="form-control" required type="text"name="cep" value="<?=$imovel['cep']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">IBGE</label>
                                                                    <input class="form-control" required type="text"name="ibge" value="<?=$imovel['ibge']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">metrosQuadrados</label>
                                                                    <input class="form-control" required type="text"name="metros_quadrados" value="<?=$imovel['metros_quadrados']?>">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Quartos</label> 
                                                                    <select class="form-control" name="quartos" >
                                                                    <option value="1" <?= $imovel['quartos'] == 1?  'selected="selected"': '' ?>>1</option>
                                                                    <option value="2" <?= $imovel['quartos'] == 2?  'selected="selected"': '' ?>>2</option>
                                                                    <option value="3" <?= $imovel['quartos'] == 3?  'selected="selected"': '' ?>>3</option>
                                                                    <option value="4" <?= $imovel['quartos'] == 4?  'selected="selected"': '' ?>>4</option>
                                                                    <option value="5" <?= $imovel['quartos'] == 5?  'selected="selected"': '' ?>>5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Banheiros</label> 
                                                                    <select class="form-control" name="banheiros" >
                                                                    <option value="1" <?= $imovel['banheiros'] == 1?  'selected="selected"': '' ?>>1</option>
                                                                    <option value="2" <?= $imovel['banheiros'] == 2?  'selected="selected"': '' ?>>2</option>
                                                                    <option value="3" <?= $imovel['banheiros'] == 3?  'selected="selected"': '' ?>>3</option>
                                                                    <option value="4" <?= $imovel['banheiros'] == 4?  'selected="selected"': '' ?>>4</option>
                                                                    <option value="5" <?= $imovel['banheiros'] == 5?  'selected="selected"': '' ?>>5</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label">Garagem</label> 
                                                                    <select class="form-control" name="garagem" >
                                                                    <option value="1" <?= $imovel['garagem'] == 1?  'selected="selected"': '' ?>>1</option>
                                                                    <option value="2" <?= $imovel['garagem'] == 2?  'selected="selected"': '' ?>>2</option>
                                                                    <option value="3" <?= $imovel['garagem'] == 3?  'selected="selected"': '' ?>>3</option>
                                                                    <option value="4" <?= $imovel['garagem'] == 4?  'selected="selected"': '' ?>>4</option>
                                                                    <option value="5" <?= $imovel['garagem'] == 5?  'selected="selected"': '' ?>>5</option>
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
                                                                <option value="<?=$imoveltipo['id']?>" <?= $imoveltipo['id'] == $imovel['imoveltipo_id']?  'selected="selected"': '' ?> id="<?=$imoveltipo['nome']?>"><?=$imoveltipo['nome']?></option>
                                                                <label for="<?=$imoveltipo['nome']?>" class="col-form-label"><?=$imoveltipo['nome']?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Tipo de Negócio:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='negociotipo'>
                                                                <?php foreach($negociotipos as $negociotipo):?>
                                                                <option value="<?=$negociotipo['id']?>" <?= $negociotipo['id'] == $imovelNegociostipos['negociotipo_id']?  'selected="selected"': '' ?> id="<?=$negociotipo['nome']?>"><?=$negociotipo['nome']?></option>
                                                                <label for="<?=$negociotipo['nome']?>" class="col-form-label"><?=$negociotipo['nome']?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Caracteristicas inclusas:</h4>
                                                            <div class="form-group">
                                                            
                                                                <?php foreach($caracteristicas as $caracteristica):?>
                                                                <?php $nomePost = str_replace(' ', '_', $caracteristica['nome']); ?>
                                                                <input type="checkbox" name="caracteristicas[]" id="<?=$nomePost?>" value="<?=$caracteristica['id']?>" <?= in_array($caracteristica['id'], $arrImoveltipos) ? ' checked="checked"' : '' ?>>
                                                                <label for="<?=$nomePost?>" class="col-form-label"><?=$caracteristica['nome']?></label>
                                                                <br> 
                                                                <?php endforeach;?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="col-form-label">Valor</label>
                                                                <input class="form-control" required type="number" name="valor" value="<?= $imovelNegociostipos['valor']?>">
                                                            </div>
                                                            <label for="example-text-input" class="col-form-label">Midias</label>

                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input required multiple type="file" name="arquivo[]">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button class="btn btn-inverse-warning" type="submit"><i class="bi bi-pencil-square mr-1 mr-1"></i>Editar</button>
                                            </div>
                                        </div>
                                    <?=$this->Form->end()?>
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
    
<!-- <script>
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
</script> -->
