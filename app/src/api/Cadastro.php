<?php
require_once '../models/Usuario.php';
require_once '../config/functions.php';

use App\Models\Usuario;

header('Content-Type: application/json');

if (empty($_POST['nomeUsuario']) || empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario']) || empty($_POST['confSenhaUsuario'])) {
    echo json_encode([
        'success' => false,
        'messages' => ['Nome, e-mail, senha e confirmação de senha são obrigatórios.']
    ]);
    exit;
}

if ($_POST['senhaUsuario'] != $_POST['confSenhaUsuario']) {
    echo json_encode([
        'success' => false,
        'messages' => ['As senhas não conferem.']
    ]);
    exit;
}

if (is_numeric($_POST['nomeUsuario'])) {
    echo json_encode([
        'success' => false,
        'messages' => ['O nome de usuário não pode conter números.']
    ]);
    exit;
}

if (!filter_var($_POST['emailUsuario'], FILTER_VALIDATE_EMAIL)) {
    echo json_encode([
        'success' => false,
        'messages' => ['O e-mail informado não é válido.']
    ]);
    exit;
}

$uuid = uuidUsuario();
$info = detectorDispositivo();
$ip = $info['ip'];
$nomeUsuario = $_POST['nomeUsuario'];
$emailUsuario = $_POST['emailUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];

$Usuario = new Usuario($uuid, $nomeUsuario, $emailUsuario, $senhaUsuario, $ip);

if ($Usuario->CadastroUsuario()) {
    echo json_encode([
        'success' => true,
        'messages' => ['Sua conta foi criada, por favor confirme seu cadastro.']
    ]);
} else {
    echo json_encode([
        'success' => false,
        'messages' => ['E-mail já cadastrado.']
    ]);
}
