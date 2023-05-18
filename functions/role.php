<?php

function user_role($id){


try{
	$sql = "SELECT * FROM users a
			INNER JOIN user_role b
			ON a.id = b.user_id
			INNER JOIN role c
			ON b.user_role = c.id_role
			WHERE a.id = {$id};";
	$usr = pg_query($sql);
	$u = pg_fetch_array($usr);

	if($u > 0){
		return $u['role'];
	}
	else
		return false;
}
catch (Exception $e) {
    echo 'Caught exception: ' .  $e->getCode();
   }

};