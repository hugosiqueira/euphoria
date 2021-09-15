<?php
$v->layout("_admin");
$v->start("styles");
?>
<link href="<?= theme("assets/css/components/cards/card.css", CONF_VIEW_ADMIN);?>"  rel="stylesheet" type="text/css" />
<?php $v->end();?>
<!--  BEGIN CONTENT AREA  -->
<div class="row">
    <div id="card_1" class="col-lg-4">
        <div class="statbox box box-shadow">
            <a href="<?=url('admin/config/users');?>">
                <div class="card component-card_1">
                    <div class="card-body text-center">
                        <div class="icon-svg">
                            <i data-feather="users"></i>
                        </div>
                        <h5 class="card-title text-center">Usuários</h5>
                        <p class="card-text">Adicionar e gerenciar os usuários do sistema.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="card_1" class="col-lg-4">
        <div class="statbox box box-shadow">
            <a href="<?=url('admin/config/schools');?>">
                <div class="card component-card_1">
                    <div class="card-body text-center">
                        <div class="icon-svg">
                            <i data-feather="home"></i>
                        </div>
                        <h5 class="card-title text-center">Instituições</h5>
                        <p class="card-text">Adicionar e gerenciar as instituições escolares.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="card_1" class="col-lg-4">
        <div class="statbox box box-shadow">
            <a href="<?=url('admin/config/companies');?>">
                <div class="card component-card_1">
                    <div class="card-body text-center">
                        <div class="icon-svg">
                            <i data-feather="shopping-cart"></i>
                        </div>
                        <h5 class="card-title text-center">Fornecedores</h5>
                        <p class="card-text">Adicionar e gerenciar os fornecedores.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row mt-5">
    <div id="card_1" class="col-lg-4">
        <div class="statbox box box-shadow">
            <a href="<?=url('admin/config/courses');?>">
                <div class="card component-card_1">
                    <div class="card-body text-center">
                        <div class="icon-svg">
                            <i data-feather="book-open"></i>
                        </div>
                        <h5 class="card-title text-center">Cursos</h5>
                        <p class="card-text">Adicionar e gerenciar os cursos das instituições.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="card_1" class="col-lg-4">
        <div class="statbox box box-shadow">
            <a href="<?=url('admin/config/roles');?>">
                <div class="card component-card_1">
                    <div class="card-body text-center">
                        <div class="icon-svg">
                            <i data-feather="bookmark"></i>
                        </div>
                        <h5 class="card-title text-center">Cargos/Funções</h5>
                        <p class="card-text">Adicionar e gerenciar os cargos da Euphoria.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div id="card_1" class="col-lg-4">
        <div class="statbox box box-shadow">
            <a href="<?=url('admin/config/events');?>">
                <div class="card component-card_1">
                    <div class="card-body text-center">
                        <div class="icon-svg">
                            <i data-feather="star"></i>
                        </div>
                        <h5 class="card-title text-center">Eventos</h5>
                        <p class="card-text">Adicionar e gerenciar os tipos de eventos dos pacotes.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
