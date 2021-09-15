<?php $v->layout("_admin"); ?>
<?php $v->start("styles");?>
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/widgets/modules-widgets.css", CONF_VIEW_ADMIN);?>"
/><?php $v->end();?>
<!-- CONTENT AREA -->
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-five">
        <div class="widget-heading">
            <a href="javascript:void(0)" class="task-info">
                <div class="usr-avatar">
                    <span>PO</span>
                </div>
                <div class="w-title">
                    <h5>Projetos Orçamentários</h5>
                    <span>Aguardando por Aprovações</span>
                </div>
            </a>
            <div class="task-action">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                        <a class="dropdown-item" href="javascript:void(0);">Ver Projetos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-content">
            <div class="progress-data">
                <div class="progress-info">
                    <div class="task-count"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg><p>5 Projetos</p></div>
                    <div class="progress-stats"><p>86.2%</p></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-five">
        <div class="widget-heading">
            <a href="javascript:void(0)" class="task-info">
                <div class="usr-avatar">
                    <span>PO</span>
                </div>
                <div class="w-title">
                    <h5>Projetos Orçamentários</h5>
                    <span>Retificados</span>
                </div>
            </a>
            <div class="task-action">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                        <a class="dropdown-item" href="javascript:void(0);">Ver Projetos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-content">
            <div class="progress-data">
                <div class="progress-info">
                    <div class="task-count"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg><p>5 Projetos</p></div>
                    <div class="progress-stats"><p>86.2%</p></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-five">
        <div class="widget-heading">
            <a href="javascript:void(0)" class="task-info">
                <div class="usr-avatar">
                    <span>PO</span>
                </div>
                <div class="w-title">
                    <h5>Projetos Orçamentários</h5>
                    <span>Em Andamento</span>
                </div>
            </a>
            <div class="task-action">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                        <a class="dropdown-item" href="javascript:void(0);">Ver Projetos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-content">
            <div class="progress-data">
                <div class="progress-info">
                    <div class="task-count"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg><p>5 Projetos</p></div>
                    <div class="progress-stats"><p>86.2%</p></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
    <div class="widget widget-five">
        <div class="widget-heading">
            <a href="javascript:void(0)" class="task-info">
                <div class="usr-avatar">
                    <span>PO</span>
                </div>
                <div class="w-title">
                    <h5>Projetos Orçamentários</h5>
                    <span>Aprovados</span>
                </div>
            </a>
            <div class="task-action">
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                        <a class="dropdown-item" href="javascript:void(0);">Ver Projetos</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="widget-content">
            <div class="progress-data">
                <div class="progress-info">
                    <div class="task-count"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg><p>5 Projetos</p></div>
                    <div class="progress-stats"><p>86.2%</p></div>
                </div>
                <div class="progress">
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 65%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>

        </div>
    </div>
</div>



<!-- CONTENT AREA -->

<?php $v->start("scripts"); ?>
<script>
    $(function () {
        setInterval(function () {
            $.post('<?= url("/admin/dash/home");?>', {refresh: true}, function (response) {
                // count
                if (response.count) {
                    $(".app_dash_home_trafic_count").text(response.count);
                } else {
                    $(".app_dash_home_trafic_count").text(0);
                }

                //list
                var list = "";
                if (response.list) {
                    $.each(response.list, function (item, data) {
                        var url = '<?= url();?>' + data.url;
                        var title = '<?= strtolower(CONF_SITE_NAME);?>';

                        list += "<article>";
                        list += "<h4>[" + data.dates + "] " + data.user + "</h4>";
                        list += "<p>" + data.pages + " páginas vistas</p>";
                        list += "<p class='radius icon-link'>";
                        list += "<a target='_blank' href='" + url + "'><b>" + title + "</b>" + data.url + "</a>";
                        list += "</p>";
                        list += "</article>";
                    });
                } else {
                    list = "<div class=\"message info icon-info\">\n" +
                        "Não existem usuários online navegando no site neste momento. Quando tiver, você\n" +
                        "poderá monitoriar todos por aqui.\n" +
                        "</div>";
                }

                $(".app_dash_home_trafic_list").html(list);
            }, "json");
        }, 1000 * 10);
    });
</script>
<?php $v->end(); ?>
