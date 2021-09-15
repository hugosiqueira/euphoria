<?php $v->layout("_admin"); ?>
<?= $v->start("styles"); ?>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/datatables.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>">
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/dt-global_style.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/apps/templates.css", CONF_VIEW_ADMIN);?>">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<?= $v->end(); ?>

<div class="row layout-top-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6">
            <table id="projects-approved" class="table table-hover" style="width:100%;">
                <h4 class="py-3 text-center">Aprovação de Projetos</h4>
                <thead>
                <tr>
                    <th class="checkbox-column text-center"> </th>
                    <th>Código PO</th>
                    <th class="text-center"> Empresa </th>
                    <th> Versão </th>
                    <th>Criado em</th>
                    <th>Atualizado em</th>
                    <th>Total Venda</th>
                    <th>Custo Total Venda</th>
                    <th>MC Venda (R$)</th>
                    <th>MC Venda (%)</th>
                    <th>Total Projeto</th>
                    <th>Custo Total</th>
                    <th>MC Proj (R$)</th>
                    <th>MC Proj (%)</th>
                    <th>Consultor</th>
                    <th>Supervisor</th>
                    <th class="text-center">Status</th>
                    <th class="text-center dt-no-sorting">Ação</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="checkbox-column"> </td>
                    <td class="text-center">
                        #01
                    </td>
                    <td class="text-center">Engenharia UFU</td>
                    <td class="text-center">1.0</td>
                    <td class="text-center">01/08/2021</td>
                    <td class="text-center">16/08/2021</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">R$1.500.000,00</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">67%</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">R$1.500.000,00</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">55%</td>
                    <td class="text-center">João Silva</td>
                    <td class="text-center">Pedro Gomes</td>
                    <td class="text-center"><span class="shadow-none badge badge-warning">Revisão Necessária</span></td>
                    <td class="text-center">
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
                <tr>
                    <td class="checkbox-column"> </td>
                    <td class="text-center">
                        #01
                    </td>
                    <td class="text-center">Engenharia UFU</td>
                    <td class="text-center">1.0</td>
                    <td class="text-center">01/08/2021</td>
                    <td class="text-center">16/08/2021</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">R$1.500.000,00</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">67%</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">R$1.500.000,00</td>
                    <td class="text-center">R$2.000.000,00</td>
                    <td class="text-center">55%</td>
                    <td class="text-center">João Silva</td>
                    <td class="text-center">Pedro Gomes</td>
                    <td class="text-center"><span class="shadow-none badge badge-success">Aprovado</span></td>
                    <td class="text-center">
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



                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<?= $v->start("scripts"); ?>
<script src="<?= url('shared/scripts/plugins/table/datatable/datatables.js');?>"></script>
<script src="<?= url('shared/scripts/plugins/table/datatable/button-ext/dataTables.buttons.min.js');?>"></script>
<script src="<?= theme('assets/js/apps/projects-approved.js', CONF_VIEW_ADMIN);?>"></script>

<?= $v->end(); ?>
