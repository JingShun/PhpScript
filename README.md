# PHP Script
用PHP寫的一些script，有些要配合PhpLibraries


## 糖果主機
### SugarHosts_GoodLuck.php
糖果主機每8小時可以抽一次抽續費優惠碼

使用說明

需要自行微調成自己的版本，且需要自行設定排程來觸發，來做到自動化抽優惠碼

帳密自行調整

帳號: getenv('SUGARHOSTS_ACCOUNT')
密碼: getenv('SUGARHOSTS_PASSWD')

瀏覽網站的語法說明

$web->getUrl(`<<URL>>`, `<<POST DATA>>`, `<<其他參數，沒用到請忽略>>`, `<<是否使用SSL>>`);
