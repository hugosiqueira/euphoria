<?php $v->layout("_admin"); ?>
<?php $v->start("styles"); ?>
<link rel="stylesheet" type="text/css" href="<?= theme("assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>">
<link href="<?= url("/shared/scripts/plugins/jquery-ui/jquery-ui.min.css");?>" rel="stylesheet" type="text/css" />
<link href="<?= theme("assets/css/apps/contacts.css", CONF_VIEW_ADMIN);?>" rel="stylesheet" type="text/css" />
<?php $v->end(); ?>
<div class="row layout-spacing " id="cancel-row"></div>
<div class="col-lg-12">
    <div class="widget-content searchable-container list">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                <form class="form-inline my-2 my-lg-0">
                    <div class="">
                        <i data-feather="search"></i>
                        <input type="text" class="form-control product-search" id="input-search" placeholder="Pesquisar Instituições...">
                    </div>
                </form>
            </div>

            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                <div class="d-flex justify-content-sm-end justify-content-center">
                    <a href="<?=url('admin/schools/school');?>">
                        <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>

                    </a>
                    <div class="switch align-self-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list view-list active-view"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid view-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="searchable-items list">
            <div class="items items-header-section">
                <div class="item-content">
                    <div class="">
                        <div class="n-chk align-self-center text-center">
                            <label class="new-control new-checkbox checkbox-primary">
                                <input type="checkbox" class="new-control-input" id="contact-check-all">
                                <span class="new-control-indicator"></span>
                            </label>
                        </div>
                        <h4>Empresa</h4>
                    </div>
                    <div class="user-email">
                        <h4>E-mail</h4>
                    </div>
                    <div class="user-phone">
                        <h4>Telefone</h4>
                    </div>
                    <div class="action-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                    </div>
                </div>
            </div>
            <?php foreach ($schools as $school):
                ?>
                <div class="items">
                    <div class="item-content">
                        <div class="user-profile">
                            <div class="n-chk align-self-center text-center">
                                <label class="new-control new-checkbox checkbox-primary">
                                    <input type="checkbox" class="new-control-input contact-chkbox">
                                    <span class="new-control-indicator"></span>
                                </label>
                            </div>
                            <img src="<?= theme("/assets/img/avatar.jpg", CONF_VIEW_ADMIN); ?>" alt="avatar">

                            <div class="user-meta-info">
                                <p class="user-name" data-name="<?= $school->name; ?>"><?= $school->name; ?></p>
                                <p class="user-work" data-sigla="<?= $school->sigla; ?>"><?= $school->sigla; ?></p>
                            </div>
                        </div>
                        <div class="user-email">
                            <p class="info-title">Endereço: </p>
                            <p class="usr-email-addr" data-address="<?= $school->address; ?>"><?= $school->address; ?></p>
                        </div>

                        <div class="action-btn">
                            <a href="<?= url('admin/config/school/'.$school->id);?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                            </a>
                            <a href="#" data-post="<?= url("admin/config/school/{$school->id}"); ?>"
                               data-action="delete"
                               data-confirm-ok ="Sim"
                               data-confirm-cancel = "Cancelar"
                               data-confirm="ATENÇÃO: Tem certeza que deseja excluir a instituição e todos os dados relacionados a ela? Essa ação não pode ser desfeita!"
                               data-user_id="<?= $school->id; ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-minus delete"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

    </div>
</div>

<?php $v->start("scripts");?>
<script src="<?= url("shared/scripts/plugins/jquery-ui/jquery-ui.min.js");?>"></script>
<script src="<?=theme("assets/js/users/users.js", CONF_VIEW_ADMIN);?>"></script>
<?php $v->end();?>
