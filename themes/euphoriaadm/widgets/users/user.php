<?php $v->layout("_admin"); ?>
<?php $v->start("styles"); ?>
<link rel="stylesheet" type="text/css" href="<?= theme("/assets/css/widgets/modules-widgets.css", CONF_VIEW_ADMIN); ?>">
<link rel="stylesheet" href="<?= url("/shared/scripts/plugins/notification/snackbar/snackbar.min.css"); ?>" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=url("shared/scripts/plugins/dropify/dropify.min.css");?>">
<link href="<?= theme("assets/css/users/account-setting.css", CONF_VIEW_ADMIN);?>" rel="stylesheet" type="text/css" />
<?php $v->end(); ?>
<!--  BEGIN CUSTOM STYLE FILE  -->

<script>
    function validatePassword() {
        let pass = document.getElementById('password').value;
        let pass2 = document.getElementById('confirmPassword').value;
        let button = document.getElementById('save');

        if (pass != pass2) {
            Snackbar.show({
                text: 'As senhas não são iguais, favor corrigir.',
                actionTextColor: '#fff',
                backgroundColor: '#e7515a',
                duration: 5000,
                actionText: 'X'
            });
            button.disabled = true;

        } else {
            button.disabled = false;
        }
    }
</script>
<!--  END CUSTOM STYLE FILE  -->
<!--  BEGIN CONTENT AREA  -->


    <div class="layout-px-spacing">

        <div class="account-settings-container layout-top-spacing">

            <div class="account-content">
                <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                            <form id="general-info" class="section general-info" action="<?= url("/admin/users/user/{$user->id}"); ?>" method="post">
                                <input type="hidden" name="action" value="update"/>
                                <div class="info">
                                    <h6 class="">Dados Pessoais</h6>
                                    <div class="row">
                                        <div class="col-lg-11 mx-auto">
                                            <div class="row">
                                                <div class="col-xl-2 col-lg-12 col-md-4">
                                                    <div class="upload mt-4 pr-md-4">
                                                        <?php
                                                        $photo = user()->photo();
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
                                                                    <label for="fullName"><strong>Nome:</strong> <?=$user->fullName();?></label>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label for="role"><strong>Função:</strong> <?=$user->findRole();?> </label>
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
                                                                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" value="<?=$user->email;?>" aria-label="E-mail">
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
                                                            <button id="save" class="btn btn-primary">Salvar</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


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

