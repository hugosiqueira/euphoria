<?php
$photo = user()->photo();
$userPhoto = ($photo ? image($photo, 300, 300) : theme("/assets/img/avatar.jpg", CONF_VIEW_ADMIN));
$nav = function ($icon, $href, $title) use ($app) {

    $active = ((explode("/", $app)[0] == explode("/", $href)[0] && explode("/", $href)[0] != "projects") ? "active" : null);
    if(explode("/", $app)[0] == "projects" && explode("/", $href)[0] == "projects" && explode("/", $app)[1] == explode("/", $href)[1]):
            $active = "active";
    endif;
    $expanded = ($active==="active"? "true": "false");
    $url = url("/admin/{$href}");
    return "<li class=\"menu {$active}\"><a aria-expanded=\"{$expanded}\" class=\"dropdown-toggle\" href=\"{$url}\"><div><i data-feather=\"{$icon}\"></i></i><span>{$title}</span></div></a></li>";
};
?>
<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image"></figure>
            <div class="user-info">
                <img src="<?= $userPhoto; ?>" alt="avatar">
                <h6 class=""><?= user()->fullName(); ?></h6>
                <p class=""><?= user()->findRole();?></p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <?php
                echo $nav("home", "dash/home", "Home");
                echo $nav("layers", "opportunities", "Oportunidades");
                echo $nav("layout", "templates", "Templates");
                echo $nav("thumbs-up", "projects/approved", "Aprovação de Projetos");
                echo $nav("users", "class/home", "Turmas");
                echo $nav("sliders", "projects/adjustment", "Readequação de Projetos");
                echo $nav("dollar-sign", "price", "Pricelist");
                echo $nav("settings", "config", "Administração");
            ?>
        </ul>
    </nav>
</div>
<!--  END SIDEBAR  -->
