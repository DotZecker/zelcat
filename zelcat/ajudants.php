<?php

/**
 * Print and Die
 * Te hace un print_r formateado y para la ejecución del código
 *
 * @param  array  $array
 * @return void
 */
function pd($array)
{
	echo "<code>";
		echo "<pre>";
			print_r($array);
		echo "</pre>";	
	echo "</code>";
	
	die();
}