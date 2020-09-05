#!/usr/bin/php
<?php

include "conf.php";

$m[address] = "0x724d1b69a7ba352f11d73fdbdeb7ff869cb22e19";
$m[chainId] = 4;
$m[name] = "TellorTributes";
$m[symbol] = "TRB";
$m[decimals] = 18;
$m[logoURI] = "https://raw.githubusercontent.com/lxgn/uniswap-token-list-test/master/img/trb.png";
$out[] = $m;


$m[address] = "0xF22e3F33768354c9805d046af3C0926f27741B43";
$m[chainId] = 4;
$m[name] = "0x Protocol Token";
$m[symbol] = "ZRX";
$m[decimals] = 18;
$m[logoURI] = "https://raw.githubusercontent.com/lxgn/uniswap-token-list-test/master/img/zrx.png";
$out[] = $m;





$d = __DIR__;
foreach($a[tokens] as $v)
{
//    print_r($v);

    $t = $v[symbol];
    $t = strtolower($t);

    $m = $v;
    $m[logoURI] = "https://raw.githubusercontent.com/lxgn/uniswap-token-list-test/master/img/$t.png";
    $out[] = $m;

    $f = "$d/img/$t.png";
    if(!file_exists($f))
    {
    $b = file_get_contents($v[logoURI]);
    file_put_contents($f,$b);
    }
}
//$mas[name] = "ProBlkchnTknList";
$mas[name] = "1 lxgn";
//$mas[timestamp] = "2020-09-05T10:00:00+03:00";
$mas[timestamp] = date("Y-m-d")."T".date("H:i:s",time()-3600*3)."+00:00";
//$mas[timestamp] = date("Y-m-d")."T".date("H:i:s",time-3600)."+02:00";
$mas[version][major] = 1;
$mas[version][minor] = 0;
$mas[version][patch] = 0;

$mas[keywords][0] = "liksagen";
$mas[keywords][] = "default";
$mas[keywords][] = "list";
$mas[tokens] = $out;
$mas[logoURI] = "https://raw.githubusercontent.com/lxgn/uniswap-token-list-test/master/img/trb.png";

//print_r($out);
print_r($mas);

$l = 0;
$l += JSON_PRETTY_PRINT;
$l += JSON_UNESCAPED_SLASHES;
$txt = json_encode($mas,$l);

$f = "lxgn-token-list.json";
file_put_contents($f,$txt);
