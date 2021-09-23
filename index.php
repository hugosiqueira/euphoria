<?php
ob_start();

require __DIR__ . "/vendor/autoload.php";

/**
 * BOOTSTRAP
 */

use CoffeeCode\Router\Router;
use Source\Core\Session;

$session = new Session();
$route = new Router(url(), ":");



/**
 * ADMIN ROUTES
 */
$route->namespace("Source\App\Admin");
$route->group(null);
$route->get("/", "Login:root");


$route->group("/admin");

//config
$route->get("/config", "Config:home");
$route->get("/config/permissions", "Permissions:home");
$route->get("/config/permissions/new", "Permissions:new");
$route->get("/config/users", "Users:home");
$route->post("/config/users", "Users:home");
$route->get("/config/user/", "Users:user");
$route->post("/config/user/", "Users:user");
$route->get("/config/user/{user_id}", "Users:user");
$route->post("/config/user/{user_id}", "Users:user");
$route->get("/config/schools", "Config:schools");
$route->get("/config/school", "Schools:school");
$route->post("/config/school", "Schools:school");
$route->get("/config/companies", "Config:companies");
$route->get("/config/roles", "Config:roles");
$route->get("/config/events", "Config:events");
$route->get("/config/courses", "Config:courses");




//login
$route->get("/", "Login:root");
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");
$route->get("/forget", "Login:forget");
$route->post("/forget", "Login:forget");
$route->get("/forget/{code}", "Login:reset");
$route->post("/forget/reset", "Login:reset");



//dash
$route->get("/dash", "Dash:dash");
$route->get("/dash/home", "Dash:home");
$route->post("/dash/home", "Dash:home");
$route->get("/logoff", "Dash:logoff");

//opportunities
$route->get("/opportunities", "Opportunities:home");
$route->get("/opportunities/new", "Opportunities:new");

//templates
$route->get("/templates", "Templates:home");
$route->post("/templates", "Templates:home");

//projects
$route->get("/projects/approved", "Projects:approved");
$route->get("/projects/adjustment", "Projects:adjustment");

//price list
$route->get("/price", "Price:home");

//users
$route->get("/users/home", "Users:home");
$route->post("/users/home", "Users:home");
$route->get("/users/home/{search}/{page}", "Users:home");
$route->get("/users/user", "Users:user");
$route->post("/users/user", "Users:user");
$route->get("/users/user/{user_id}", "Users:user");
$route->post("/users/user/{user_id}", "Users:user");

//notification center
$route->post("/notifications/count", "Notifications:count");
$route->post("/notifications/list", "Notifications:list");

//optin
$route->group(null);
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

//END ADMIN
$route->namespace("Source\App");


/**
 * ERROR ROUTES
 */
$route->group("/ops");
$route->get("/{errcode}", "Web:error");

/**
 * ROUTE
 */
$route->dispatch();

/**
 * ERROR REDIRECT
 */
if ($route->error()) {
    $route->redirect("/ops/{$route->error()}");
}

ob_end_flush();