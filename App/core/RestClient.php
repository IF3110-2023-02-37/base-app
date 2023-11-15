<?php

class RestClient {
    private static $baseUrl = "http://host.docker.internal:3000";

    public static function request($method, $endpoint, $data = null, $headers = []) {
      $url = self::$baseUrl . $endpoint;
      $ch = curl_init($url);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($ch, CURLOPT_USERAGENT, "");
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

      // Set the HTTP method
      curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);

      // include the data
      if ($data !== null) {
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
      }

      $response = curl_exec($ch);

      if (curl_errno($ch)) {
          echo 'Curl error: ' . curl_error($ch);
      }

      curl_close($ch);

      // Decode the JSON response 
      $result = json_decode($response, true);

      return $result;
    }
}

?>
