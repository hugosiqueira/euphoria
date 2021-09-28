<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <?= $head; ?>

    <link href="<?= theme("assets/css/loader.css", CONF_VIEW_ADMIN);?>" rel="stylesheet" type="text/css" />
    <script src="<?= theme("assets/js/loader.js", CONF_VIEW_ADMIN);?>"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?= url("/shared/bootstrap/css/bootstrap.min.css");?>" rel="stylesheet" type="text/css" />
    <link href="<?= url("/shared/scripts/plugins/perfect-scrollbar/perfect-scrollbar.css");?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= theme("/assets/css/main.css", CONF_VIEW_ADMIN); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/css/structure.css", CONF_VIEW_ADMIN); ?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/css/elements/alert.css", CONF_VIEW_ADMIN); ?>"/>
    <link rel="icon" type="image/png" href="<?= theme("/assets/img/favicon.png", CONF_VIEW_ADMIN); ?>"/>

    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <?= $v->section("styles"); ?>
    <style>
        .layout-px-spacing {
            min-height: calc(100vh - 140px)!important;
        }
        .header-wrapper {
            padding: 5px 0;
            border-radius: 4px;
        }
        .header-wrapper h4 {
            font-size: 32px;
            padding: 0 8px;
            color: #4361ee;
        }
        .header-wrapper p {
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 1px;
            margin-bottom: 35px;
        }
    </style>
</head>
<body class="sidebar-noneoverflow">

<div class="ajax_load" style="z-index: 999;">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>
<!-- BEGIN LOADER -->
<div id="load_screen">
    <div class="loader">
        <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
        </div>
    </div>
</div>
<!--  END LOADER -->


<?php
$photo = user()->photo();
$userPhoto = ($photo ? image($photo, 300, 300) : theme("/assets/img/avatar.jpg", CONF_VIEW_ADMIN));
?>
<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-text">
                <a href="index.html" class="nav-link"> <img src="<?= theme("assets/img/euphoria-formaturas-logo.png", CONF_VIEW_ADMIN);?>" class="navbar-logo" alt="logo"></a>
            </li>
            <li class="nav-item toggle-sidebar">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg></a>
            </li>
        </ul>
        <ul class="navbar-item flex-row navbar-dropdown ml-auto">

            <li class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                </a>
                <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <img src="<?= $userPhoto;?>" class="img-fluid mr-2" alt="avatar">
                            <div class="media-body">
                                <h5><?= user()->fullName(); ?></h5>
                                <p><?= user()->findRole();?></p>
                            </div>
                        </div>
                    </div>
                    <div class="dropdown-item">
                        <a href="<?= url("/admin/users/user/" . user()->id); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> <span>Meu Perfil</span>
                        </a>
                    </div>

                    <div class="dropdown-item">
                        <a href="auth_lockscreen.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg> <span>Bloquear Tela</span>
                        </a>
                    </div>
                    <div class="dropdown-item">
                        <a href="<?= url("/admin/logoff"); ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg> <span>Sair</span>
                        </a>
                    </div>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->
<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">
    <div class="overlay"></div>
    <div class="cs-overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN SIDEBAR  -->
    <?php $v->insert("widgets/dash/sidebar.php"); ?>
    <!--  END SIDEBAR  -->

    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">

            <div class="layout-spacing" id="cancel-row"></div>
            <div class="ajax_response"><?= flash(); ?></div>
            <?= $v->section("content"); ?>
        </div>
        <?= $v->insert("widgets/dash/footer.php");?>
    </div>
    <!--  END CONTENT AREA  -->
</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= theme("/assets/js/libs/jquery-3.1.1.min.js", CONF_VIEW_ADMIN);?>"></script>
<script src="<?= url("/shared/bootstrap/js/popper.min.js");?>"></script>
<script src="<?= url("/shared/bootstrap/js/bootstrap.min.js");?>"></script>
<script src="<?= url("/shared/scripts/plugins/perfect-scrollbar/perfect-scrollbar.min.js");?>"></script>
<script src="<?= theme("/assets/js/app.js", CONF_VIEW_ADMIN); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.form.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery.mask.js"); ?>"></script>
<script src="<?= url("/shared/scripts/tinymce/tinymce.min.js"); ?>"></script>
<script src="<?= theme("/assets/js/custom.js", CONF_VIEW_ADMIN); ?>"></script>
<script src="<?= theme("/assets/js/scripts.js", CONF_VIEW_ADMIN); ?>"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
<script>
    feather.replace()
</script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<?= $v->section("scripts"); ?>
<!-- END PAGE LEVEL SCRIPTS -->

</body>
</html>