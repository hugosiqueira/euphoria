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
                    <td><span class="inv-date"><?=date_fmt($opportunity->created_at, "d/m/Y");?></span></td>
                    <td><span class="inv-date"><?=date_fmt($opportunity->update_at, "d/m/Y");?></span></td>
                    <td><?= $opportunity->city;?></td>
                    <td><?= $opportunity->consult;?></td>
                    <td><?= $opportunity->supervisor;?></td>
                    <td><?=$status;?></td>
                    <td class="text-center">
                        <ul class="table-controls">
                            <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Gerenciar"><svg viewBox="0 0 24 24" width="28" height="28" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a></li>
                            <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Editar"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                            <li><a href="javascript:void(0);" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Excluir"><svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></a></li>
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
<script>
    /*$('#invoice-list tfoot th').each( function () {
    var title = $(this).text();
    if(title!="")
        $(this).html( '<input type="text" class="search" placeholder=" '+title+'" />' );
} );*/
    var invoiceList = $('#invoice-list').DataTable({
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.footer() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
        },
        "dom": "<'inv-list-top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'<'dt-action-buttons align-self-center'B>><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f<'toolbar align-self-center'>>>>" +
            "<'table-responsive'tr>" +
            "<'inv-list-bottom-section d-sm-flex justify-content-sm-between text-center'l<'inv-list-pages-count  mb-sm-0 mb-3'i><'inv-list-pagination'p>>",

        headerCallback:function(e, a, t, n, s) {
            e.getElementsByTagName("th")[0].innerHTML='<label class="new-control new-checkbox checkbox-primary m-auto">\n<input type="checkbox" class="new-control-input chk-parent select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
        },
        columnDefs:[ {
            targets:0,
            width:"1%",
            className:"",
            orderable:!1,
            render:function(e, a, t, n) {
                return'<label class="new-control new-checkbox checkbox-primary  m-auto">\n<input type="checkbox" class="new-control-input child-chk select-customers-info" id="customer-all-info">\n<span class="new-control-indicator"></span><span style="visibility:hidden">c</span>\n</label>'
            },
        },
            { width: "4%", targets: 1 },
            { width: "20%", targets: 2 },
            { width: "10%", targets: 3 },
            { width: "10%", targets: 4 },
            { width: "12%", targets: 5 },
            { width: "12%", targets: 6 },
            { width: "12%", targets: 7 },
            { width: "10%", targets: 8 },
            { width: "10%", targets: 9 }],
        buttons: [
            {
                text: '+ Nova Oportunidade',
                className: 'btn btn-primary btn-sm',
                action: function(e, dt, node, config ) {
                    window.location = '<?= url('admin/opportunity'); ?>'
                }
            }
        ],
        "order": [[ 1, "asc" ]],
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Página _PAGE_ de _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Pesquisar...",
            "sLengthMenu": "Exibir: _MENU_",
            "sInfoFiltered": " - filtrados de _MAX_ registros no total"
        },
        "stripeClasses": [],
        "lengthMenu": [10, 20, 50],
        "pageLength": 10,

    });

    $("div.toolbar").html('<button class="dt-button dt-delete btn btn-danger btn-sm" tabindex="0" aria-controls="invoice-list"><span>Excluir</span></button>');

    multiCheck(invoiceList);
    invoiceList
        .search( "Em atendimento" )
        .columns().search( '' )
        .draw();

    $('.dt-delete').on('click', function() {
        // Read all checked checkboxes
        $(".select-customers-info:checked").each(function () {
            if (this.classList.contains('chk-parent')) {
                return;
            } else {
                $(this).parents('tr').remove();
            }
        });

    })


    $('.action-delete').on('click', function() {
        $(this).parents('tr').remove();
    })
</script>


<?= $v->end(); ?>
