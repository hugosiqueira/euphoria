<?php $v->layout("_admin"); ?>
<?= $v->start("styles"); ?>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/datatables.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>">
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/dt-global_style.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/apps/invoice-list.css", CONF_VIEW_ADMIN);?>"  />
<!-- END PAGE LEVEL CUSTOM STYLES -->
<?= $v->end(); ?>
<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="header-wrapper">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h4 class="">Permissões nos Módulos</h4>
                    <p class="">Defina as permissões de cada cargo em cada módulo </p>
                </div>
            </div>
        </div>
        <?php if (!isset($permissions)): ?>

            <div class="alert alert-light-primary border-0 mb-4" role="alert">
                <strong>Oops!</strong> Ainda não existem permissões cadastradas. Clique aqui se deseja cadastrar uma agora!
            </div>
        <?php else: ?>

        <div class="widget-content widget-content-area br-6">
            <table id="invoice-list" class="table table-hover" style="width:100%">
                <thead>
                <tr>
                    <th></th>
                    <th>Módulo</th>
                    <?php foreach ($roles as $role): ?>
                    <th><?=$role->name;?></th>
                    <?php endforeach;?>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($permissions as $permission):?>
                <tr>
                    <td></td>
                    <td><?=$permission->widget;?></td>
                    <?php
                    $roles_permissions = (new \Source\Models\Permissions\Permission())->findByWidget(intval($permission->widgets_id));
                    foreach($roles_permissions as $rp):?>
                        <td><?=($rp->can_view ? "/Ver/" : "Sem Acesso") . ($rp->can_add ? "Criar/" : ""). ($rp->can_edit ? "Editar/" : ""). ($rp->can_delete ? "Excluir/" : "");?></td>
                    <?php endforeach;
                    ?>
                    <td>
                        <a class="" href="apps_invoice-edit.html"><i data-feather="edit-2"></i></a>
                    </td>
                </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>

</div>

<?= $v->start("scripts"); ?>
<script src="<?= url('shared/scripts/plugins/table/datatable/datatables.js');?>"></script>
<script src="<?= url('shared/scripts/plugins/table/datatable/button-ext/dataTables.buttons.min.js');?>"></script>
<script src="<?= theme('assets/js/apps/invoice-list.js', CONF_VIEW_ADMIN);?>"></script>
<?= $v->end(); ?>
