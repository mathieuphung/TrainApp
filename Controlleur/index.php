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
    'profile' => [
        'controller' => 'profile',
        'secure' => true
    ],
    'feedback' => [
        'controller' => 'feedback',
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

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    if (!isset($routing[$page])) {
        $page = '404';
    }
}
else {
    $page = 'home';
}

if ($routing[$page]['secure'] === true && !isset($_SESSION['name'])) {
    echo '<script language="javascript">';
    echo 'alert("Veuillez vous identifier pour pouvoir accéder à cette page")';
    echo '</script>';
}

$fileController = $routing[$page]['controller'] . '.php';

if (file_exists($fileController)) {
    require($fileController);
} else {
    echo 'File is missing';
}