# SugarHostsScript
用於糖果主機的一些script



## 自動抽續費優惠碼
糖果主機每8小時可以抽一次抽續費優惠碼


### PHP版: SugarHosts_GoodLuck.php
使用說明

需要自行微調成自己的版本

帳密自行調整

帳號: getenv('SUGARHOSTS_ACCOUNT')
密碼: getenv('SUGARHOSTS_PASSWD')

瀏覽網站的語法說明

$web->getUrl(`<<URL>>`, `<<POST DATA>>`, `<<其他參數，沒用到請忽略>>`, `<<是否使用SSL>>`);
