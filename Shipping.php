<?php
class Shipping
{
	
	public static function parseLine($line)
	{
		$a = [ ];
		
		$a['1'] = substr($line, 0, 2);
		$a['2'] = substr($line, 2, 6);
		$a['3'] = substr($line, 6, 6);

		return $a;
	}
}
