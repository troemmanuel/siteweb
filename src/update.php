<?php

require_once __DIR__ . "/Model/User.php";
require_once __DIR__ . "/Service/UserManager.php";
require_once __DIR__ . "/Service/Storage.php";

ob_start();
session_start();
if ($_SESSION["is_logged"] !== true) {
    header('Location: index.php?result=ko');
}
/** @var User $user */
$user = $_SESSION['user_obj'];
$result = "ko";

if($_SERVER['REQUEST_METHOD'] !== "POST"){
    header('Location: index.php');
}

//verif Data
$userManager = new UserManager();
$user->setUsername($_POST['username']);
$user->setEmail($_POST['email']);


if($userManager->updateUser($user)){
    $result = "ok";
}

header(sprintf('Location: my_page.php?result=%s',$result));