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
    <section class="login-page__main">
        <h2 class="login-page__heading">Vítejte zpět</h2>
        <p class="login-page__heading-paragraph">Vítejte! Zadejte své přihlašovací údaje prosím.</p>
        <form class="login-page__form">
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Zadejte svůj email"/>
            <label for="password">Heslo</label>
            <input type="password" id="password" placeholder="●●●●●●●●"/>
            <a href="#" class="login-page__forgotten-password">Zapomenuté heslo</a>
            <input type="submit" value="Přihlásit se">
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