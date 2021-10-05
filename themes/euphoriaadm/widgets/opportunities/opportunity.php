<?php $v->layout("_admin"); ?>
<?php $v->start("styles");?>
<!--  BEGIN CUSTOM STYLE FILE  -->
<link href="<?=theme('assets/css/apps/invoice-add.css', CONF_VIEW_ADMIN);?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=theme('assets/css/forms/theme-checkbox-radio.css', CONF_VIEW_ADMIN);?>">
<!--  END CUSTOM STYLE FILE  -->
<?= $v->end(); ?>
<div class="row invoice layout-top-spacing layout-spacing">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

        <?php
        if (!$opportunity):
        ?>
        <form action="<?= url("/admin/opportunities/opportunity"); ?>" method="post">
            <input type="hidden" name="action" value="create"/>
            <input type="hidden" name="consult_users_id" value="<?= user()->id;?>"/>

            <div class="doc-container">

            <div class="row">
                <div class="col-xl-9">

                    <div class="invoice-content">

                        <div class="invoice-detail-body">

                            <div class="invoice-detail-title">

                                <div class="form-group mb-4 row">
                                    <label for="opportunity_name">Oportunidade</label>
                                    <input type="text" class="form-control" id="opportunity_name"  name="opportunity_name" placeholder="Nome da Oportunidade">
                                </div>
                                <div class="form-group">
                                    <label for="consultant"><strong>Consultor:</strong> <?= user()->fullName(); ?></label>
                                </div>

                            </div>

                            <div class="invoice-detail-header">

                                <div class="row justify-content-between">
                                    <div class="col-xl-6 invoice-address-company">

                                        <h4>Oportunidade:</h4>

                                        <div class="invoice-address-company-fields">

                                            <div class="form-group row">
                                                <label for="supervisor" class="col-sm-4 col-form-label col-form-label-sm">Supervisor</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="school_id" name="supervisor_users_id">
                                                        <option>Selecione o supervisor...</option>
                                                        <?php
                                                        foreach($supervisors as $supervisor):
                                                            $selected = ($supervisor->id == $opportunity->supervisor_users_id ? 'selected': '');
                                                            echo "<option value='{$supervisor->id}' {$selected} >{$supervisor->fullName()}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="president_name" class="col-sm-4 col-form-label col-form-label-sm">Presidente</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="president_name" name="president_name" placeholder="Nome do Presidente">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="president_email" class="col-sm-4 col-form-label col-form-label-sm">E-mail</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="president_email" name="president_email" placeholder="nome@email.com.br">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="president_cellphone" class="col-sm-4 col-form-label col-form-label-sm">Celular</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm mask-tel" id="president_cellphone" name="president_cellphone" placeholder="(31) 99999-9999">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="school_id" class="col-sm-4 col-form-label col-form-label-sm">Universidade</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="school_id" name="school_id">
                                                        <option>Escolha a Instituição...</option>
                                                        <?php
                                                        foreach($schools as $school):
                                                            $selected = ($school->id == $opportunity->school_id ? 'selected': '');
                                                            echo "<option value='{$school->id}' {$selected} >{$school->name}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="course_id" class="col-sm-4 col-form-label col-form-label-sm">Curso</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="course_id" name="course_id">
                                                        <option>Escolha o Curso...</option>
                                                        <?php
                                                        foreach($courses as $course):
                                                            $selected = ($course->id == $opportunity->course_id ? 'selected': '');
                                                            echo "<option value='{$course->id}' {$selected} >{$course->name}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-6 invoice-address-client">
                                        <div class="invoice-address-client-fields">
                                            <div class="form-group row">
                                                <label for="cities_id" class="col-sm-4 col-form-label col-form-label-sm">Cidade</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="cities_id" name="cities_id">
                                                        <option>Escolha a cidade...</option>
                                                        <?php
                                                        foreach($cities as $city):
                                                            $selected = ($city->id == $school->cities_id ? 'selected': '');
                                                            echo "<option value='{$city->id}' {$selected} >{$city->name}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="conclusion_year" class="col-sm-4 col-form-label col-form-label-sm">Ano de Formação</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min='2021' max="2100" class="form-control form-control-sm" id="conclusion_year" name="conclusion_year" placeholder="Ano">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="conclusion_semester" class="col-sm-4 col-form-label col-form-label-sm">Semestre</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="conclusion_semester" name="conclusion_semester">
                                                        <option>Selecione o semestre...</option>
                                                        <option value="1">1º Semestre</option>
                                                        <option value="2">2º Semestre</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="party_preview" class="col-sm-4 col-form-label col-form-label-sm">Previsão de Baile</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm mask-month" id="party_preview" name="party_preview" placeholder="mês/ano">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="number_students" class="col-sm-4 col-form-label col-form-label-sm">Alunos na Turma</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-sm" id="number_students" name="number_students" placeholder="Número de Alunos">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="number_graduates" class="col-sm-4 col-form-label col-form-label-sm">Formandos</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-sm" id="number_graduates" name="number_graduates" placeholder="Número de Formandos">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="package" class="col-sm-4 col-form-label col-form-label-sm">Pacote Base</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-sm" id="package" name="package" placeholder="Número do Pacote">
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                </div>

                            </div>

                            <div class="invoice-detail-terms">
                                <div class="row justify-content-center mb-4">
                                    <h5>Eventos</h5>
                                </div>

                                <div class="row">

                                    <?php
                                    if(!$events):
                                    ?>
                                    <div>Não existem eventos cadastrados.</div>
                                    <?php
                                    else:
                                        foreach ($events as $event):

                                    ?>

                                    <div class="col-md-3">
                                        <div class="n-chk">
                                            <label class="new-control new-checkbox checkbox-outline-default">
                                                <input type="checkbox" name='events[]' value="<?=$event->id;?>" class="new-control-input">
                                                <span class="new-control-indicator"></span><?=$event->name;?>
                                            </label>
                                        </div>
                                    </div>

                                   <?php endforeach; endif;?>

                                </div>

                            </div>


                            <div class="invoice-detail-note">

                                <div class="row">

                                    <div class="col-md-12 align-self-center">

                                        <div class="form-group row invoice-note">
                                            <label for="obs" class="col-sm-12 col-form-label col-form-label-sm">Observação:</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" id="obs" name="obs" placeholder='Caso tenha alguma observação sobre a oportunidade.' style="height: 88px;"></textarea>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

                <div class="col-xl-3">
                    <div class="invoice-actions">
                        <div class="invoice-action-currency">
                            <div class="form-group mb-0">
                                <label for="project_parent">Projeto Base</label>
                                <div class="col-sm-10 ml-4">
                                    <select class="form-control form-control-sm" id="project_parent" name="project_parent">
                                        <option>Selecione o projeto base...</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-action-tax">
                            <h5>Situação</h5>
                            <div class="invoice-action-tax-fields">
                                <div class="form-group mb-0">
                                    <div class="col-sm-10 ml-4">
                                        <select class="form-control form-control-sm" id="status" name="status">
                                            <option>Selecione a situação...</option>
                                            <option value="0">Em andamento</option>
                                            <option value="1">Ganha</option>
                                            <option value="2">Perdida</option>
                                            <option value="3">Cancelada</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="invoice-actions-btn">
                        <div class="invoice-action-btn">
                            <div class="row">
                                <div class="col-xl-12 col-md-4">
                                    <button id="save" class="btn btn-primary btn-send px-4 mb-3">Criar Oportunidade</button>
                                </div>
                                <div class="col-xl-12 col-md-4">
                                    <a href="javascript:void(0);" class="btn btn-dark btn-preview">Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>


        <?php
        else :
        ?>

    <form action="<?= url("/admin/opportunities/opportunity"); ?>" method="post">
        <input type="hidden" name="action" value="update"/>
        <input type="hidden" name="consult_users_id" value="<?= user()->id;?>"/>
        <div class="doc-container">

            <div class="row">
                <div class="col-xl-12">

                    <div class="invoice-content">

                        <div class="invoice-detail-body">

                            <div class="invoice-detail-title">

                                <div class="form-group mb-4 row">
                                    <label for="opportunity_name">Oportunidade</label>
                                    <input type="text" class="form-control" id="opportunity_name"  name="opportunity_name" placeholder="Nome da Oportunidade" value="<?=$opportunity->name;?>">
                                </div>
                                <div class="form-group">
                                    <label for="consultant"><strong>Consultor:</strong> <?= user()->fullName(); ?></label>
                                </div>


                            </div>

                            <div class="invoice-detail-header">

                                <div class="row justify-content-between">
                                    <div class="col-xl-6 invoice-address-company">

                                        <h4>Oportunidade:</h4>

                                        <div class="invoice-address-company-fields">
                                            <div class="form-group row">
                                                <label for="supervisor" class="col-sm-4 col-form-label col-form-label-sm">Supervisor</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="supervisor_users_id" name="supervisor_users_id">
                                                        <option>Selecione o supervisor...</option>
                                                        <?php
                                                        foreach($supervisors as $supervisor):
                                                            $selected = ($supervisor->id == $opportunity->supervisor_users_id ? 'selected': '');
                                                            echo "<option value='{$supervisor->id}' {$selected} >{$supervisor->first_name}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="president_name" class="col-sm-4 col-form-label col-form-label-sm">Presidente</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="president_name" name="president_name" placeholder="Nome do Presidente" value="<?=$class->president_name;?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="president_email" class="col-sm-4 col-form-label col-form-label-sm">E-mail</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm" id="president_email" name="president_email" placeholder="nome@email.com.br" value="<?=$class->president_email;?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="president_cellphone" class="col-sm-4 col-form-label col-form-label-sm">Celular</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm mask-tel" id="president_cellphone" name="president_cellphone" placeholder="(31) 99999-9999" value="<?=$class->president_cellphone;?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="school_id" class="col-sm-4 col-form-label col-form-label-sm">Universidade</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="school_id" name="school_id">
                                                        <option>Escolha a Instituição...</option>
                                                        <?php
                                                        foreach($schools as $school):
                                                            $selected = ($school->id == $class->school_id ? 'selected': '');
                                                            echo "<option value='{$school->id}' {$selected} >{$school->name}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="course_id" class="col-sm-4 col-form-label col-form-label-sm">Curso</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="course_id" name="course_id">
                                                        <option>Escolha o Curso...</option>
                                                        <?php
                                                        foreach($courses as $course):
                                                            $selected = ($course->id == $class->course_id ? 'selected': '');
                                                            echo "<option value='{$course->id}' {$selected} >{$course->name}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>



                                        </div>

                                    </div>


                                    <div class="col-xl-6 invoice-address-client">

                                        <div class="invoice-address-client-fields">

                                            <div class="form-group row">
                                                <label for="cities_id" class="col-sm-4 col-form-label col-form-label-sm">Cidade</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="cities_id" name="cities_id">
                                                        <option>Escolha a cidade...</option>
                                                        <?php
                                                        foreach($cities as $city):
                                                            $selected = ($city->id == $class->cities_id ? 'selected': '');
                                                            echo "<option value='{$city->id}' {$selected} >{$city->name}</option>";
                                                        endforeach;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="conclusion_year" class="col-sm-4 col-form-label col-form-label-sm">Ano de Formação</label>
                                                <div class="col-sm-8">
                                                    <input type="number" min='2021' max="2100" class="form-control form-control-sm" id="conclusion_year" name="conclusion_year" placeholder="Ano" value="<?=$class->conclusion_year;?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="conclusion_semester" class="col-sm-4 col-form-label col-form-label-sm">Semestre</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="conclusion_semester" name="conclusion_semester">
                                                        <option>Selecione o semestre...</option>
                                                        <option value="1" <?= ($class->conclusion_semester == 1 ? 'selected=selected' : '');?>>1º Semestre</option>
                                                        <option value="2" <?= ($class->conclusion_semester == 2 ? 'selected=selected' : '');?>>2º Semestre</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="party_preview" class="col-sm-4 col-form-label col-form-label-sm">Previsão de Baile</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control form-control-sm mask-month" id="party_preview" name="party_preview" placeholder=""  value="<?= date_fmt($class->party_preview, "m/Y"); ?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="number_students" class="col-sm-4 col-form-label col-form-label-sm">Alunos na Turma</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-sm" id="number_students" name="number_students" placeholder="Número de Alunos"  value="<?=$class->number_students;?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="number_graduates" class="col-sm-4 col-form-label col-form-label-sm">Formandos</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-sm" id="number_graduates" name="number_graduates" placeholder="Número de Formandos"  value="<?=$class->number_graduates;?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="package" class="col-sm-4 col-form-label col-form-label-sm">Pacote Base</label>
                                                <div class="col-sm-8">
                                                    <input type="number" class="form-control form-control-sm" id="package" name="package" placeholder="Número do Pacote"  value="<?=$class->package;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="status" class="col-sm-4 col-form-label col-form-label-sm">Situação</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control form-control-sm" id="status" name="status">
                                                        <option>Selecione a situação...</option>
                                                        <option value="0">Em andamento</option>
                                                        <option value="1">Ganha</option>
                                                        <option value="2">Perdida</option>
                                                        <option value="3">Cancelada</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 align-self-center">

                                        <div class="form-group row invoice-note">
                                            <label for="obs" class="col-sm-12 col-form-label col-form-label-sm">Observação:</label>
                                            <div class="col-sm-12">
                                                <textarea class="form-control" id="obs" name="obs" placeholder='Caso tenha alguma observação sobre a oportunidade.' style="height: 88px;"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="justify-content-center">
                                    <button id="save" class="btn btn-primary btn-send px-4 mb-3">Atualizar Oportunidade</button>
                                </div>

                            </div>

                            <div class="invoice-detail-terms">
                                <div class="row justify-content-center mb-4">
                                    <h5>Projetos</h5>
                                </div>

                                <div class="row">
                                    <table id="invoice-list" class="table table-hover" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th class="checkbox-column"></th>
                                            <th>Cod.</th>
                                            <th>Empresa.</th>
                                            <th>Versão</th>
                                            <th>Criação</th>
                                            <th>Atualização</th>
                                            <th>R$ Total Venda</th>
                                            <th>R$ Custo Venda</th>
                                            <th>MC Venda</th>
                                            <th>MC Venda (R$)</th>
                                            <th>MC Venda (%)</th>
                                            <th>Total Projeto (R$)</th>
                                            <th>Custo Total Projeto</th>
                                            <th>MC Projeto (R$)</th>
                                            <th>MC Projeto (%)</th>
                                            <th>Cidade</th>
                                            <th>Consultor</th>
                                            <th>Supervisor</th>
                                            <th>Time</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                    <?php
                                    if(!$projects):
                                        ?>
                                        <div>Não existem projetos cadastrados.</div>
                                    <?php
                                    else:
                                        foreach ($projects as $project):

                                            switch ($opportunity->status){
                                                case 0:
                                                    $status = "<span class='badge badge-primary'>Em atendimento</span>";
                                                    break;
                                                case 2:
                                                    $status = "<span class='badge badge-danger'>Perdida</span>";
                                                    break;
                                                case 3:
                                                    $status = "<span class='badge badge-warning'>Cancelada</span>";
                                                    break;
                                                case 1:
                                                    $status = "<span class='badge badge-success'>Ganha</span>";
                                                    break;
                                            }
                                            ?>
                                                    <tr>
                                                        <td class="checkbox-column"> </td>
                                                        <td><a href="<?=url("admin/opportunities/opportunity/{$opportunity->id}");?>"><span class="inv-number">#<?=$opportunity->id;?></span></a></td>
                                                        <td><?=$opportunity->name;?></td>
                                                        <td><?=$project->version;?></td>
                                                        <td><span class="inv-date"><?=date_fmt($opportunity->created_at, "d/m/Y");?></span></td>
                                                        <td><span class="inv-date"><?=date_fmt($opportunity->update_at, "d/m/Y");?></span></td>
                                                        <td>R$ 2.000.000,00</td>
                                                        <td>R$ 1.600.000,00</td>
                                                        <td>R$ 400.000,000</td>
                                                        <td>R$ 400.000,000</td>
                                                        <td>20%</td>
                                                        <td>R$ 1.600.000,00</td>
                                                        <td>R$ 1.600.000,00</td>
                                                        <td>R$ 1.600.000,00</td>
                                                        <td>R$ 400.000,000</td>
                                                        <td>20%</td>
                                                        <td>Ouro Preto</td>
                                                        <td>Pedro Gomes</td>
                                                        <td>Time 1</td>
                                                        <td><?=$status;?></td>
                                                        <td class="text-center">
                                                            <ul class="table-controls">
                                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Versionar"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M6 21V9a9 9 0 0 0 9 9"></path></svg></a></li>
                                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Solicitar Aprovação"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3"></path></svg></a></li>
                                                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <th class="checkbox-column"></th>
                                                    <th>Cod.</th>
                                                    <th>Empresa.</th>
                                                    <th>Versão</th>
                                                    <th>Criação</th>
                                                    <th>Atualização</th>
                                                    <th>R$ Total Venda</th>
                                                    <th>R$ Custo Venda</th>
                                                    <th>MC Venda</th>
                                                    <th>MC Venda (R$)</th>
                                                    <th>MC Venda (%)</th>
                                                    <th>Total Projeto (R$)</th>
                                                    <th>Custo Total Projeto</th>
                                                    <th>MC Projeto (R$)</th>
                                                    <th>MC Projeto (%)</th>
                                                    <th>Cidade</th>
                                                    <th>Consultor</th>
                                                    <th>Supervisor</th>
                                                    <th>Time</th>
                                                    <th>Status</th>
                                                    <th></th>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        <?php  endif;?>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
    </form>
</div>

        <?php
        endif;
        ?>
</div>

