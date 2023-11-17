<?php

class RestClient {
    private static $baseUrl = "http://host.docker.internal:8091/subscription";
    private static $apikey = "gB9ACm8r5RZOBiN5ske9cBVjlVf";

    public static function getSubsWithSubscriber($subscriber) {
        $soapRequest = '
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:end="http://endpoint/">
            <soapenv:Header>
                <soapenv:Authorization>' . self::$apikey . '</soapenv:Authorization>
            </soapenv:Header>
            <soapenv:Body>
                <end:getSubsWithSubscriber>
                    <subscriber>' . $subscriber . '</subscriber>
                </end:getSubsWithSubscriber>
            </soapenv:Body>
        </soapenv:Envelope>
        ';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));

        // Send the request
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }

    public static function createSubs($podcaster,$subscriber) {
        $soapRequest = '
        <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:end="http://endpoint/">
            <soapenv:Header>
                <soapenv:Authorization>' . self::$apikey . '</soapenv:Authorization>
            </soapenv:Header>
            <soapenv:Body>
                <end:createPendingSubs>
                    <podcaster>' . $podcaster . '</podcaster>
                    <subscriber>' . $subscriber . '</subscriber>
                </end:createPendingSubs>
            </soapenv:Body>
        </soapenv:Envelope>
        ';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$baseUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $soapRequest);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/xml'));

        // Send the request
        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Curl error: ' . curl_error($ch);
        }

        curl_close($ch);

        return $response;
    }
}

?>