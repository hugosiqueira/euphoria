<?php

use Source\Models\Permissions\UserPermission;

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
                        <?php if (isset($user)): ?>
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/user/{$user->id}"); ?>" method="post">
                            <input type="hidden" name="action" value="update"/>
                            <input type="hidden" name="user_id" value="<?=$user->id;?>"/>

                            <div class="info">
                                <h6 class="">Dados Pessoais</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <?php
                                                    $photo = $user->photo;
                                                    $userPhoto = ($photo ? image($photo, 300, 300) : theme("/assets/img/avatar.jpg", CONF_VIEW_ADMIN));
                                                    ?>
                                                    <input type="file" id="input-file-max-fs" class="dropify" name="photo" data-default-file="<?=$userPhoto;?>" data-max-file-size="2M" />
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="first_name"><strong>Nome:</strong></label>
                                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Nome" value="<?=$user->first_name;?>" aria-label="Nome">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="first_name"><strong>Sobrenome:</strong></label>
                                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Sobrenome" value="<?=$user->last_name;?>" aria-label="Sobrenome">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="role"><strong>Cargo:</strong></label>
                                                            <i class="flaticon-fill-area"></i>
                                                            <select class="form-control" id="roles_id" name="roles_id">
                                                                <option>Escolha o cargo...</option>
                                                                <?php
                                                                foreach($roles as $role):
                                                                    $selected = ($role->id == $user->roles_id ? 'selected': '');
                                                                    echo "<option data-occupation='{$role->id}' value='{$role->id}' {$selected} >{$role->name}</option>";
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="role"><strong>Celular:</strong></label>
                                                                <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Celular" value="<?=$user->cellphone;?>" aria-label="Sobrenome">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="email"><strong>E-mail</strong></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon5">@</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?=$user->email;?>" aria-label="E-mail">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="password"><strong>Senha</strong></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                                                    </div>
                                                                    <input type="password" class="form-control" id="password" name="password" placeholder="********" aria-label="Senha">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="form-group">
                                                                <label for="password"><strong>Confirmar Senha</strong></label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                                                    </div>
                                                                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" onblur="validatePassword();" placeholder="********" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 text-right mb-5">
                                                        <button id="save" class="btn btn-primary">Atualizar Usuário</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php else: ?>
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/user/"); ?>" method="post">
                            <input type="hidden" name="action" value="create"/>
                            <div class="info">
                                <h6 class="">Dados Pessoais</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-12 col-md-4">
                                                <div class="upload mt-4 pr-md-4">
                                                    <input type="file" id="input-file-max-fs" class="dropify" name="photo" data-default-file="<?=theme("/assets/img/avatar.jpg", CONF_VIEW_ADMIN);?>" data-max-file-size="2M" />
                                                </div>
                                            </div>
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="first_name"><strong>Nome:</strong></label>
                                                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Digite o nome" aria-label="Primeiro Nome">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="last_name"><strong>Sobrenome:</strong></label>
                                                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Digite o sobrenome" aria-label="Sobrenome">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <label for="roles_id"><strong>Cargo:</strong></label>
                                                            <i class="flaticon-fill-area"></i>
                                                            <select class="form-control" id="roles_id" name="roles_id">
                                                                <option>Escolha o cargo...</option>
                                                                <?php
                                                                foreach($roles as $role):
                                                                    echo "<option data-occupation='{$role->id}' value='{$role->id}'>{$role->name}</option>";
                                                                endforeach;
                                                                ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="cellphone"><strong>Celular:</strong></label>
                                                                <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="Digite o celular" aria-label="Celular">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="email">E-mail</label>
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <span class="input-group-text" id="basic-addon5">@</span>
                                                                    </div>
                                                                    <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" aria-label="E-mail">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="password">Senha</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                                                </div>
                                                                <input type="password" class="form-control" id="password" name="password" placeholder="********" aria-label="Senha">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <label for="password">Confirmar Senha</label>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon5"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span>
                                                                </div>
                                                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" onblur="validatePassword();" placeholder="********" >
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 text-right mb-5">
                                                        <button id="save" class="btn btn-primary">Criar Usuário</button>
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
        <?php
        if(isset($user)):
        ?>
        <div class="account-content">
            <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                        <form id="permission-users" class="section general-info" action="<?= url("/admin/config/user/{$user->id}"); ?>" method="post">
                            <input type="hidden" name="action"  value="user_permission">
                            <input type="hidden" name="users_id"  value="<?=$user->id;?>">

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

                            foreach ($userPermission as $permission):
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
        <?php endif;?>
    </div>
<!--  END CONTENT AREA  -->
<?php $v->start("scripts");?>
<script src="<?=url("shared/scripts/plugins/dropify/dropify.min.js");?>"></script>
<script src="<?=url("shared/scripts/plugins/blockui/jquery.blockUI.min.js");?>"></script>
<script src="<?=theme("assets/js/users/account-settings.js", CONF_VIEW_ADMIN);?>"></script>
<script src="<?= url("shared/scripts/plugins/notification/snackbar/snackbar.min.js"); ?>"></script>
<script>
    $('#cellphone').mask('(00) 0000-00009');
</script>
<?php $v->end();?>
