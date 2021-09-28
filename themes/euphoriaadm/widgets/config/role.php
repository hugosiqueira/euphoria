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
                    <?php if (isset($role)): ?>
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/role/{$role->id}"); ?>" method="post">
                            <input type="hidden" name="action" value="update"/>
                            <input type="hidden" name="user_id" value="<?=$role->id;?>"/>
                            <div class="info">
                                <h6 class="">Cargo</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="name"><strong>Nome:</strong></label>
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?=$role->name;?>" aria-label="Nome">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12 text-right mb-5">
                                                        <button id="save" class="btn btn-primary">Atualizar Cargo</button>
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
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/role"); ?>" method="post">
                            <input type="hidden" name="action" value="create"/>
                            <div class="info">
                                <h6 class="">Cargo</h6>
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
                                                        <div class="col-md-12 text-right mb-5">
                                                            <button id="save" class="btn btn-primary">Criar Cargo</button>
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
    <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <form id="permission-roles" class="section general-info" action="<?= url("/admin/config/role/{$role->id}"); ?>" method="post">
                        <input type="hidden" name="action"  value="role_permission">
                        <input type="hidden" name="roles_id"  value="<?=$role->id;?>">

                        <div class="info">
                            <h6>Permissões de Acesso aos Módulos</h6>
                            <table class="table table-hover " style="width:100%">
                                <thead>
                                <th>Módulo</th>
                                <th>Visualizar</th>
                                <th>Adicionar</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                                </thead>
                                <tbody>

                                <?php

                                foreach ($rolePermission as $permission):
                                    $nameWidget = (new \Source\Models\Widget())->findById($permission->widgets_id);
                                    $can_view = ($permission->can_view ? "checked='checked'" : null);
                                    $can_add = ($permission->can_add ? "checked='checked'" : null);
                                    $can_edit = ($permission->can_edit ? "checked='checked'" : null);
                                    $can_delete = ($permission->can_delete ? "checked='checked'" : null);
                                    ?>
                                    <tr>
                                        <td><?=$nameWidget->name;?></td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="permission-<?=$permission->widgets_id;?>[]" value ="can_view" <?=$can_view;?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="permission-<?=$permission->widgets_id;?>[]" value ="can_add" <?=$can_add;?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="permission-<?=$permission->widgets_id;?>[]" value ="can_edit" <?=$can_edit;?>">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" name="permission-<?=$permission->widgets_id;?>[]" value ="can_delete" <?=$can_delete;?>">
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                endforeach;
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-right mb-5">
                            <button class="btn btn-primary">Atualizar Permissões</button>
                        </div>
                    </form>
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

<?php $v->end();?>
