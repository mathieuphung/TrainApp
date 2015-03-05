<?php
$routing = [
    'home' => [
        'controller' => 'home',
        'secure' => false
    ],
    'subscription' => [
        'controller' => 'subscription',
        'secure' => false
    ],
    'login' => [
        'controller' => 'login',
        'secure' => false
    ],
    'propos' => [
        'controller' => 'propos',
        'secure' => false
    ],
    'panier' => [
        'controller' => 'panier',
        'secure' => false
    ],
    'profile' => [
        'controller' => 'profile',
        'secure' => true
    ],
    'contact' => [
        'controller' => 'contact',
        'secure' => true
    ],
    'professional' => [
        'controller' => 'professional',
        'secure' => false
    ],
    'purchase' => [
        'controller' => 'purchase',
        'secure' => true
    ],
    '404' => [
        'controller' => '404',
        'secure' => false
    ]
];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <script src="../Vue/script/script_log.js"></script>
    <link href="../Vue/style/common.css" type="text/css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if (!isset($routing[$page])) {
            $page = '404';
        }
    }
    else {
        $page = 'home';
    }

    $cssController = '../Vue/style/' . $routing[$page]['controller'] . '.css';

    if (file_exists($cssController)) {
        echo '<link href="' . $cssController . '" type="text/css" rel="stylesheet">';
    } else {
        echo 'File is missing';
    }
    ?>

    <title> Homepage </title>
</head>
<body>
<div class="wrapper">
    <div class="content">
        <div class="header">

        </div>
        <?php
            if ($routing[$page]['secure'] === true && !isset($_SESSION['name'])) {
                echo '<script language="javascript">';
                echo 'alert("Veuillez vous identifier pour pouvoir accéder à cette page")';
                echo '</script>';

                header("location: http://localhost/Projet/TrainApp/Controlleur/index.php?page=login");
            }

            $fileController = '../Vue/' . $routing[$page]['controller'] . '.php';

            if (file_exists($fileController)) {
                require($fileController);
            } else {
                echo 'File is missing';
            }
        ?>

    </div>
</div>
<div class="footer">
    <div class="footer-content">
        <div class="copyright">
            <p class="cop"> © Copyright 2015 Groupe 10 semaine Rush. All rights reserved. </p>
        </div>
    </div>
</div>
</body>
</html>