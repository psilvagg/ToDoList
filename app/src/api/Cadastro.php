<?php
session_start();
require_once '../models/Usuario.php';
require_once '../config/functions.php';

use App\Models\Usuario;

if (empty($_POST)) {
    jsonResponse(false, 'Requisição Inválida', 'Requisição inválida.');
}

if (empty($_POST['nomeUsuario']) || empty($_POST['emailUsuario']) || empty($_POST['senhaUsuario']) || empty($_POST['confSenhaUsuario'])) {
    jsonResponse(false, 'Campos Obrigatórios', 'Todos os campos são obrigatórios.');
}

if (is_numeric($_POST['nomeUsuario'])) {
    jsonResponse(false, 'Atenção', 'O nome não pode conter números.');
}

if (!filter_var($_POST['emailUsuario'], FILTER_VALIDATE_EMAIL)) {
    jsonResponse(false, 'Atenção', 'E-mail inválido.');
}

if (!senhaValida($_POST['senhaUsuario'])) {
    jsonResponse(false, 'Atenção', 'Sua senha deve possuir pelo menos uma letra minúscula, uma letra maiúscula, um número e no mínimo 8 caracteres.');
}

if ($_POST['senhaUsuario'] != $_POST['confSenhaUsuario']) {
    jsonResponse(false, 'Atenção', 'As senhas não conferem.');
}

$uuid = uuidUsuario();
$info = detectorDispositivo();
$nomeUsuario = $_POST['nomeUsuario'];
$emailUsuario = $_POST['emailUsuario'];
$senhaUsuario = $_POST['senhaUsuario'];

$Usuario = new Usuario($uuid, $nomeUsuario, $emailUsuario, $senhaUsuario, $ip);

if ($Usuario->cadastrarUsuario()) {
    if ($Usuario->registrarDispositivo($uuid, $ip, $tipo, $navegador, $so)) {
        $_SESSION['email-temp'] = $emailUsuario;
        jsonResponse(true, 'Conta criada!', 'Sua conta foi criada. Por favor, confirme seu cadastro.');
    }
} else {
    jsonResponse(false, 'Atenção', 'E-mail já cadastrado.');
}
