<?php

$file_name=$_GET["p"];


include("function.php");

$raw_str=file_get_contents($file_name);
$raw_str=substr($raw_str,strpos($raw_str,"<script>")+8);
$raw_str=substr($raw_str,0,strpos($raw_str,"</script>"));
$raw_str=$func_var."\n".$raw_str;

$re_vn=substr($raw_str,0,strpos($raw_str,"function _v("));
$raw_str=$re_vn.$func_v.$func_n.substr($raw_str,strpos($raw_str,"function _p("));

$re_gwrt=substr($raw_str,0,strpos($raw_str,"function \$gwrt("));
$raw_str=$re_gwrt.$func_gwt.substr($raw_str,strpos($raw_str,"gra=\$gwrt(true);"));

$re_da=substr($raw_str,0,strpos($raw_str,"function _da("));
$raw_str=$re_da.$func_da.substr($raw_str,strpos($raw_str,"function _r("));

$re_o=substr($raw_str,0,strpos($raw_str,"function _o("));
$raw_str=$re_o.$func_o.substr($raw_str,strpos($raw_str,"function _1("));

$re_wfor=substr($raw_str,0,strpos($raw_str,"function wfor("));
$raw_str=$re_wfor.$func_wfor.substr($raw_str,strpos($raw_str,"function _ca("));

//preg_replace('/else\s+({\s+\w+\.wxVkey)/','if (1==1)',$raw_str);
//$raw_str=str_replace("<","&lt;",$raw_str);
//$raw_str=str_replace(">","&gt;",$raw_str);
//echo "<pre>".$raw_str."</pre>";
echo $raw_str."\n";

?>