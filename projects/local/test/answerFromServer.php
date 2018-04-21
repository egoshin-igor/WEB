<?php
    // страничку, которую будем скачивать
$path = "http://f9r.ru";

    // сформируем хедер-запрос к серверу
$agent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; ru-RU; rv:1.7.12) Gecko/20050919 Firefox/1.0.7" ;
$header [] = "Accept: text/html;q=0.9, text/plain;q=0.8, image/png, */*;q=0.5";
$header [] = "Accept_charset: windows-1251, utf-8, utf-16;q=0.6, *;q=0.1";
$header [] = "Accept_encoding: identity";
$header [] = "Accept_language: ru-ru,ru;q=0.5";
$header [] = "Connection: close";
$header [] = "Cache-Control: no-store, no-cache, must-revalidate";
$header [] = "Keep_alive: 300";
$header [] = "Expires: Thu, 01 Jan 1970 00:00:01 GMT";

    // функция отделения хедера от страницы
function return_data($path){
$page = "";
$arr = explode ("\r\n\r\n", $path);
$heder = $arr[0];
while ( list ($key, $val) = @each ($arr)){
if ($key=='0'){ continue; }
$page .= $val."\n";
}
return array ($heder,$page); 
}

    // функция подключения CURL
function ext_dll($path){
$bibl_ext = dirname ($_SERVER['SCRIPT_FILENAME'])."/extensions/php_".$path.".dll";
if (! @extension_loaded ($path) and is_file ($bibl_ext)){ @dl ("php_".$path.".dll");}
if (! @extension_loaded ($path)){ return false;} 
return true;
}
$Curl_return = ext_dll('curl');

    // функция, использующая сокет
function output_r ($path){
global $header,$agent;
$arr = @parse_url ($path);
$host = $arr['host'];
if (! empty ($arr['path'])) $page = $arr['path'];
if (! empty ($arr['query'])) $query = $arr['query'];
if ($query!=''){$page.='?'.$query;}
if ($page==''){$page='/';}
$fp = @fsockopen ($host, 80, &$errno, &$errstr, 30);
if (!$fp){ return ''; }
$request = "GET $page HTTP/1.0\r\n";
$request .= "Host: $host\r\n";
while ( list ($key, $val) = @each ($header)){ $request .= $val."\r\n";}
$request .= "Referer: http://www.".$host."/\r\n";
$request .= "User-Agent: ".$agent."\r\n";
$request .= "\r\n";
fwrite ($fp,$request);
while ($line = fgets ($fp, 1024)){ $out .= $line; } 
return return_data($out);
}

    // функция, использующая CURL
function CurlPage ( $path ) {
global $agent,$header;
$arr = @parse_url ($path);
$ch = @curl_init ( $path );
@curl_setopt ( $ch , CURLOPT_RETURNTRANSFER , 1 );
@curl_setopt ( $ch , CURLOPT_VERBOSE , 1 ); 
@curl_setopt ( $ch , CURLOPT_HEADER , 1 );
@curl_setopt ( $ch , CURLOPT_USERAGENT , $agent );
@curl_setopt ( $ch , CURLOPT_REFERER , "http://www.".$arr['host']."/" );
@curl_setopt ( $ch , CURLOPT_HTTPHEADER , $header );
@curl_setopt ( $ch , CURLOPT_FOLLOWLOCATION , 1 );
@curl_setopt ( $ch , CURLOPT_SSL_VERIFYPEER, 0 );
@curl_setopt ( $ch , CURLOPT_SSL_VERIFYHOST, 0 );
$tmp = @curl_exec ( $ch );
@curl_close ( $ch ); 
if ($tmp==''){ $tmp = output_r ($path); }
return return_data($tmp);
}

    // применим эти функции
if ($Curl_return=='true'){ $array = CurlPage ( $path ); }
else { $array = output_r ( $path ); }

    // $array[0] - это хедер страницы
$heder = $array[0];
    // $array[1] - это сама страница
$page = $array[1];

    // узнаём кодировку из хедера
if ( preg_match ("~charset=([-\w\d]+)~i",$heder,$arrr)){ $charset_heder = trim ($arrr[1]); }
    // узнаём кодировку из страницы
if ( preg_match ("~<meta[ \r\n\t]{1}[ˆ>]*charset[ˆ=]*=".
"([ˆ \"'>\r\n\t#]+)[ '\"\n\r\t]*[ˆ>]*>~is", $page, $arrr)){ $charset_page = trim ($arrr[1]); }

    // если нет кодировки в странице, принимаем её из хедера
if ($charset_page == ''){$charset = $charset_heder;}
else {$charset = $charset_page;}

    // перевод символов из utf8 в win
function utf8_win($s) {return strtr ($s, array ("\xD0\xB0"=>"а", "\xD0\x90"=>"А", "\xD0\xB1"=>"б", "\xD0\x91"=>"Б", "\xD0\xB2"=>"в", "\xD0\x92"=>"В", "\xD0\xB3"=>"г", "\xD0\x93"=>"Г", "\xD0\xB4"=>"д", "\xD0\x94"=>"Д", "\xD0\xB5"=>"е", "\xD0\x95"=>"Е", "\xD1\x91"=>"ё", "\xD0\x81"=>"Ё", "\xD0\xB6"=>"ж", "\xD0\x96"=>"Ж", "\xD0\xB7"=>"з", "\xD0\x97"=>"З", "\xD0\xB8"=>"и", "\xD0\x98"=>"И", "\xD0\xB9"=>"й", "\xD0\x99"=>"Й", "\xD0\xBA"=>"к", "\xD0\x9A"=>"К", "\xD0\xBB"=>"л", "\xD0\x9B"=>"Л", "\xD0\xBC"=>"м", "\xD0\x9C"=>"М", "\xD0\xBD"=>"н", "\xD0\x9D"=>"Н", "\xD0\xBE"=>"о", "\xD0\x9E"=>"О", "\xD0\xBF"=>"п", "\xD0\x9F"=>"П", "\xD1\x80"=>"р", "\xD0\xA0"=>"Р", "\xD1\x81"=>"с", "\xD0\xA1"=>"С", "\xD1\x82"=>"т", "\xD0\xA2"=>"Т", "\xD1\x83"=>"у", "\xD0\xA3"=>"У", "\xD1\x84"=>"ф", "\xD0\xA4"=>"Ф", "\xD1\x85"=>"х", "\xD0\xA5"=>"Х", "\xD1\x86"=>"ц", "\xD0\xA6"=>"Ц", "\xD1\x87"=>"ч", "\xD0\xA7"=>"Ч", "\xD1\x88"=>"ш", "\xD0\xA8"=>"Ш", "\xD1\x89"=>"щ", "\xD0\xA9"=>"Щ", "\xD1\x8A"=>"ъ", "\xD0\xAA"=>"Ъ", "\xD1\x8B"=>"ы", "\xD0\xAB"=>"Ы", "\xD1\x8C"=>"ь", "\xD0\xAC"=>"Ь", "\xD1\x8D"=>"э", "\xD0\xAD"=>"Э", "\xD1\x8E"=>"ю", "\xD0\xAE"=>"Ю", "\xD1\x8F"=>"я", "\xD0\xAF"=>"Я"));}
    // перевод символов из ibm855 в win
function ibm855_win($s){return strtr ($s, array ("\xA1"=>"А", "\xA0"=>"а", "\xA3"=>"Б", "\xA2"=>"б", "\xEC"=>"В", "\xEB"=>"в", "\xAd"=>"Г", "\xAC"=>"г", "\xA7"=>"Д", "\xA6"=>"д", "\xA9"=>"Е", "\xa8"=>"е", "\x85"=>"Ё", "\x84"=>"ё", "\xEA"=>"Ж", "\xE9"=>"ж", "\xF4"=>"З", "\xF3"=>"з", "\xb8"=>"И", "\xB7"=>"и", "\xBE"=>"Й", "\xBD"=>"й", "\xC7"=>"К", "\xC6"=>"к", "\xD1"=>"Л", "\xD0"=>"л", "\xD3"=>"М", "\xD2"=>"м", "\xD5"=>"Н", "\xD4"=>"н", "\xD7"=>"О", "\xD6"=>"о", "\xDD"=>"П", "\xD8"=>"п", "\xE2"=>"Р", "\xE1"=>"р", "\xE4"=>"С", "\xE3"=>"с", "\xE6"=>"Т", "\xE5"=>"т", "\xE8"=>"У", "\xE7"=>"у", "\xAA"=>"ф", "\xAB"=>"Ф", "\xB6"=>"Х", "\xB5"=>"х", "\xA5"=>"Ц", "\xA4"=>"ц", "\xFC"=>"Ч", "\xFB"=>"ч", "\xFA"=>"Щ", "\xF9"=>"щ", "\xF6"=>"Ш", "\xF5"=>"ш", "\x9f"=>"Ъ", "\x9E"=>"ъ", "\xF2"=>"Ы", "\xF1"=>"ы", "\xEE"=>"Ь", "\xED"=>"ь", "\xF8"=>"Э", "\xF7"=>"э", "\x9d"=>"Ю", "\x9C"=>"ю", "\xE0"=>"Я", "\xDE"=>"я"));}

    // функция перевода страницы в кодировку windows-1251
function replace_page ($charset, $path){
if ( preg_match ("~windows-1251~i", $charset)){return $path;}
elseif ( preg_match ("~(koi8|iso-ir-111)~i", $charset)){return convert_cyr_string($path,'k','w');}
elseif ( preg_match ("~iso-8859-5~i", $charset)) {return convert_cyr_string($path,'i','w');}
elseif ( preg_match ("~ibm866~i", $charset)) {return convert_cyr_string($path,'a','w');}
elseif ( preg_match ("~x-mac-(cyrillic|ukrainian)~i", $charset)){return convert_cyr_string($path,'m','w');}
elseif ( preg_match ("~ibm855~i", $charset)) {return ibm855_win($path);}
elseif ( preg_match ("~utf-8~i", $charset)) {return utf8_win($path);}
return false;
}

    // переведём страницу в кодировку windows-1251
$page = replace_page ($charset, $page);

    // берём только тело документа между тегами <body></body>
if ( preg_match ("~<body[ˆ>]*>(.+)</body~is", $page, $array)){ 
    // печатаем свою верхушку
print "<html><head>
<base href=\"".$path."\">
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=windows-1251\">
<title>Кодировка страницы</title>
</head>
<body>
";

    // печатаем кодировку документа и перекодированное тело HTML документа
print $charset."<br>\n".$array[1];

    // печатаем низ страницы
print "</body></html>";
}
?>