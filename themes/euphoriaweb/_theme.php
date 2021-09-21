<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="mit" content="2019-09-05T13:56:23-03:00+28440">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1, shrink-to-fit=no"">

    <?= $head; ?>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="<?= url("/shared/bootstrap/css/bootstrap.min.css");?>" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="<?= theme("/assets/css/plugins.css", CONF_VIEW_ADMIN); ?>"/>
    <link rel="stylesheet" href="<?= theme("assets/css/pages/error/style-400.css", CONF_VIEW_ADMIN); ?>"/>
    <link rel="icon" type="image/png" href="<?= theme("/assets/img/favicon.png", CONF_VIEW_ADMIN); ?>"/>

</head>
<body class="error404 text-center">

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mr-auto mt-5 text-md-center text-center">
            <a href="<?=CONF_URL_BASE;?>" class="ml-md-5">
                <img alt="image-404" src="<?= theme("assets/img/euphoria-formaturas-logo.png", CONF_VIEW_ADMIN);?>" style="margin: auto;">
            </a>
        </div>
    </div>
</div>
<div class="container-fluid error-content">
    <div class="">


    <?= $v->section("content"); ?>
    </div>
</div>

        <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
        <script src="<?= theme("/assets/js/libs/jquery-3.1.1.min.js", CONF_VIEW_ADMIN);?>"></script>
        <script src="<?= url("/shared/bootstrap/js/popper.min.js");?>"></script>
        <script src="<?= url("/shared/bootstrap/js/bootstrap.min.js");?>"></script>
        <!-- END GLOBAL MANDATORY SCRIPTS -->

</body>
</html>
