<?php
class Api
{
    private $url;

    public function __construct ($url)
    {
        $this->url = $url;
    }

    public function getJsonFromApi ()
    {
        $curlQuery = curl_init();
        $curlOptions = [
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => 1
        ];
        curl_setopt_array($curlQuery, $curlOptions);
        $curlResult = curl_exec($curlQuery);
        curl_close($curlQuery);
        $curlResult = json_decode($curlResult);
        return $curlResult;
    }
}