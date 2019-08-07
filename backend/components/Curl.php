<?php

class Curl
{
    public function execute($url, $verb = 'GET')
    {
        $this->verb = $verb;
        $this->url = $this->baseUrl . $url;

        $this->logMessage .= date('Y-m-d H:i:s') . " Url : {$this->url}";
        $this->logMessage .= '  Method:' . $this->verb . PHP_EOL;
        if (is_array($this->body)) {
            $this->logMessage .= "sendContent: " . print_r($this->body, 1) . PHP_EOL;
        } else {
            $this->logMessage .= "sendContent: {$this->body}" . PHP_EOL;
        }

        $ch = curl_init($this->url);
        try {
            switch (strtoupper($this->verb)) {
                case 'GET':
                    $this->executeGet($ch);
                    break;
                case 'POST':
                    $this->executePost($ch);
                    break;
                case 'PUT':
                    $this->executePut($ch);
                    break;
                case 'DELETE':
                    $this->executeDelete($ch);
                    break;
                default:
                    $this->logMessage .= "current verb: {$this->verb}, is an invalid REST verb." . PHP_EOL;
                    break;
            }
        } catch (\Exception $e) {
            $this->logMessage .= $e->getMessage() . PHP_EOL;
        }
        curl_close($ch);
        $ch = null;
        return $this->getResult();
    }
}