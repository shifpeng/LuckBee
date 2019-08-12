<?php
/**
 * 接口调用
 * ============================================================================
 * * 版权所有 蜘蛛行 * *
 * 网站地址: http://www.zhizhuchuxing.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和
 * 使用；不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * Author By: 倪宗锋
 * PhpStorm CurlInterface.php
 * Create By 2016/11/10 13:20 $
 */

namespace backend\components;


class CurlInterface
{
    protected $url = null;
    protected $verb = 'GET';
    protected $body = '';
    protected $requestLength = 0;
    protected $baseUrl = null;
    protected $timeOut = 200;
    protected $clientId = 1;//站点类型 1 微信
    protected $responseBody = null;//接收到的返回值
    protected $notReturn = false;   //是否有返回值
    protected $siteConfig = null;    //配置参数
    protected $curlGetInfo = null;//交易概要
    private $logMessage = '';  //日志内容
    private $curlOptHeader = 0; //是否返回头部信息
    private $bodyType = 1;
    private $cert = false;//是否使用证书
    private $certPem;
    private $keyPem;
    private $header = [];//请求报文头部

    /****************============类的初始化=============*******************/

    /**
     * @param null $body 2:xml
     * @param int $type 1:json 2:xml 3 发送原数据接收xml 4 发送原数据 接收json 5:都是原数据
     */
    public function __construct($body = null, $type = 1)
    {
        $this->setBody($body, $type);
        $this->setBaseUrl();
    }

    /*****************==========参数设置函数开始=========******************/
    /**
     * Function Description:设置是否返回头部信息
     * Function Name: setCurlOptHeader
     * @param $curlOptHeader
     *
     *
     * @author 倪宗锋
     */
    public function setCurlOptHeader($curlOptHeader)
    {
        $this->curlOptHeader = $curlOptHeader;
    }

    /**
     * Function Description:获取交易概要
     * Function Name: getCurlGetInfo
     *
     * @return null
     *
     * @author 倪宗锋
     */
    public function getCurlGetInfo()
    {
        return $this->curlGetInfo;
    }

    /**
     * Des:设置 函数报文头
     * Name: setHeader
     * @param $header
     * @author 倪宗锋
     */
    public function setHeader($header)
    {
        $this->header[] = $header;
    }

    /**
     * Function Description:获取返回值报文
     * Function Name: getResponseBody
     *
     * @return null
     *
     * @author 倪宗锋
     */
    public function getResponseBody()
    {
        return $this->responseBody;
    }

    /**
     * Function Description:获取全路径地址
     * Function Name: getUrl
     *
     * @return null
     *
     * @author 倪宗锋
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Function Description:设置路径 在baseUrl基础上
     * Function Name: setUrl
     * @param $url
     *
     *
     * @author 倪宗锋
     */
    public function setUrl($url)
    {
        $this->url = $this->baseUrl . $url;
    }

    /**
     * Function Description:设置过期时间
     * Function Name: setTimeOut
     * @param $timeOut
     *
     *
     * @author 倪宗锋
     */
    public function setTimeOut($timeOut)
    {
        $this->timeOut = $timeOut;
    }

    /**
     * Function Description:设置传值方式
     * Function Name: setVerb
     * @param $verb
     *
     *
     * @author 倪宗锋
     */
    public function setVerb($verb)
    {
        $this->verb = $verb;
    }

    /**
     * Function Description:设置baseUrl
     * Function Name: setBaseUrl
     * @param $baseUrl string
     *
     * @author 倪宗锋
     */
    public function setBaseUrl($baseUrl = '')
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * Function Description:获取BaseUrl
     * Function Name: getBaseUrl
     *
     * @return null
     *
     * @author 倪宗锋
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * Function Description:设置是否有返回值
     * Function Name: setNotReturn
     * @param $str
     *
     *
     * @author 倪宗锋
     */
    public function setNotReturn($str)
    {
        $this->notReturn = $str;
    }

    /**
     * Function Description:设置请求报文 $body 必须是个数组
     * Function Name: setBody
     * @param $body
     * @param $type int 1:json 2:xml 3 发送原数据接收xml 4 发送原数据 接收json 5:都是原数据,6:需要base64解密再json
     *
     * @author 倪宗锋
     */
    public function setBody($body, $type = 1)
    {
        $this->body = '';
        if (is_array($body)) {
            if ($type == 1) {
                $this->body = json_encode($body);
                $this->requestLength = strlen($this->body);
            } elseif ($type == 2) {
                $this->body = "<?xml version='1.0' encoding='UTF-8'?>";
                $this->body .= Util::arrayToXml($body);
                $this->requestLength = strlen($this->body);
            } elseif (in_array($type, array(3, 4, 5, 6))) {
                $this->body = $body;
            }
        } else {
            $this->body = $body;
        }
        $this->bodyType = $type;
    }

    /**
     * Function Description:设置ssl类型
     * Function Name: setCert
     * @param $certArr array
     *
     *
     * @author 倪宗锋
     */
    public function setCert($certArr)
    {
        $this->cert = true;
        $this->certPem = $certArr['SSLCERT_PATH'];
        $this->keyPem = $certArr['SSLKEY_PATH'];
    }

    /*****************==========参数设置函数结束=========******************/
    /*****************==========调用接口并返回结果===开始======******************/

    /**
     * Function Description:执行交易
     * Function Name: execute
     * @param $url  string   sap地址
     * @param $verb string 请求方式 post|get
     * @return array
     * @author nizongfeng
     * Modify Date:2016.11.10
     */
    public function execute($url, $verb = 'GET')
    {
        $this->verb = $verb;
        $this->url = $this->baseUrl . $url;

//        $this->logMessage .= date('Y-m-d H:i:s') . " Url : {$this->url}";
//        $this->logMessage .= '  Method:' . $this->verb . PHP_EOL;
//        if (is_array($this->body)) {
//            $this->logMessage .= "sendContent: " . print_r($this->body, 1) . PHP_EOL;
//        } else {
//            $this->logMessage .= "sendContent: {$this->body}" . PHP_EOL;
//        }

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
//                    $this->logMessage .= "current verb: {$this->verb}, is an invalid REST verb." . PHP_EOL;
                    break;
            }
        } catch (Exception $e) {
//            $this->logMessage .= $e->getMessage() . PHP_EOL;
        }
        curl_close($ch);
        $ch = null;
        return $this->getResult();
    }

    /**
     * Function Description:获取返回数据
     * Function Name: getResult
     *
     * //     * @return array|mixed
     *
     * @author nizongfeng
     * Modify Date:2016.11.10
     */
    public function getResult()
    {
        if (in_array($this->bodyType, array(1, 4))) {
            $return = json_decode($this->responseBody, true);

        } elseif (in_array($this->bodyType, array(2, 3))) {
            $return = Util::xmlToArray($this->responseBody);
        } elseif ($this->bodyType == 5) {
            $return = $this->responseBody;
        } else if ($this->bodyType == 6) {
            $return = json_decode(base64_decode($this->responseBody), true);
        } else {
            $return = '';
        }
        return $return;
    }

    /*******************=====GET传值=====********************/
    /**
     * Function Description:GET传值
     * Function Name: executeGet
     * @param $ch
     *
     * @return void
     *
     * @author nizongfeng 2016.11.10
     */
    protected function executeGet($ch)
    {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $this->doExecute($ch);
    }

    /*******************=====POST传值=====********************/
    /**
     * Function Description:POST传值
     * Function Name: executePost
     * @param $ch
     *
     * @return void
     *
     * @author nizongfeng 2016.11.10
     */
    protected function executePost($ch)
    {
//        curl_setopt($ch, CURLOPT_VERBOSE, true);
        curl_setopt($ch, CURLOPT_POST, true);
        if (is_array($this->body)) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($this->body));
        } else {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $this->doExecute($ch);
    }

    /*******************=====PUT传值=====********************/
    /**
     * Function Description:PUT传值
     * Function Name: executePut
     * @param $ch
     *
     *
     * @author 倪宗锋
     */
    protected function executePut($ch)
    {
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body);
        $this->doExecute($ch);
    }

    /*******************=====DELETE传值=====********************/
    /**
     * Function Description:DELETE传值
     * Function Name: executeDelete
     * @param $ch
     *
     *
     * @author 倪宗锋
     */
    protected function executeDelete($ch)
    {
        curl_setopt($ch, CURLOPT_POSTFIELDS, $this->body);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        $this->doExecute($ch);
    }

    /*******************=====传值及接收=====********************/
    /**
     * Function Description: 传值及接受数据
     * Function Name: doExecute
     * @param $curlHandle
     *
     * @return void
     *
     * @author nizongfeng 2015.12.08
     */
    protected function doExecute(&$curlHandle)
    {

        if ($this->verb != 'get') {
            $this->setCurlOpts($curlHandle);
        }
        if ($this->header != []) {
            curl_setopt($curlHandle, CURLOPT_HTTPHEADER, $this->header);
        }
        curl_setopt($curlHandle, CURLOPT_HEADER, $this->curlOptHeader);
        curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curlHandle, CURLOPT_TIMEOUT, $this->timeOut);

        //记录报文发送时间
        $sendTime = microtime(true);
        $this->responseBody = curl_exec($curlHandle);
        //记录报文返回时间
        $responseTime = microtime(true);
        $timeIncrement = round(floatval($responseTime - $sendTime), 3);
        //记录返回的报文信息
        $this->logMessage .= "response: {$this->responseBody}" . PHP_EOL;
        $curlInfo = curl_getinfo($curlHandle);
        $this->curlGetInfo = $curlInfo;
        if (empty($curlInfo['primary_port'])) {
            $curlInfo['primary_port'] = '';
        }
        $curlInfoStr = '';
        if (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_PORT']) {
            $curlInfoStr = " toIP {$curlInfo['primary_ip']}:{$curlInfo['primary_port']}";
            $curlInfoStr .= " selfIP {$_SERVER['SERVER_ADDR']} {$_SERVER['SERVER_PORT']}";
        }
        //记录通信信息及性能指标
        $this->logMessage .= "Info: " . json_encode($curlInfoStr) . PHP_EOL;
        $this->logMessage .= "sendTime: " . date('H:i:s', $sendTime) . " , responseTime: ";
        $this->logMessage .= date('H:i:s', $responseTime) . " , timeIncrement:" . $timeIncrement . 's'
            . PHP_EOL;
        $curlError = curl_error($curlHandle);
        if ($curlError) {
            $this->logMessage .= "Error: " . $curlError . PHP_EOL;
        }
    }

    /*******************=====头部设置=====********************/
    /**
     * Function Description:头部设置
     * Function Name: setCurlOpts
     * @param $curlHandle
     *
     *
     * @author 倪宗锋
     */
    protected function setCurlOpts(&$curlHandle)
    {
        if ($this->cert == 1) {
            //设置证书
            //使用证书：cert 与 key 分别属于两个.pem文件
            curl_setopt($curlHandle, CURLOPT_SSLCERTTYPE, 'PEM');
            curl_setopt($curlHandle, CURLOPT_SSLCERT, $this->certPem);
            curl_setopt($curlHandle, CURLOPT_SSLKEYTYPE, 'PEM');
            curl_setopt($curlHandle, CURLOPT_SSLKEY, $this->keyPem);
        }

    }
    /*****************==========调用接口并返回结果===结束======******************/
    //获取数组是几维数组
    private function getmaxdim($vDim)
    {
        if (!is_array($vDim)) return 0;
        else {
            $max1 = 0;
            foreach ($vDim as $item1) {
                $t1 = $this->getmaxdim($item1);
                if ($t1 > $max1) $max1 = $t1;
            }
            return $max1 + 1;
        }
    }

    public function __destruct()
    {
        if (defined('APP_MODULES_PATH')) {
            $file = APP_MODULES_PATH . '/runtime/log/curl/';
        } else {
            $file = APP_PATH . '/runtime/log/curl/';
        }
        if (file_exists($file) == false) {
            mkdir(iconv("UTF-8", "GBK", $file), 0777, true);
        }
        file_put_contents($file . date('Y-m-d') . '.log', $this->logMessage . PHP_EOL, FILE_APPEND);
    }

}

?>