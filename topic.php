<!doctype html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="styles/style.css">
    <title>Diskuzní Fórum</title>
</head>
<body>

<?php
include "components/navigation.component.php"
?>

<main class="main">
    <form class="main__new-post">
        <label>
            <input type="text" placeholder="Přidej příspěvek" class="main__new-post-input"/>
            <button class="main__new-post-button"><i class="fa-solid fa-plus"></i></button>
        </label>
    </form>
</main>


<?php
include "components/footer.component.php"
?>
</body>
<script src="js/getPostsByTopic.js"></script>
</html>