<?php
require_once 'start.config.php';
require_once('controllers/userController.class.php');

if (isset($_POST['loginSubmit'])) {
    $user = new userController();
    $response = $user->loginUser($_POST['username'], $_POST['password']);
    if ($response['status'] == 200) {
        header('Location: index.php');
    }
    if ($response['status'] == 422 || 403) {
        $error = $response['message'];
    }
}
?>
<!doctype html>
<html lang="cs" class="login">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles/style.css">
    <title>Přihlášení | Diskuzní Fórum</title>
</head>
<body class="login">
<main class="login-page">
    <?php
    if (isset($error)) {
        echo '<span class="toast toast--danger">' . $error . '</span>';
    }
    ?>
    <section class="login-page__main">
        <a href="index.php" class="login-page__back"><i class="fa-solid fa-angle-left"></i></a>
        <h2 class="login-page__heading">Vítejte zpět</h2>
        <p class="login-page__heading-paragraph">Vítejte! Zadejte své přihlašovací údaje prosím.</p>
        <form class="login-page__form" action="login.php" method="post">
            <label for="username">Uživatelské jméno</label>
            <input type="text" id="username" name="username" placeholder="Zadejte své uživatelské jméno" required/>
            <label for="password">Heslo</label>
            <input type="password" id="password" name="password" placeholder="●●●●●●●●" required/>
            <a href="#" class="login-page__forgotten-password">Zapomenuté heslo</a>
            <input type="submit" value="Přihlásit se" name="loginSubmit">
        </form>
        <p class="login-page__no-account">Nemáte účet? <a href="register.php">Registrujte se</a></p>
    </section>
    <aside class="login-page__decorative">
        <a href="index.php">
            <img src="img/logoipsum-287.svg" alt="Decorative Element">
        </a>
    </aside>
</main>
</body>
</html>