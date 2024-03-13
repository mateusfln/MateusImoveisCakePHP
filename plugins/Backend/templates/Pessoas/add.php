
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
                                <p class="text-muted mb-0 mr-1 hover-cursor">Pessoas</p>
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
                                <?= $this->Form->create(null, ['type' => 'post']) ?>
                                        <h4 class="card_title">Cadastro de Pessoas</h4>
                                        <div class="form-group">
                                        <?= $this->Form->control('nome', ['label' => 'Nome', 'type' => 'text', 'required' => true, 'class' => 'form-control']) ?>
                                        </div>
                                        <div class="form-group">
                                        <?= $this->Form->control('cpf', ['label' => 'Cpf', 'type' => 'text', 'required' => true, 'class' => 'form-control']) ?>

                                        </div>
                                        <div class="form-group">
                                        <?= $this->Form->control('login', ['label' => 'Login', 'type' => 'text', 'required' => true, 'class' => 'form-control']) ?>

                                        </div>
                                        <div class="form-group">
                                        <?= $this->Form->control('senha', ['label' => 'Senha', 'type' => 'text', 'required' => true, 'class' => 'form-control']) ?>

                                        </div>
                                        <div class="form-group">
                                        <button class="btn btn-inverse-success" type="submit"><i class="bi bi-plus-lg mr-1"></i>Adicionar</button>
                                        </div>
                                        <?= $this->Form->end() ?>
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