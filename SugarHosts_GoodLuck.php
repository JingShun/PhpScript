<?php
/*
糖果主機自動抽續費優惠碼
說明

需要自行微調成自己的版本

帳密自行調整
帳號: getenv('SUGARHOSTS_ACCOUNT')
密碼: getenv('SUGARHOSTS_PASSWD')

瀏覽網站的語法說明
$web->getUrl('<<URL>>', <<POST DATA>>, <<其他參數，沒用到請忽略>>, <<是否使用SSL>>);

*/

require_once __DIR__ . '/../config.php';
use App\Libraries\WebClient;

$web = new WebClient();

// 取得token
$html = $web->getUrl('https://www.sugarhosts.com/members/clientarea.php', [], [], true);
$token = getToken($html);


// 登入
$html = $web->getUrl('https://www.sugarhosts.com/members/dologin.php', [
    'token' => $token,
    'username' => getenv('SUGARHOSTS_ACCOUNT'),
    'password' => getenv('SUGARHOSTS_PASSWD'),
], [], true);


// 我的續費優惠碼
$html = $web->getUrl('https://www.sugarhosts.com/members/goodluck.php', [], [], true);
$token = getToken($html);

if (strpos($html, '試試手氣!') !== false) {
    // 是手氣
    $html = $web->getUrl('https://www.sugarhosts.com/members/goodluck.php', [
        'token' => $token,
        'action' => 'goodluck',
    ], [], true);
    echo '試試手氣!';
} else if (strpos($html, 'class="luckybuttondisabled"') !== false) {
    echo '已試過!!';
} else {
    echo '異常!!';
    echo $html;
}

function getToken($html)
{
    // var csrfToken = 'b1df1a68711a101252611c3ea132d7607c3332a5',
    if (preg_match("/var csrfToken = '(.*?)',/s", $html, $matches)) {
        return $matches[1];
    } else {
        return '';
    }
}
