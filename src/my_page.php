<?php
require_once __DIR__ . "/Model/User.php";
ob_start();
session_start();
if ($_SESSION["is_logged"] !== true) {
     header('Location: index.php?result=ko');
}
/** @var User $user */
$user = $_SESSION['user_obj'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <div class="main">
        <div class="signup">
            <?php if(isset($_GET['result'])): ?>
            <?php
            $message = $_GET['result'] === 'ok' ? 'Your Profil are saved' : 'Error on save or profil';
            ?>
            <center>
                <span class="label2"><?php echo $message ?></span>
            </center>
            <?php else: ?>
                <center>
                    <span class="label2">Your Profil</span>
                </center>
            <?php endif; ?>
            <form action="update.php" method="POST">
                <input type="text" name="username" placeholder="User name" value="<?php echo $user->getUsername() ?>" required="">
                <input type="email" name="email" placeholder="Email" value="<?php echo $user->getEmail() ?>" required="">
                <button>save</button>
                <a href="index.php?result=logout" class="label2">logout</a>
            </form>
        </div>
    </div>
</body>
</html>