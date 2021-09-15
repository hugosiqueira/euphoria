<?php $v->layout("_admin"); ?>
<?= $v->start("styles"); ?>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/datatables.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>">
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/dt-global_style.css");?>">
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/custom_dt_custom.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/apps/templates.css", CONF_VIEW_ADMIN);?>">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<?= $v->end(); ?>

<div class="row layout-spacing">
    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
        <div class="widget-content widget-content-area br-6">
                <table id="templates" class="table style-3  table-hover" style="width:100%;">
                    <h4 class="py-3 text-center">Templates</h4>
                    <thead>
                    <tr>
                        <th class="checkbox-column text-center"> Projeto </th>
                        <th>Nome</th>
                        <th class="text-center"> Local Baile </th>
                        <th> Número de Formandos </th>
                        <th>Valor da Parcela 15</th>
                        <th>Eventos</th>
                        <th>Data de Criação</th>
                        <th>Atualizado em</th>

                        <th class="text-center">Status</th>
                        <th class="text-center dt-no-sorting">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="checkbox-column"> </td>
                        <td class="text-center">
                            Baile Mix Garden
                        </td>
                        <td class="text-center">Nova Lima</td>
                        <td class="text-center">40</td>
                        <td class="text-center">R$200,00</td>
                        <td class="text-center">Missa, Colação, Baile</td>
                        <td class="text-center">05/08/2021</td>
                        <td class="text-center">15/08/2021</td>
                        <td class="text-center"><span class="shadow-none badge badge-primary">Aprovado Supervisor</span></td>
                        <td class="text-center">
                            <ul class="table-controls">
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                            </ul>
                        </td>
                    </tr>


                    <tr>
                        <td class="checkbox-column">  </td>
                        <td class="text-center">
                            Baile Mix Garden
                        </td>
                        <td class="text-center">Nova Lima</td>
                        <td class="text-center">40</td>
                        <td class="text-center">R$200,00</td>
                        <td class="text-center">Missa, Colação, Baile</td>
                        <td class="text-center">05/08/2021</td>
                        <td class="text-center">15/08/2021</td>
                        <td class="text-center"><span class="shadow-none badge badge-primary">Aprovado Supervisor</span></td>
                        <td class="text-center">
                            <ul class="table-controls">
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                            </ul>
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
<script src="<?= theme('assets/js/apps/templates.js', CONF_VIEW_ADMIN);?>"></script>

<?= $v->end(); ?>
