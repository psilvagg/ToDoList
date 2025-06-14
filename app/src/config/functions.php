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
