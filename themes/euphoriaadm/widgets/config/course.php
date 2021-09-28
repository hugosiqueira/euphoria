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
                    <?php if (isset($course)): ?>
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/course/{$course->id}"); ?>" method="post">
                            <input type="hidden" name="action" value="update"/>
                            <input type="hidden" name="user_id" value="<?=$course->id;?>"/>
                            <div class="info">
                                <h6 class="">Curso</h6>
                                <div class="row">
                                    <div class="col-lg-11 mx-auto">
                                        <div class="row">
                                            <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                <div class="form">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="name"><strong>Nome:</strong></label>
                                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="<?=$course->name;?>" aria-label="Nome">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="col-md-12 text-right mb-5">
                                                        <button id="save" class="btn btn-primary">Atualizar Curso</button>
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
                        <form id="general-info" class="section general-info" action="<?= url("/admin/config/course"); ?>" method="post">
                            <input type="hidden" name="action" value="create"/>
                            <div class="info"Curso</h6>
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
                                                        <button id="save" class="btn btn-primary">Criar Curso</button>
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

</div>
<!--  END CONTENT AREA  -->
<?php $v->start("scripts");?>
<script src="<?=url("shared/scripts/plugins/dropify/dropify.min.js");?>"></script>
<script src="<?=url("shared/scripts/plugins/blockui/jquery.blockUI.min.js");?>"></script>
<script src="<?=theme("assets/js/users/account-settings.js", CONF_VIEW_ADMIN);?>"></script>
<script src="<?= url("shared/scripts/plugins/notification/snackbar/snackbar.min.js"); ?>"></script>

<?php $v->end();?>
