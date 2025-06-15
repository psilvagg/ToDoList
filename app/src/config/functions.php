<?php
require '../../../libs/autoload.php';

use Ramsey\Uuid\Provider\Node\RandomNodeProvider;
use Ramsey\Uuid\Uuid;

function uuidUsuario()
{
    $nodeProvider = new RandomNodeProvider();
    $uuid = Uuid::uuid1($nodeProvider->getNode());
    return $uuid;
}

use DeviceDetector\ClientHints;
use DeviceDetector\DeviceDetector;
use DeviceDetector\Parser\Device\AbstractDeviceParser;

function detectorDispositivo()
{
    AbstractDeviceParser::setVersionTruncation(AbstractDeviceParser::VERSION_TRUNCATION_NONE);

    $userAgent = $_SERVER['HTTP_USER_AGENT'];
    $clientHints = ClientHints::factory($_SERVER);
    $dd = new DeviceDetector($userAgent, $clientHints);
    $dd->parse();

    $ip = $_SERVER['REMOTE_ADDR'];
    $tipo = ucfirst($dd->getDeviceName());
    $browser = $dd->getClient('family');
    $osInfo = $dd->getOs('family');
    $model = $dd->getBrandName() . ' ' . $dd->getModel();

    return [
        'ip' => $ip,
        'deviceType' => $tipo,
        'browser' => $browser,
        'os' => $osInfo,
        'model' => $model
    ];
}

function jsonResponse($success, $title, $description = '', $duration = 5000, $data = [])
{
    $response = [
        'success' => $success,
        'status' => $success ? 'success' : 'error',
        'title' => $title,
        'description' => $description,
        'duration' => $duration,
        'timestamp' => date('Y-m-d H:i:s'),
        'data' => is_array($data) ? (object)$data : $data
    ];
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    exit;
    # jsonResponse(true, 'Campo Obrigatório', 'O nome é obrigatório.');
}


function senhaValida($senha)
{
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[\w$@]{8,}$/', $senha);
    # Pelo menos um letra minúscula
    # Pelo menos um letra maiúscula
    # Pelo menos um número
    # Pelo menos 8 caracteres                                   
}

function salvarLogs($uuidUsuario, $uuidDispositivo, $acaoLog, $descricaoLog) {
    
}
