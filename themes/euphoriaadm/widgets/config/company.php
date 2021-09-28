<?php

$v->layout("_admin");
$v->start("styles"); ?>
<link rel="stylesheet" type="text/css" href="<?= theme("/assets/css/widgets/modules-widgets.css", CONF_VIEW_ADMIN); ?>">
<link rel="stylesheet" href="<?= url("/shared/scripts/plugins/notification/snackbar/snackbar.min.css"); ?>" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=url("shared/scripts/plugins/dropify/dropify.min.css");?>">
<link href="<?= theme("assets/css/users/account-setting.css", CONF_VIEW_ADMIN);?>" rel="stylesheet" type="text/css" />
<link href="<?= theme("assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>" rel="stylesheet" type="text/css"/>
<?php $v->end(); ?>
<!--  BEGIN CONTENT AREA  -->

<div class="account-settings-container layout-top-spacing">
    <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <?php if (isset($company)): ?>
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/company/{$company->id}"); ?>" method="post">
                            <input type="hidden" name="action" value="update"/>
                            <input type="hidden" name="user_id" value="<?=$company->id;?>"/>
                            <div class="info">
                                <h6 class="">Dados Institucionais</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="name"><strong>Nome:</strong></label>
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?=$company->name;?>" aria-label="Nome">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="email"><strong>E-mail:</strong></label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="<?=$company->email;?>"  aria-label="E-mail">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="celular"><strong>Celular:</strong></label>
                                                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular"  value="<?=$company->celular;?>" aria-label="Celular">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="states_id"><strong>Estado:</strong></label>
                                                            <i class="flaticon-fill-area"></i>
                                                            <select class="form-control" id="states_id">
                                                                <option>Escolha o estado...</option>
                                                                <?php
                                                                foreach($states as $state):
                                                                    $selected = ($state->id == $company->states_id ? 'selected': '');
                                                                    echo "<option value='{$state->id}' {$selected} >{$state->name}</option>";
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="cities_id"><strong>Cidade:</strong></label>
                                                            <i class="flaticon-fill-area"></i>
                                                            <select class="form-control" id="cities_id" name="cities_id">
                                                                <option>Escolha a cidade...</option>
                                                                <?php
                                                                foreach($cities as $city):
                                                                    $selected = ($city->id == $company->cities_id ? 'selected': '');
                                                                    echo "<option value='{$city->id}' {$selected} >{$city->name}</option>";
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="address"><strong>Endereço completo:</strong></label>
                                                                <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" value="<?=$company->address;?>" aria-label="Endereço">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12 text-right mb-5">
                                                        <button id="save" class="btn btn-primary">Atualizar Instituição</button>
                                                        <a href="javascript:history.back()" class="btn btn-primary ml-2">Cancelar</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php else: ?>
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/company"); ?>" method="post">
                            <input type="hidden" name="action" value="create"/>
                            <div class="info">
                                <h6 class="">Dados Institucionais</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="name"><strong>Nome:</strong></label>
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome"  aria-label="Nome">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="email"><strong>E-mail:</strong></label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail"  aria-label="E-mail">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="celular"><strong>Celular:</strong></label>
                                                                <input type="text" class="form-control" id="celular" name="celular" placeholder="Celular"  aria-label="Celular">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="states_id"><strong>Estado:</strong></label>
                                                            <i class="flaticon-fill-area"></i>
                                                            <select class="form-control" id="states_id" >
                                                                <option>Escolha o estado...</option>
                                                                <?php
                                                                foreach($states as $state):
                                                                    echo "<option value='{$state->id}'>{$state->name}</option>";
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="cities_id"><strong>Cidade:</strong></label>
                                                            <i class="flaticon-fill-area"></i>
                                                            <select class="form-control" id="cities_id" name="cities_id">
                                                                <option>Primeiro escolha o estado...</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="address"><strong>Endereço completo:</strong></label>
                                                                <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" aria-label="Endereço">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12 text-right mb-5">
                                                        <button id="save" class="btn btn-primary">Criar Instituição</button>
                                                        <a href="javascript:history.back()" class="btn btn-primary ml-2">Cancelar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    <?php endif;?>
                </div>

            </div>
        </div>
    </div>

</div>
<!--  END CONTENT AREA  -->
<?php $v->start("scripts");?>
<script src="<?=url("shared/scripts/plugins/dropify/dropify.min.js");?>"></script>
<script src="<?=url("shared/scripts/plugins/blockui/jquery.blockUI.min.js");?>"></script>
<script src="<?=theme("assets/js/users/account-settings.js", CONF_VIEW_ADMIN);?>"></script>
<script src="<?= url("shared/scripts/plugins/notification/snackbar/snackbar.min.js"); ?>"></script>
<script>
    //Array de Categoria em JSON puro
    var categorias = [
        <?php
        $sep = "";
        foreach ($states as $state) {
            echo $sep."{'id':'".$state->id."', 'name':'".$state->name."'}";
            $sep =",";
        }?>
    ];
    //Array de Subcategoria em JSON puro
    var subCategorias = [
        <?php
        $sep = "";
        foreach ($cities as $city) {
            echo $sep."{'id':'".$city->id."', 'name':'".$city->name."', 'uf':'".$city->uf."'}";
            $sep =",";
        }?>
    ];

    $(document).ready(function () {

        //Vai ser acionado cada vez que o combo1 tracar de item selecionado
        $("#states_id").change(function () {
            //Pegando o novo valor selecionado no combo
            var categoria = $(this).val()
            carregaCombo2(categoria);
        })

    });

    function carregaCombo2(categoria) {
        //Fazer um filtro dentro do array de categorias com base no Id da Categoria selecionada no combo1
        var subCategoriasFiltradas = $.grep(subCategorias, function (e) { return e.uf == categoria; });
        //Faz o append (adiciona) cada um dos itens do array filtrado no combo2
        $("#cities_id").html('<option>Escolha a cidade</option>');
        $.each(subCategoriasFiltradas, function (i, subcategoria) {
            $("#cities_id").append($('<option>', {
                value: subcategoria.id, //Id do objeto subcategoria
                text: subcategoria.name //Nome da Subcategoria
            }))
        })
    }
</script>
<?php $v->end();?>
