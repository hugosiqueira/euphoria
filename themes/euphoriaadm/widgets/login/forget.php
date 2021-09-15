<?php $v->layout("_login"); ?>
<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class=""><img class="rounded-circle" src="<?= theme("assets/img/logo_euphoria.png", CONF_VIEW_ADMIN);?>"/></h1>

                    <h5 class="pt-1 font-weight-bold">Projetos Orçamentários</h5>
                    <p class="signup-link recovery">Digite seu e-mail que enviaremos as instruções para recuperar sua senha!</p>

                    <form class="auth_form text-left" data-reset="true" action="<?= url("/admin/forget"); ?>" method="post"
                          enctype="multipart/form-data">
                        <?= csrf_input(); ?>

                        <div class="form">
                            <div class="ajax_response"><?= flash(); ?></div>

                            <div id="email-field" class="field-wrapper input">
                                <div class="d-flex justify-content-between">
                                    <label for="email">E-MAIL</label>
                                    <a class="forgot-pass-link" title="Voltar e entrar!" href="<?= url("/admin/login"); ?>">Voltar e entrar!</a>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                <input id="email" name="email" type="email" class="form-control" value="" placeholder="E-mail" required>
                            </div>

                            <div class="d-sm-flex justify-content-between">

                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="">Enviar</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>