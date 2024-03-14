<?php 
    use App\Model\Table\ImoveisTable;
    use App\Model\Table\ImoveltiposTable;
    use App\Model\Table\NegociotiposTable;

    $negociotipos = new NegociotiposTable();
    $negociotipos = $negociotipos->find('all');
    // if($request->getQuery('nome_completo')){
    //     $query->where(['nome_completo like'=>'%'.$request->getQuery('nome_completo').'%']);
    // }

    $imoveltipos = new ImoveltiposTable();
    $imoveltipos = $imoveltipos->find('all');

    $estados = new ImoveisTable();
    $estados = $estados->find();
    $estados->select(['estado'])->distinct();

?>
    <!--Search Section start-->
    <div class="search-section section pt-0 pt-sm-60 pt-xs-50 ">
        <div class="container">
            
            <!--Section Title start-->
            <div class="row d-flex d-lg-none">
                <div class="col-md-12 mb-60 mb-xs-30">
                    <div class="section-title center">
                        <h1>Find Your Home</h1>
                    </div>
                </div>
            </div>
            <!--Section Title end-->
            
            <div class="row">
                <div class="col-12">

                    <!--Hero Search start-->
                    <div class="hero-search">

                        <form method="GET">

                            <div>
                                <h4>Pretensão</h4>
                                <select class="nice-select" name="pretensao">
                                <option value="">Todos</option>
                                <?php foreach($negociotipos as $tipo): ?>
                                        <option value="<?= $tipo['nome'] ?>"><?= $tipo['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <h4>Tipo</h4>
                                <select class="nice-select" name="tipo">
                                    <option value="">Todos</option>
                                    <?php foreach($imoveltipos as $tipo): ?>
                                        <option value="<?= $tipo['nome'] ?>"><?= $tipo['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div>
                                <h4>Estado</h4>
                                <select class="nice-select" name="estado">
                                <option value="">Todos</option>
                                    <?php foreach($estados as $estado): ?>
                                    <option value="<?= $estado['estado'] ?>"><?= $estado['estado'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- <div>
                            <div class="d-flex flex-column justify-content-between gap-3">
                            <h4>Pesquisar</h4>

                            <div class="form-outline" data-mdb-input-init>
                                <input id="search-input" type="search" id="form1" class="" placeholder="Digite região, bairro, cidade etc." />
                            </div>
                            </div>
                            </div> -->


                            <div>
                            <h4>Buscar</h4>
                                <div class="submit">
                                    <button>Clique aqui</button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!--Hero Search end-->

                </div>
            </div>
            
        </div>
    </div>
    <!--Search Section end-->