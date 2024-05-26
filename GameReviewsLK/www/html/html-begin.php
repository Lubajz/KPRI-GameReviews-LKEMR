<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="./src/js/main.js"></script>
    <title><?= TITLE ?></title>
</head>

<body>
    <?php
    $jmeno = getJmeno();
    ?>
    <header>
        <div class="header-container">
            <img src="Reviewer.png" alt="Reviewer Logo" class="logo">
            <h1 class="page-title">
                <a href="index.php"><?= TITLE ?></a>
            </h1>
        </div>
        <div class="welcomeuser">
            <?php if ($jmeno): ?>
                <h4>Welcome, <?= htmlspecialchars($jmeno) ?></h4>
            <?php endif; ?>
        </div>
    </header>
</body>

</html>