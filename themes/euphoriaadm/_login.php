<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <?= $head; ?>

    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= url("/shared/styles/boot.css"); ?>"/>
    <link href="<?= url("/shared/bootstrap/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= theme("/assets/css/plugins.css", CONF_VIEW_ADMIN); ?>" rel="stylesheet" type="text/css" />
    <link href="<?= theme("/assets/css/authentication/form-2.css", CONF_VIEW_ADMIN);?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?= theme("/assets/css/forms/theme-checkbox-radio.css", CONF_VIEW_ADMIN);?>"/>
    <link rel="stylesheet" type="text/css" href="<?= theme("/assets/css/forms/switches.css", CONF_VIEW_ADMIN);?>"/>
    <link rel="stylesheet" href="<?= theme("/assets/css/elements/alert.css", CONF_VIEW_ADMIN); ?>"/>

    <link rel="icon" type="image/png" href="<?= theme("/assets/img/favicon.png", CONF_VIEW_ADMIN); ?>"/>
</head>
<body class="form">

<div class="ajax_load">
    <div class="ajax_load_box">
        <div class="ajax_load_box_circle"></div>
        <p class="ajax_load_box_title">Aguarde, carregando...</p>
    </div>
</div>

<?= $v->section("content"); ?>

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="<?= theme("/assets/js/libs/jquery-3.1.1.min.js", CONF_VIEW_ADMIN); ?>"></script>
<script src="<?= url("/shared/bootstrap/js/popper.min.js"); ?>"></script>
<script src="<?= url("/shared/bootstrap/js/bootstrap.min.js"); ?>"></script>
<script src="<?= url("/shared/scripts/jquery-ui.js"); ?>"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="<?= theme("/assets/js/authentication/form-2.js", CONF_VIEW_ADMIN); ?>"></script>

</body>
</html>
