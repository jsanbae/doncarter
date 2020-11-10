<?php

namespace DonCarter;

use DonCarter\IMensaje;

class Mensaje implements IMensaje {

	private $mensaje;

	function __construct ($_mensaje) 
	{
		$this->mensaje = $_mensaje;
	}

	public function toString() 
	{
		return $this->mensaje;
	}
	
}