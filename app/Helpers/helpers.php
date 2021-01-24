<?php

//Constante le nombre Max

define('LIMITE_MEMBER',5);



//La function generer le numero unique 
function unique_code_membre($limit = 13)
{
  return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
//echo unique_code(9);
//La function generer le numero aleatoire de validation
function unique_code_transaction()
{
	return random_int(1000000000,9999999999);
}

function code_name()
{
	$code = random_int(0,9999);
	if($code < 10)
		return '000'.$code;
	if($code < 100)
		return '00'.$code;
	if($code < 1000)
		return '0'.$code;
	if($code > 1000)
		return $code;

}

function formatNumber($number){
	return number_format($number);
}

function setActiveRouter($route){

	return Route::is($route) ? 'active' : '';
}


