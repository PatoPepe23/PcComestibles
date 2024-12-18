<!DOCTYPE html>
<html lang="en">
<head>
    <!---Bootstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!---Normal--->
    <link rel="stylesheet" href="/Views/CSS/header.css">
    <link rel="stylesheet" href="/Views/CSS/main.css">
    <link rel="stylesheet" href="/Views/CSS/footer.css">
    <link rel="stylesheet" href="/Views/CSS/menu.css">
    <link rel="stylesheet" href="/Views/CSS/login-register.css">
    <link rel="stylesheet" href="/Views/CSS/cart.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php require($header)?>
    <section id="body-section" class="container">
        <?php require($view) ?>
    </section>
    <?php require($footer) ?>

    <!---Bootstrap--->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="/Views/JS/footer.js"></script>
    <script src="/Views/JS/mainBody.js"></script>
</body>
</html>