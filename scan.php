<?php
/**
 * Created by PhpStorm.
 * User: dell
 * Date: 2016/11/4
 * Time: 10:48
 */
require 'vendor/autoload.php';
$client = new GuzzleHttp\Client();
$csv = League\Csv\Reader::createFromPath($argv[1]);
foreach ($csv as $csvRow) {
    try{
        $res = $client->get($csvRow[0]);
        if ($res->getStatusCode() >= 400) {
            throw new Exception();
        }
    }catch (Exception $exception)
    {
        echo $csvRow[0].'is dead url.'.PHP_EOL;
    }
}