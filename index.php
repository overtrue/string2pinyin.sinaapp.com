<?php
define('TIME_START', microtime(true));

include __DIR__ . '/vendor/autoload.php';

use Overtrue\Pinyin\Pinyin;

$str = html_entity_decode(strip_tags(trim($_GET['str'])));

$mmc = memcache_init();

if ($mmc == false) {
    echo "mc init failed\n";
} else {
    $key = date('Y-m-d');
    $log = memcache_get($mmc, $key) . "\n" . $str;

    memcache_set($mmc, $key, $log);

    if (!empty($_GET['log'])) {
        var_dump($log);exit;
    }
}

header('content-type:application/json;charset:utf-8');

$error = '';

if (empty($str)) {
    error('错误的请求,参数str不能为空。');
}

$api = array_get($_GET, 'api', 'convert');
$option = array_get($_GET, 'option', null);

switch ($api) {
    case 'convert':
    case 'name':
        if (empty($option)) {
            $option = PINYIN_NONE;
        }
        if (!in_array($option, array(PINYIN_NONE, PINYIN_ASCII, PINYIN_UNICODE))) {
            error('错误的 option.');
        }
        break;
    case 'permlink':
    case 'abbr':
        if (empty($option)) {
            $option = '-';
        }

        if (!is_string($option)) {
            error('错误的 option.');
        }
        break;
    case 'sentence':
        $option = (bool)$option;
        break;
    default:
        error('Invalid API.');
}


$pinyin = new Pinyin;

$result = $pinyin->{$api}($str, $option);

$array = array(
        'status'  => 'T',
        'str'     => $str,
        'result'  => $result
    );

header('X-Time-usage:' . (microtime(true) - TIME_START));
exit(json_encode($array));

function error($error)
{
    header("HTTP/1.0 400 Bad Request");
    exit(json_encode(array('status' => 'F', 'error' => $error , 'doc' => 'http://string2pinyin.sinaapp.com/doc.php')));
}

/**
 * Get an item from an array using "dot" notation.
 *
 * @param  array   $array
 * @param  string  $key
 * @param  mixed   $default
 * @return mixed
 */
function array_get($array, $key, $default = null)
{
    if (is_null($key)) return $array;

    if (isset($array[$key])) return $array[$key];

    foreach (explode('.', $key) as $segment) {
        if ( ! is_array($array) || ! array_key_exists($segment, $array)) {
            return $default;
        }

        $array = $array[$segment];
    }

    return $array;
}
