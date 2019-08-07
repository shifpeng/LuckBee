<?php
/**
 * Function Description:api通用方法类
 * Function Name: Util
 * ${PARAM_DOC}
 *
 * @return ${TYPE_HINT}
 * ${THROWS_DOC}
 *
 * @author 娄梦宁
 */

namespace backend\components;

use backend\modules\api\models\LvmamaOrderConnect;
use backend\modules\api\models\OperaProduct;
use backend\modules\api\models\OrderMain;
use backend\modules\api\models\OrderTitle;
use common\models\Msg;
use common\models\Utils;
use Yii;

class Util
{
    private static $base_url = 'http://api.lvmama.com/distributorApi/2.0/api/';//驴妈妈api环境地址
    private static $appKey = 'ZHIZHUCHUXING';//驴妈妈对应的分销商编号
    private static $secret = '45b12b93ac5d699c41f9e89b62fb9678';
//    private static $appKey = 'ZHIZHUXING';//驴妈妈对应的分销商编号
//    private static $secret = 'b80e9a9de0acbefc6f4d652f6f726c11';
    private static $secretZyb = 'TESTFX';
    private static $base_url_zyb = 'http://zyb-zff.sendinfo.com.cn/boss/service/code.htm';//智游宝api环境地址

    /**
     * Function Description:驴妈妈对接签名
     * Function Name: SingForLvmama
     * @param $time
     *
     * @return string
     *
     * @author 娄梦宁
     */
    public static function SingForLvmama($time)
    {
        $secret = self::$secret;
        $result = md5($secret . $time . $secret);
        return $result;
    }

    /*
     * 获取私有静态属性
     */
    public function __get($name)
    {
        return $this->$name;
    }

    public static function getBaseUrl()
    {
        return self::$base_url;
    }

    public static function getAppKey()
    {
        return self::$appKey;
    }

    public static function getSecret()
    {
        return self::$secret;
    }

    public static function getBaseUrlZyb()
    {
        return self::$base_url_zyb;
    }

    /*
     * 处理xml中的cdada标签
     */
    public static function doCdada($str)
    {
        $a = strrpos($str, "[") + 1;
        $b = strpos($str, "]");
        $c = substr($str, $a, $b - $a);
        return $c;
    }

    /**
     * Function Description:数组转换成xml
     * Function Name: arrayToXml
     * @param $array
     * @param $key
     * @return string
     *
     * @author 娄梦宁
     */
    public static function arrayToXml($array, $key = '')
    {
        $string = '';
        if (count($array) == 0) {
            return '';
        }
        foreach ($array as $k => $v) {
            if (is_array($v) && isset($v['0'])) {
                $string .= self::arrayToXml($v, $k);//是数组或者对像就的递归调用
            } else {
                if ($key != '') {
                    $k = $key;
                }
                $string .= '<' . $k . '>';
                if (is_array($v) || is_object($v)) {//判断是否是数组，或者，对像
                    $string .= self::arrayToXml($v);//是数组或者对像就的递归调用
                } elseif (is_numeric($v)) {
                    $string .= $v;
                } elseif ($v != '') {
                    $string .= '<![CDATA[' . $v . ']]>';
                } else {
                    $string .= '';
                }
                $string .= '</' . $k . '>';
            }
        }
        return $string;
    }

    public static function arrayToXmlForLvmama($array)
    {
        $string = '';
        foreach ($array as $k => $v) {
            $string .= '<' . $k . '>';
            if (is_array($v) || is_object($v)) {//判断是否是数组，或者，对像
                $string .= self::arrayToXmlForLvmama($v);//是数组或者对像就的递归调用
            } elseif (is_numeric($v)) {
                $string .= $v;
            } else {
                $string .= $v;
            }
            $string .= '</' . $k . '>';
        }
        return $string;
    }

    /**
     * Function Description:xml转换成json
     * Function Name: xmlToJson
     * @param $source
     *
     * @return string
     *
     * @author 娄梦宁
     */
    public static function xmlToJson($source)
    {
        if (is_file($source)) { //传的是文件，还是xml的string的判断
            $xml_array = simplexml_load_file($source);
        } else {
            $xml_array = simplexml_load_string(trim($source));
        }
        $json = json_encode($xml_array, true);
        return $json;
    }

    /**
     * Function Description:xml转换成array
     * Function Name: xmlToArray
     * @param $source
     *
     * @return mixed
     *
     * @author 娄梦宁
     */
    public static function xmlToArray($source)
    {
        libxml_disable_entity_loader(true);
        $getResult = json_decode(json_encode(simplexml_load_string(trim($source), 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $getResult;
    }

    /**
     * Function Description:智游宝签名算法
     * Function Name: SingForZyb
     * @param $xmlMsg
     *
     * @return string
     *
     * @author 娄梦宁
     */
    public static function SingForZyb($xmlMsg)
    {
        $secret = self::$secretZyb;
        $result = md5("xmlMsg=" . $xmlMsg . $secret);
        $result = strtolower($result);
        return $result;
    }

    /**
     * Function Description:根据驴妈妈的规则换算退款截止日期
     * Function Name: countRefundTime
     * @param $num
     *
     * @return array
     *
     * @author 娄梦宁
     */
    public static function countRefundTime($num)
    {
        if ($num > 0) {
            $day = floor(($num / 60) / 24) + 1;
            $time = 24 - ($num / 60) % 24;
        } else {
            $num = -$num;
            $day = 0 - floor(($num / 60) / 24);
            $time = ($num / 60) % 24;
        }
        if ($time == 0 or $time == 24) {
            $time = '23:59';
        } else {
            $time = $time . ':00';
        }
        return ['day' => $day, 'time' => $time];
    }

    /**
     * Function Description:驴妈妈创建订单接口
     * Function Name: CreateOrderForLvmama
     * @param $partnerOrderNo
     * 蜘蛛子订单id
     * @param $orderAmount
     *订单总额
     * @param $productId
     *产品id 对应蜘蛛主产品code
     * @param $goodsId
     * 商品id 对应蜘蛛子产品code
     * @param $quantity
     * 订单人数
     * @param $visitDate
     * 订单出发日期
     * @param $sellPrice
     * 蜘蛛付给驴妈妈的结算价，对应订单成本价
     * @param $name
     * @param $mobile
     * @param $credentials
     *
     * @return mixed
     *
     * @author 娄梦宁
     */
    public static function CreateOrderForLvmama($partnerOrderNo, $orderAmount, $productId, $goodsId, $quantity, $visitDate, $sellPrice, $name, $mobile, $credentials, $credentialsType)
    {
        //请求参数构建
        $time = time();
        $appKey = self::getAppKey();
        $sign = self::SingForLvmama($time);
        $order_info = [
            'request' => [
                'orderInfo' => [
                    'partnerOrderNo' => $partnerOrderNo,
                    'orderAmount' => $orderAmount,
                    'product' => [
                        'productId' => $productId,
                        'goodsId' => $goodsId,
                        'quantity' => $quantity,
                        'visitDate' => $visitDate,
                        'sellPrice' => $sellPrice
                    ],
                    'booker' => [
                        'name' => $name,
                        'mobile' => $mobile,
                    ],
                    'travellers' => [
                        'traveller' => [
                            'name' => $name,
                            'credentialsType' => $credentialsType,
                            'credentials' => $credentials,
                            'mobile' => $mobile,
                        ],
                    ]
                ]]];
        $order_info = self::arrayToXmlForLvmama($order_info);
        $get_data = array(
            "appKey" => $appKey,
            'messageFormat' => 'Xml',
            'timestamp' => $time,
            'sign' => $sign,
            'request' => $order_info,
        );
        $url_param = http_build_query($get_data);
        file_put_contents(__DIR__ . '/../log/lvmama/' . date("Y-m-d") . '.log', date("Y-m-d H:i:s") . '下单记录：请求地址  ' . self::getBaseUrl() . 'ticket/createOrder?' . $url_param . PHP_EOL, FILE_APPEND);
        $result = file_get_contents(self::getBaseUrl() . 'ticket/createOrder?' . $url_param);
        $result = self::xmlToJson($result);
        file_put_contents(__DIR__ . '/../log/lvmama/' . date("Y-m-d") . '.log', date("Y-m-d H:i:s") . '下单记录  ' . $result . PHP_EOL, FILE_APPEND);
        return json_decode($result, true);
    }

    /**
     * Function Description:驴妈妈支付订单
     * Function Name: OrderPayment
     * @param $partnerOrderNo
     * 蜘蛛订单号
     * @param $orderId
     * 驴妈妈订单号
     * @param $serialNum
     *支付流水号
     * @return mixed
     *
     * @author 娄梦宁
     */
    public static function OrderPayment($partnerOrderNo, $orderId, $serialNum)
    {
        $util = new Util();
        //请求参数构建
        $time = time();
        $appKey = $util->getAppKey();
        $sign = $util::SingForLvmama($time);
        $order = [
            'request' => [
                'order' => [
                    'partnerOrderNo' => $partnerOrderNo,
                    'orderId' => $orderId,
                    'serialNum' => $serialNum
                ]
            ]
        ];
        $order = $util::arrayToXmlForLvmama($order);
//        $url = $util->getBaseUrl() . 'order/orderPayment' . "?appKey=" . $appKey . "&messageFormat=Xml&timestamp=" . $timestamp . "&sign=" . $sign . "&request=" . $order;
        $get_data = array(
            "appKey" => $appKey,
            'messageFormat' => 'Xml',
            'timestamp' => $time,
            'sign' => $sign,
            'request' => $order,
        );
        $url_param = http_build_query($get_data);
        $result = file_get_contents($util->getBaseUrl() . 'order/orderPayment?' . $url_param);
        $result = self::xmlToJson($result);
        return json_decode($result, true);
    }

    /**
     * Function Description:申请退款接口
     * Function Name: actionOrderCancel
     *
     *
     * @author 娄梦宁
     */
    public static function OrderCancelForLvmama($PartnerOrderNo, $orderId)
    {
        $util = new Util();
        //请求参数构建
        $time = time();
        $appKey = $util->getAppKey();
        $timestamp = $time;
        $sign = $util::SingForLvmama($time);
        $url = $util->getBaseUrl() . '/ticket/orderCancel' . "?appKey=" . $appKey . "&messageFormat=json&timestamp=" . $timestamp . "&sign=" . $sign . "&PartnerOrderNo=" . $PartnerOrderNo . "&orderId=" . $orderId;
        $result = Utils::httpRequest($url);
        $result = json_decode($result, true);
        return $result;
//        if ($result['state']['code'] == '1000') {
//            if ($result['order']['requestStatus'] == 'PASS') {
//                return '已退款';
//            } elseif ($result['order']['requestStatus'] == 'REVIEWING') {
//                return '审核中';
//            } else {
//                return '申请驳回  ' . $result['order']['refundInfo'];
//            }
//        }
    }


    /**
     * Function Description:门票产品下单后判断是否是驴妈妈，是驴妈妈则去驴妈妈下单
     * Function Name: LvmamaOrderCheck
     * @param $order_id
     *
     * @return bool
     *
     * @author 娄梦宁
     */
    public function LvmamaOrderCheck($order_id)
    {
        $order_main = new OrderMain();
        //查看是否是驴妈妈产品
        $org_id = $order_main::find()->select('a.base_price,b.prod_code,b.org_id')->from('order_main a')->
        leftJoin('opera_product as b', 'a.prod_id=b.prod_id')->where(['a.order_id' => $order_id])->asArray()->one();
        if ($org_id['org_id'] != 1369) {//非驴妈妈产品，不处理
            return true;
        }
        $lvmama_order_connect = new LvmamaOrderConnect();
        $lvmama_order_info_select = [
            'partnerOrderNo' => 'order_id',
            'cnt' => 'count(prod_id)',
            'visitDate' => 'run_date',
            'sellPrice' => 'base_price',
            'name' => 'customer_name',
            'mobile' => 'customer_mobile',
            'credentials' => 'customer_id_no',
            'goodsId' => '(select prod_code from opera_product where prod_id=a.prod_id)',
            'orderAmount' => '(count(prod_id)*base_price)',
            'customer_id_type'
        ];
        $lvmama_order_info = $order_main::find()->select($lvmama_order_info_select)
            ->from('order_main a')
            ->where(['and', ['=', 'parent_order_id', $order_id], ['=', 'cancel_flag', 0]])
            ->groupBy('prod_id')
            ->asArray()
            ->all();
        $memo = '';
        $error_code = 0;
        foreach ($lvmama_order_info as $key => $val) {
            if ($val['customer_id_type'] == 153) {
                $credentialsType = 'HUZHAO';
            } else {
                $credentialsType = 'ID_CARD';
            }
            $orderAmount = (int)$val['sellPrice'] * $val['cnt'];
            $org_result = $this::CreateOrderForLvmama($val['partnerOrderNo'], $orderAmount, $org_id['prod_code'], $val['goodsId'], $val['cnt'], $val['visitDate'], $val['sellPrice'],
                $val['name'], $val['mobile'], $val['credentials'], $credentialsType);
            if ($org_result['state']['code'] != 1000) {
                $memo .= $val['prod_name'] . $org_result['state']['message'] . $org_result['state']['solution'] . '   ';
                $error_code = 1;
            } else {
                $lvmama_order_connect->istConnect($order_id, $val['partnerOrderNo'], $org_result['order']['orderId']);
                $memo .= '驴妈妈订单号：' . $org_result['order']['orderId'] . '   ';
                //去驴妈妈支付该订单
                $serialNum = $org_result['order']['orderId'] . '-' . time();
                $pay_lvmama = Util::OrderPayment($val['partnerOrderNo'], $org_result['order']['orderId'], $serialNum);
                if ($pay_lvmama['state']['code'] != 1000) {
                    $memo .= '驴妈妈支付异常' . $pay_lvmama['state']['message'] . $pay_lvmama['state']['solution'] . '   ';
                    $error_code = 1;
                }
            }
        }
        //驴妈妈下单或者支付失败预警短信
        if ($error_code == 1) {
            $content = "预警：驴妈妈后台直连门票下单失败，订单号({$order_id})，请及时处理。";
            $phone_arr = [
                '13757163513',
                '18317023071',
                '13564184647',
                '15088913683',
//                '18106523772',//该手机号已经取消 modify nizf
            ];
            foreach ($phone_arr as $phone) {
                Msg::sendTelMsg($phone, $content);
            }
        }
        $result = $order_main::updateAll(['CUSTOMER_MEMO' => $memo], ['=', 'order_id', $order_id]);
        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * Des:调用蜘蛛出行接口
     * Name: interfaceZzcx
     * @param $order_id int 订单id
     * @param $order_type int 订单类型 1：车 ，2：门票 ，3 酒店 ，4 ：巴士自由行
     * @return array
     * @author 娄梦宁
     */
    public static function interfaceZzcx($order_id, $order_type)
    {
        #1、获取org_id 渠道ID
        if (in_array($order_type, [1, 2, 3])) {
            $orderTab = new OrderMain();
            $org_id = $orderTab->getOutsideSaleOrgId($order_id);
        } elseif ($order_type == 4) {
            $orderTab = new OrderTitle();
            $info = $orderTab->getTitleInfoById($order_id);
            $org_id = $info['outside_sale_org_id'];
        } else {
            return ['code' => 1, 'info' => '类型错误'];
        }
        if (empty($org_id)) {
            return ['code' => 1, 'info' => '非需要通知的渠道'];
        }
        #2、获取渠道ID对应的通知地址
        $config = Yii::$app->params;
        if (empty($config['wechat_notice_list'][$org_id])) {
            return ['code' => 0, 'info' => '订单无需通知'];
        }
        $host = $config['wechat_notice_list'][$org_id];
        #3、发送请求
        $time = time();
        $data = [
            'time' => $time,
            'order_id' => $order_id,
            'type' => $order_type,
        ];//当前服务器时间 校验60秒后失效
        $param = [
            'code' => self::authCode(http_build_query($data), 'ENCODE'),//对数据进行加密
            'time' => $time
        ];
        $wechat_url = $host . '/zzcx/interfaces/cs/cancel-order';
        $result = Utils::httpRequest($wechat_url, $param);
        return json_decode($result, true);
    }

    /**
     * Des：通知微信确认酒店订单
     * Name: interfaceZzcx
     * @param $order_id int 订单id
     * @return array
     * @author 娄梦宁
     */
    public static function confirmHotelOrder($order_id)
    {
        $time = time();
        $data = [
            'time' => $time,
            'order_id' => $order_id,
        ];//当前服务器时间 校验60秒后失效
        $param = [
            'code' => self::authCode(http_build_query($data), 'ENCODE'),//对数据进行加密
            'time' => $time
        ];
        $wechat_url = Yii::$app->params['wechat_url'] . '/zzcx/interfaces/cs/confirm-hotel-order';
        $result = Utils::httpRequest($wechat_url, $param);
        return json_decode($result, true);
    }

    /** Function Description:加密解密函数
     * Function Name: authCode
     * @param $string
     * @param string $operation
     * @param int $expiry
     * @return string
     * @author 倪宗锋
     */
    static function authCode($string, $operation = 'DECODE', $expiry = 0)
    {
        $key = 'udM5A8S50eg8veH15dd0m601de7073N8Bcn7d1I8Res7C7o7z274D6y342I4C7t7';
        $ckey_length = 4;    // 随机密钥长度 取值 0-32;
        // 加入随机密钥，可以令密文无任何规律，即便是原文和密钥完全相同，加密结果也会每次不同，增大破解难度。
        // 取值越大，密文变动规律越大，密文变化 = 16 的 $ckey_length 次方
        // 当此值为 0 时，则不产生随机密钥

        $key = md5($key);
        $keya = md5(substr($key, 0, 16));
        $keyb = md5(substr($key, 16, 16));
        $keyc = $ckey_length ? ($operation == 'DECODE' ? substr($string, 0, $ckey_length) : substr(md5(microtime()), -$ckey_length)) : '';

        $cryptkey = $keya . md5($keya . $keyc);
        $key_length = strlen($cryptkey);

        $string = $operation == 'DECODE' ? base64_decode(substr($string, $ckey_length)) : sprintf('%010d', $expiry ? $expiry + time() : 0) . substr(md5($string . $keyb), 0, 16) . $string;
        $string_length = strlen($string);

        $result = '';
        $box = range(0, 255);

        $rndkey = array();
        for ($i = 0; $i <= 255; $i++) {
            $rndkey[$i] = ord($cryptkey[$i % $key_length]);
        }

        for ($j = $i = 0; $i < 256; $i++) {
            $j = ($j + $box[$i] + $rndkey[$i]) % 256;
            $tmp = $box[$i];
            $box[$i] = $box[$j];
            $box[$j] = $tmp;
        }

        for ($a = $j = $i = 0; $i < $string_length; $i++) {
            $a = ($a + 1) % 256;
            $j = ($j + $box[$a]) % 256;
            $tmp = $box[$a];
            $box[$a] = $box[$j];
            $box[$j] = $tmp;
            $result .= chr(ord($string[$i]) ^ ($box[($box[$a] + $box[$j]) % 256]));
        }

        if ($operation == 'DECODE') {
            if ((substr($result, 0, 10) == 0 || substr($result, 0, 10) - time() > 0) && substr($result, 10, 16) == substr(md5(substr($result, 26) . $keyb), 0, 16)) {
                return substr($result, 26);
            } else {
                return '';
            }
        } else {
            return $keyc . str_replace('=', '', base64_encode($result));
        }

    }

    /**
     * Function Description:自由行产品检查特定日期产品是否已过预订时间
     * Function Name: checkBookTime
     * @param $pre_days
     * @param $pre_time
     * @param $date
     *
     * @return bool
     *
     * @author 娄梦宁
     */
    public static function checkBookTime($pre_days, $pre_time, $date)
    {
        $tmp_date = date('Y-m-d', strtotime($date) - 3600 * 24 * $pre_days);
        $tmp_date_time = $tmp_date . ' ' . $pre_time;
        if (strtotime($tmp_date_time) > time()) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Function Description:返回成功数组数据
     * Function Name: returnArrSu
     * @param string $msg 提示信息
     * @param string|array $data 需要传递的数据
     * @param string $code 错误码
     *
     * @return array
     *
     * @author 倪宗锋
     */
    public static function returnArrSu($msg = '', $data = '', $code = '')
    {
        $return = array();
        $return['flag'] = true;
        $return['msg'] = $msg;
        $return['code'] = $code;
        $return['data'] = $data;
        return $return;
    }

    /**
     * Function Description:返回错误数组数据
     * Function Name: returnArrEr
     * @param string $msg 提示信息
     * @param string|array $data 需要传递的数据
     * @param string $code 错误码
     *
     * @return array
     *
     * @author 倪宗锋
     */
    public static function returnArrEr($msg = '', $data = '', $code = '')
    {
        $return = array();
        $return['flag'] = false;
        $return['msg'] = $msg;
        $return['code'] = $code;
        $return['data'] = $data;
        return $return;
    }


    /**
     * Function Description:返回身份证相关信息
     * Function Name: getIDCardInfo
     * @param string $IDCard 身份证号
     * @param string $datestr 指定日期
     * @return array
     *
     * @author 倪宗锋
     */
    //得到身份证相关信息
    //$datestr 指定日期  （结果为指定日期与出生日期之间的年龄s）
    public static function getIDCardInfo($IDCard, $datestr = '')
    {
        $datestr = $datestr == '' ? date('Y-m-d') : $datestr;
        $tdate = '';
        $msg = [
            0 => '未知错误',
            1 => '身份证格式错误',
            2 => '身份证合法'
        ];
        $result['code'] = 0;//0：未知错误，1：身份证格式错误，2：无错误
        $result['msg'] = '未知错误';
        $result['birthday'] = '';//生日，格式如：2012-11-15
        if (!preg_match("/^[1-9]([0-9a-zA-Z]{17}|[0-9a-zA-Z]{14})$/", $IDCard)) {
            $result['code'] = 1;
            $result['msg'] = $msg[$result['code']];
            return $result;
        } else {
            if (strlen($IDCard) == 18) {
                $tyear = intval(substr($IDCard, 6, 4));
                $tmonth = intval(substr($IDCard, 10, 2));
                $tday = intval(substr($IDCard, 12, 2));
                if ($tyear > date("Y") || $tyear < (date("Y") - 100)) {
//                    $flag=0;
                } elseif ($tmonth < 0 || $tmonth > 12) {
//                    $flag=0;
                } elseif ($tday < 0 || $tday > 31) {
//                    $flag=0;
                } else {
                    $tmonth = $tmonth >= 10 ? $tmonth : '0' . $tmonth;
                    $tday = $tday >= 10 ? $tday : '0' . $tday;
                    $tdate = $tyear . "-" . $tmonth . "-" . $tday;
                    if ((time() - mktime(0, 0, 0, $tmonth, $tday, $tyear)) > 18 * 365 * 24 * 60 * 60) {
//                        $flag=0;
                    } else {
//                        $flag=1;
                    }
                }
            } elseif (strlen($IDCard) == 15) {
                $tyear = intval("19" . substr($IDCard, 6, 2));
                $tmonth = intval(substr($IDCard, 8, 2));
                $tday = intval(substr($IDCard, 10, 2));
                if ($tyear > date("Y") || $tyear < (date("Y") - 100)) {
//                    $flag=0;
                } elseif ($tmonth < 0 || $tmonth > 12) {
//                    $flag=0;
                } elseif ($tday < 0 || $tday > 31) {
//                    $flag=0;
                } else {
                    $tmonth = $tmonth >= 10 ? $tmonth : '0' . $tmonth;
                    $tday = $tday >= 10 ? $tday : '0' . $tday;
                    $tdate = $tyear . "-" . $tmonth . "-" . $tday;
                    if ((time() - mktime(0, 0, 0, $tmonth, $tday, $tyear)) > 18 * 365 * 24 * 60 * 60) {
//                        $flag=0;
                    } else {
//                        $flag=1;
                    }
                }
            }
        }

        $sex = substr($IDCard, 16, 1) / 2 ? '男' : '女';

        $result['code'] = 2;//0：未知错误，1：身份证格式错误，2：无错误
        $result['msg'] = $msg[$result['code']];
        $result['sex'] = $sex;
        $result['cardId'] = $IDCard;
        $result['birthday'] = $tdate;//生日日期
        $result['old'] = static::yearMinus($tdate, $datestr);
        return $result;
    }

    public static function yearMinus($startDate, $endDate)
    {
        $y1 = date('Y', strtotime($startDate));
        $m1 = date('m', strtotime($startDate));
        $d1 = date('d', strtotime($startDate));

        $y2 = date('Y', strtotime($endDate));
        $m2 = date('m', strtotime($endDate));
        $d2 = date('d', strtotime($endDate));

        $year = $y2 - $y1;
        if ($m1 > $m2) {
            $year--;
        } else if ($m1 === $m2) {
            if ($d1 > $d2) {
                $year--;
            }
        } else {
        }
        return $year;
    }
}

