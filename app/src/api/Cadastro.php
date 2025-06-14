<?php
session_start();
require_once '../models/Usuario.php';
require_once '../config/functions.php';

use App\Models\Usuario;

header('Content-Type: application/json');

if (empty($_POST)) {
    echo json_encode([
        'success' => false,
        'messages' => ['Requisição inválida.']
    ]);
    exit;
}

if (empty($_POST['nomeUsuario']) || empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario']) || empty($_POST['confSenhaUsuario'])) {
    jsonResponse(false, 'Campos Obrigatórios', 'Todos os campos são obrigatórios.');
}

if ($_POST['senhaUsuario'] != $_POST['confSenhaUsuario']) {
    jsonResponse(false, 'Atenção', 'As senhas não conferem.');
}

if (is_numeric($_POST['nomeUsuario'])) {
    jsonResponse(false, 'Atenção', 'O nome não pode conter números.');
}

if (!filter_var($_POST['emailUsuario'], FILTER_VALIDATE_EMAIL)) {
    jsonResponse(false, 'Atenção', 'E-mail inválido.');
}

$uuid = uuidUsuario();
$info = detectorDispositivo();
$ip = $info['ip'];
$nomeUsuario = $_POST['nomeUsuario'];
$emailUsuario = $_POST['emailUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];

$Usuario = new Usuario($uuid, $nomeUsuario, $emailUsuario, $senhaUsuario, $ip);

if ($Usuario->CadastroUsuario()) {
    $_SESSION['email-temp'] = $emailUsuario;
    jsonResponse(true, 'Atenção', 'Sua conta foi criada. Por favor, confirme seu cadastro.');
} else {
    jsonResponse(false, 'Atenção', 'E-mail já cadastrado.');
}
