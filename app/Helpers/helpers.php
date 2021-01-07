<?php

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
