<?php

class RAPI {

    private $api_url;
    private $api_key;
    private $api_secret; 


    public function Load($key, $secret) {

        $this->api_url = "https://api.reactioon.com:1357";
        $this->api_key = $key;
        $this->api_secret = $secret;

        return $this;

    }

    public function Request($method, $path, $content) {

        $postData = http_build_query($content);

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $this->api_url . '/' . $path);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_ENCODING, "");
        curl_setopt($curl, CURLOPT_MAXREDIRS, 10);
        curl_setopt($curl, CURLOPT_TIMEOUT, 0);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        
        if ($method == "POST") {
            curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);
        }

        $headers = [
            'X-RTN-KEY: ' . $this->api_key,
            'X-RTN-SIGNATURE: ' . hash_hmac('sha256', $postData, $this->api_secret)
        ];

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;

    }

}

?>