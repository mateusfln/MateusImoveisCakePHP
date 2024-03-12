
$campos = array(
    'Identificacao',
    'Matricula',
    'inscricaoImobiliaria',
    'logradouro',
    'NumeroLogradouro',
    'Rua',
    'Complemento',
    'Bairro',
    'Cidade',
    'Estado',
    'Cep',
    'Ibge',
    'metrosQuadrados',
    'Quartos',
    'Banheiros',
    'Garagem');

?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">
<?php require_once(realpath(dirname(__FILE__) . '/../../includes') .'/head.php');?>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<!--=========================*
         Page Container
*===========================-->
<div id="page-container">

<?php require_once(realpath(dirname(__FILE__) . '/../../includes') .'/headerSection.php');?>
<?php require_once(realpath(dirname(__FILE__) . '/../../../../includes/admin') .'/sidebarMenu.php');?>


    <!--==================================*
               Main Content Section
    *====================================-->
    <div class="main-content page-content">

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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Create</p>
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
                                    <form enctype="multipart/form-data" method="POST">
                                        <div class="card">
                                        <div class="col-12 d-flex">
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Cadastro de Imóveis</h4>
                                                            <?php foreach ($campos as $campo):?>

                                                                <?php if ($campo == 'Estado'):?>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label"><?=$campo?></label>
                                                                    <select class="form-control" required name="<?=$campo?>">
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
                                                                <?php elseif ($campo == 'Quartos' || $campo == 'Banheiros' || $campo == 'Garagem'):?>
                                                                <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label"><?=$campo?></label> 
                                                                    <select class="form-control" name="<?=$campo?>">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3">3</option>
                                                                    <option value="4">4</option>
                                                                    <option value="5">5</option>
                                                                    </select>
                                                                </div>
                                                                <?php else:?>
                                                                    <div class="form-group">
                                                                    <label for="example-text-input" class="col-form-label"><?=$campo?></label>
                                                                    <input class="form-control" required type="text"name="<?=$campo?>">
                                                                </div>
                                                                <?php endif;?>
                                                                
                                                            <?php endforeach;?>
                                                    </div>
                                                </div>
                                                <div class="col-6 card">
                                                    <div class="card-body">
                                                            <h4 class="card_title">Tipo do Imóvel:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='imoveltipo' id='imoveltipo'>
                                                                <?php foreach($imoveltipos as $imoveltipo):?>
                                                                <option value="<?=$imoveltipo->getId()?>" id="<?=$imoveltipo->getNome()?>"><?=$imoveltipo->getNome()?></option>
                                                                <label for="<?=$imoveltipo->getNome()?>" class="col-form-label"><?=$imoveltipo->getNome()?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Tipo de Negócio:</h4>
                                                            <div class="form-group">
                                                            <select class="form-control" name='negociotipo'>
                                                                <?php foreach($negociotipos as $negociotipo):?>
                                                                <option value="<?=$negociotipo->getId()?>" id="<?=$negociotipo->getNome()?>"><?=$negociotipo->getNome()?></option>
                                                                <label for="<?=$negociotipo->getNome()?>" class="col-form-label"><?=$negociotipo->getNome()?></label>
                                                                <?php endforeach;?>
                                                                </select>
                                                            </div>
                                                            <h4 class="card_title">Caracteristicas inclusas:</h4>
                                                            <div class="form-group">
                                                                <?php foreach($caracteristicas as $caracteristica):?>
                                                                <div>
                                                                <input type="checkbox" name="caracteristicas[]" id="<?=$caracteristica->getId()?>" value="<?=$caracteristica->getId()?>">
                                                                <label for="<?=$caracteristica->getNome()?>" class="col-form-label"><?=$caracteristica->getNome()?></label>
                                                                <br>
                                                                </div>
                                                                <?php endforeach;?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="example-text-input" class="col-form-label">Valor</label>
                                                                <input class="form-control" required type="number" name="valor">
                                                            </div>
                                                            <label for="example-text-input" class="col-form-label">Midias</label>

                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input multiple type="file" name="arquivo[]">
                                                                </div>
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
    </div>
    <!--=================================*
           End Main Content Section
    *===================================-->

    <!--=================================*
                  Footer Section
    *===================================-->
    <footer>
        <div class="footer-area">
            <p>&copy; Copyright <?= date("Y"); ?>. All right reserved. Template by Mateusfln.</p>
        </div>
    </footer>
    <!--=================================*
                End Footer Section
    *===================================-->

</div>
<?php require_once(realpath(dirname(__FILE__) . '/../../includes') .'/scripts.php');?>

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
                console.log('entrou no if');

            } else {
                console.log('entrou no else');
                
                $(this).parent().hide();
            }
        });
    });

    $('#imoveltipo').trigger('change');
</script>
</body>
</html>

