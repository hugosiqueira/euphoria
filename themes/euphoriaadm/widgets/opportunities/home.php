<?php $v->layout("_admin"); ?>
<?= $v->start("styles"); ?>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/datatables.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>">
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/dt-global_style.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/apps/invoice-list.css", CONF_VIEW_ADMIN);?>"  />
<!-- END PAGE LEVEL CUSTOM STYLES -->
<style>
    .search {
        background-image: url(<?=theme("assets/img/search.png", CONF_VIEW_ADMIN);?>);
        background-position: 10px center;
        background-repeat: no-repeat;
        border: 1px solid #ccc;

        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;

        padding: 10px 5px 10px 20px;
        text-indent: 20px;

        -webkit-transition: all 0.2s;
        -moz-transition: all 2s;
        transition: all 0.2s;

    }
</style>

<?= $v->end(); ?>
<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <?php if (!$opportunities):?>
            <div class="alert alert-light-primary border-0 mb-4" role="alert">
                <strong>Oops!</strong> Ainda não existem oportunidades cadastradas. Clique aqui se deseja cadastrar uma agora!
            </div>
        <?php else: ?>
        <div class="widget-content widget-content-area br-6">
            <table id="invoice-list" class="table table-hover" style="width:100%">
                <thead>
                <tr>
                    <th class="checkbox-column"></th>
                    <th>Cod.</th>
                    <th>Empresa.</th>
                    <th>Versão</th>
                    <th>Criação</th>
                    <th>Atualização</th>
                    <th>Cidade</th>
                    <th>Consultor</th>
                    <th>Supervisor</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($opportunities as $opportunity):
                      switch ($opportunity->status){
                        case 1:
                            $status = "<span class='badge badge-primary'>Em atendimento</span>";
                            break;
                        case 2:
                            $status = "<span class='badge badge-danger'>Perdida</span>";
                            break;
                        case 3:
                            $status = "<span class='badge badge-warning'>Cancelada</span>";
                            break;
                        case 4:
                              $status = "<span class='badge badge-success'>Ganha</span>";
                              break;
                            }
                      ?>
                <tr>
                    <td class="checkbox-column"> </td>
                    <td><a href="<?=url("opportunities/opportunity/{$opportunity->id}");?>"><span class="inv-number">#<?=$opportunity->id;?></span></a></td>
                    <td><?=$opportunity->company;?></td>
                    <td><?= $opportunity->version;?></td>
                    <td><span class="inv-date"><?=date_fmt($opportunity->created_at, "d/m/Y");?></span></td>
                    <td><span class="inv-date"><?=date_fmt($opportunity->update_at, "d/m/Y");?></span></td>
                    <td><?= $opportunity->city;?></td>
                    <td><?= $opportunity->consult;?></td>
                    <td><?= $opportunity->supervisor;?></td>
                    <td><?=$status;?></td>
                    <td>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                <a class="dropdown-item action-edit" href="apps_invoice-edit.html"><i data-feather="edit-2"></i>Editar</a>
                                <a class="dropdown-item action-delete" href="javascript:void(0);"><i data-feather="trash"></i>Excluir</a>
                            </div>
                        </div>
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
                    <th>Cidade</th>
                    <th>Consultor</th>
                    <th>Supervisor</th>
                    <th>Status</th>
                    <th></th>
                </tr>
                </tfoot>
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
