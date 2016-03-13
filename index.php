<?php
define('TIME_START', microtime(true));

include __DIR__ . '/vendor/autoload.php';

use Overtrue\Pinyin\Pinyin;

$str = html_entity_decode(strip_tags(trim($_GET['str'])));

//file_put_contents(__DIR__ . '/logs/query'.date('Y-m-d').'.txt', $str."\n", FILE_APPEND);
$mmc=memcache_init();

if($mmc == false)
    echo "mc init failed\n";
else
{
    $key = date('Y-m-d');
    $log = memcache_get($mmc, $key) . "\n" . $str;
    memcache_set($mmc, $key, $log);
    if (!empty($_GET['log'])) {
        var_dump($log);exit;
    }
}

header('content-type:application/json; charset=utf-8');

if (empty($str)) {
    header("HTTP/1.0 400 Bad Request");
    exit(json_encode(array('status' => 'F', 'error' => '错误的请求,参数str不能为空。' , 'doc' => 'http://string2pinyin.sinaapp.com/doc.html')));
}


// 'delimiter'    => ' ',
// 'traditional'  => false,
// 'accent'       => true,
// 'letter'       => false,
// 'only_chinese' => false,
$setting = array(
        'accent'       => abs(array_get($_GET, 'accent', 1)),
        'delimiter'    => array_get($_GET, 'delimiter', ' '),
        'traditional'  => abs(array_get($_GET, 'traditional', 0)),
        'letter'       => abs(array_get($_GET, 'letter', 0)),
        'only_chinese' => abs(array_get($_GET, 'only_chinese', 0)),
    );

$pinyin = Pinyin::parse($str, $setting);

$array = array(
        'status'  => 'T',
        'str'     => $str,
        'pinyin'  => $pinyin['pinyin'],
    );

if (abs(array_get($_GET, 'letter', 0))) {
    $array['letter'] = $pinyin['letter'];
}

$array['setting'] = $setting;
$array['doc'] = 'http://string2pinyin.sinaapp.com/doc.html';

header('X-Time-usage:' . (microtime(true) - TIME_START));
exit(json_encode($array));

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
