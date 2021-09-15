<?php
/**
 * DATABASE
 */
define("CONF_DB_HOST", "localhost");
define("CONF_DB_USER", "root");
define("CONF_DB_PASS", "");
define("CONF_DB_NAME", "euphoria_po");

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "https://localhost/po");
define("CONF_URL_TEST", "https://localhost/po");

/**
 * SITE
 */
define("CONF_SITE_NAME", "Euphoria Formaturas MG");
define("CONF_SITE_TITLE", "Projetos Orçamentários");
define("CONF_SITE_DESC",
    "O Euphoria PO é um gerenciador de projetos orçamentários exclusivo para a empresa Euphoria Formaturas.");
define("CONF_SITE_LANG", "pt_BR");
define("CONF_SITE_DOMAIN", "euphoria.com.br");
define("CONF_SITE_ADDR_STREET", "R. Santa Rita Durão");
define("CONF_SITE_ADDR_NUMBER", "31");
define("CONF_SITE_ADDR_COMPLEMENT", "6º Andar");
define("CONF_SITE_ADDR_CITY", "Belo Horizonte");
define("CONF_SITE_ADDR_STATE", "MG");
define("CONF_SITE_ADDR_ZIPCODE", "30140-111");

/**
 * SOCIAL
 */
define("CONF_SOCIAL_TWITTER_CREATOR", "@creator");
define("CONF_SOCIAL_TWITTER_PUBLISHER", "@creator");
define("CONF_SOCIAL_FACEBOOK_APP", "5555555555");
define("CONF_SOCIAL_FACEBOOK_PAGE", "pagename");
define("CONF_SOCIAL_FACEBOOK_AUTHOR", "author");
define("CONF_SOCIAL_GOOGLE_PAGE", "5555555555");
define("CONF_SOCIAL_GOOGLE_AUTHOR", "5555555555");
define("CONF_SOCIAL_INSTAGRAM_PAGE", "insta");
define("CONF_SOCIAL_YOUTUBE_PAGE", "youtube");

/**
 * DATES
 */
define("CONF_DATE_BR", "d/m/Y H:i:s");
define("CONF_DATE_APP", "Y-m-d H:i:s");

/**
 * PASSWORD
 */
define("CONF_PASSWD_MIN_LEN", 4);
define("CONF_PASSWD_MAX_LEN", 40);
define("CONF_PASSWD_ALGO", PASSWORD_DEFAULT);
define("CONF_PASSWD_OPTION", ["cost" => 10]);

/**
 * VIEW
 */
define("CONF_VIEW_PATH", __DIR__ . "/../../shared/views");
define("CONF_VIEW_EXT", "php");
define("CONF_VIEW_THEME", "euphoriaweb");
define("CONF_VIEW_APP", "euphoriaapp");
define("CONF_VIEW_ADMIN", "euphoriaadm");

/**
 * UPLOAD
 */
define("CONF_UPLOAD_DIR", "storage");
define("CONF_UPLOAD_IMAGE_DIR", "images");
define("CONF_UPLOAD_FILE_DIR", "files");
define("CONF_UPLOAD_MEDIA_DIR", "medias");

/**
 * IMAGES
 */
define("CONF_IMAGE_CACHE", CONF_UPLOAD_DIR . "/" . CONF_UPLOAD_IMAGE_DIR . "/cache");
define("CONF_IMAGE_SIZE", 2000);
define("CONF_IMAGE_QUALITY", ["jpg" => 75, "png" => 5]);

/**
 * MAIL
 */
define("CONF_MAIL_HOST", "smtp-relay.sendinblue.com");
define("CONF_MAIL_PORT", "587");
define("CONF_MAIL_USER", "admin@tanamalasm.com.br");
define("CONF_MAIL_PASS", "W9m8bk3qZRAa6NMV");
define("CONF_MAIL_SENDER", ["name" => "Euphoria Formaturas", "address" => "orcamentos@euphoria.com.br"]);
define("CONF_MAIL_SUPPORT", "hugo@agenciabee.com");
define("CONF_MAIL_OPTION_LANG", "br");
define("CONF_MAIL_OPTION_HTML", true);
define("CONF_MAIL_OPTION_AUTH", true);
define("CONF_MAIL_OPTION_SECURE", "tls");
define("CONF_MAIL_OPTION_CHARSET", "utf-8");

