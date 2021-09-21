<?php $v->layout("_login"); ?>

<div class="form-container outer">
    <div class="form-form">
        <div class="form-form-wrap">
            <div class="form-container">
                <div class="form-content">

                    <h1 class=""><img class="rounded-circle" src="<?= theme("assets/img/logo_euphoria.png", CONF_VIEW_ADMIN);?>" /></h1>
                    <h5 class="pt-1 font-weight-bold">Projetos Orçamentários</h5>

                        <div class="ajax_response"><?= flash(); ?></div>


                        <form class="text-left" name="login" action="<?= url("/admin/login"); ?>" method="post">
                            <?= csrf_input(); ?>
                        <div class="form">

                            <div id="username-field" class="field-wrapper input">
                                <label for="username">E-mail</label>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                <input id="email" name="email" type="email" class="form-control" placeholder="usuario@email.com" tabindex="1" required>
                            </div>

                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">Senha</label>
                                    <a href="<?= url("admin/forget");?>" class="forgot-pass-link" tabindex="4">Esqueceu sua senha?</a>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                <input id="password" name="password" type="password" class="form-control" placeholder="Senha" tabindex="2" required>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" id="toggle-password" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </div>
                            <div class="d-sm-flex justify-content-between">
                                <div class="field-wrapper">
                                    <button type="submit" class="btn btn-primary" value="" tabindex="3">Entrar</button>
                                </div>
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
