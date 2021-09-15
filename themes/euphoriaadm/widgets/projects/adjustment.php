<?php $v->layout("_admin"); ?>
<?= $v->start("styles"); ?>
<!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/datatables.css");?>">
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>">
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/dt-global_style.css");?>">
<link rel="stylesheet" type="text/css" href="<?= url("shared/scripts/plugins/table/datatable/custom_dt_custom.css");?>">
<!-- END PAGE LEVEL CUSTOM STYLES -->
<?= $v->end(); ?>

<div class="row layout-spacing">

    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">

            <div class="widget-content widget-content-area">
                <table id="style-3" class="table style-3  table-hover">
                    <h4 class="py-3 text-center">Readequação de Projetos</h4>
                    <thead>
                    <tr>
                        <th class="checkbox-column text-center"> Código </th>
                        <th class="text-center">Empresa</th>
                        <th>Versão</th>
                        <th>Data Criação</th>
                        <th>Data Atualização</th>
                        <th>Cidade</th>
                        <th>Consultor</th>
                        <th>Supervisor</th>
                        <th class="text-center">Status</th>
                        <th class="text-center dt-no-sorting">Ação</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="checkbox-column text-center"> 1 </td>
                        <td class="text-center">
                            UFMG
                        </td>
                        <td>1.0</td>
                        <td>30/07/2021</td>
                        <td>03/08/2021</td>
                        <td>Belo Horizonte</td>
                        <td>Hugo Siqueira</td>
                        <td>Pedro Gomes</td>
                        <td class="text-center"><span class="shadow-none badge badge-primary">Aprovado Supervisor</span></td>
                        <td class="text-center">
                            <ul class="table-controls">
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                            </ul>
                        </td>
                    </tr>


                    <tr>
                        <td class="checkbox-column text-center"> 1 </td>
                        <td class="text-center">
                            UFOP
                        </td>
                        <td>3.0</td>
                        <td>25/07/2021</td>
                        <td>03/08/2021</td>
                        <td>Ouro Preto</td>
                        <td>Hugo Siqueira</td>
                        <td>Pedro Gomes</td>
                        <td class="text-center"><span class="shadow-none badge badge-success">Aprovado Cliente</span></td>
                        <td class="text-center">
                            <ul class="table-controls">
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox-column text-center"> 1 </td>
                        <td class="text-center">
                            UFMG
                        </td>
                        <td>1.0</td>
                        <td>30/07/2021</td>
                        <td>03/08/2021</td>
                        <td>Belo Horizonte</td>
                        <td>Hugo Siqueira</td>
                        <td>Pedro Gomes</td>
                        <td class="text-center"><span class="shadow-none badge badge-warning">Revisão Necessária</span></td>
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
<script>
    c3 = $('#style-3').DataTable({
        "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
            "<'table-responsive'tr>" +
            "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Mostrando página _PAGE_ de _PAGES_",
            "sSearch": '<svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Pesquisar...",
            "sLengthMenu": "Resultados :  _MENU_",
        },
        "stripeClasses": [],
        "lengthMenu": [5, 10, 20, 50],
        "pageLength": 5
    });

    multiCheck(c3);
</script>
<?= $v->end(); ?>
