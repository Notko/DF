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
    <link rel="stylesheet" href="/styles/style.css">
    <title>Registrace | Diskuzní Fórum</title>
</head>
<body class="register">
<main class="register-page">
    <section class="register-page__main">
        <h2 class="register-page__heading">Vítejte</h2>
        <p class="register-page__heading-paragraph">Vítejte! Zadejte své údaje pro registraci prosím.</p>
        <form class="register-page__form">
            <label for="name">Jméno</label>
            <input type="text" id="name" placeholder="Zadejte své jméno"/>
            <label for="surname">Příjmení</label>
            <input type="text" id="surname" placeholder="Zadejte své příjmení"/>
            <label for="username">Uživatelské jméno</label>
            <input type="text" id="username" placeholder="Zadejte uživatelské jméno"/>
            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Zadejte svůj email"/>
            <label for="password">Heslo</label>
            <input type="password" id="password" placeholder="●●●●●●●●"/>
            <label for="password-again">Heslo znovu</label>
            <input type="password" id="password-again" placeholder="●●●●●●●●"/>
            <input type="submit" value="Registrovat se">
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