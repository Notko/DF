<?php

require_once('controllers/userController.class.php');

if (isset($_POST['registerSubmit'])) {
    $user = new userController();
    $response = $user->registerUser($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['email'], $_POST['password'], $_POST['password-again']);
    if ($response['status'] == 200) {
        header('Location: login.php');
    }
    if ($response['status'] == 422) {
        $error = $response['message'];
    }
}

?>

<!doctype html>
<html lang="cs" class="register">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles/style.css">
    <title>Registrace | Diskuzní Fórum</title>
</head>
<body class="register">
<main class="register-page">
    <?php
    if (isset($error)) {
        echo '<span class="toast toast--danger">' . $error . '</span>';
    }
    ?>
    <section class="register-page__main">
        <a href="index.php" class="register-page__back"><i class="fa-solid fa-angle-left"></i></a>
        <h2 class="register-page__heading">Vítejte</h2>
        <p class="register-page__heading-paragraph">Vítejte! Zadejte své údaje pro registraci prosím.</p>
        <form class="register-page__form" action="register.php" method="post">
            <label for="name">Jméno</label>
            <input type="text" id="name" name="name" placeholder="Zadejte své jméno"/>
            <label for="surname">Příjmení</label>
            <input type="text" id="surname" name="surname" placeholder="Zadejte své příjmení"/>
            <label for="username">Uživatelské jméno</label>
            <input type="text" id="username" name="username" placeholder="Zadejte uživatelské jméno"/>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Zadejte svůj email"/>
            <label for="password">Heslo</label>
            <input type="password" id="password" name="password" placeholder="●●●●●●●●"/>
            <label for="password-again">Heslo znovu</label>
            <input type="password" id="password-again" name="password-again" placeholder="●●●●●●●●"/>
            <input type="submit" value="Registrovat se" name="registerSubmit">
        </form>
        <p class="register-page__no-account">Již máte účet? <a href="login.php">Přihlaste se</a></p>
    </section>
    <aside class="register-page__decorative">
        <a href="index.php">
            <img src="img/logoipsum-287.svg" alt="Decorative Element">
        </a>
    </aside>
</main>
</body>
</html>