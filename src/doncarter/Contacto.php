<?php

namespace DonCarter;

class Contacto {

	private $email;
	private $nombre;

	function __construct (string $_email, string $_nombre = '') 
	{
		if (!filter_var($_email, FILTER_VALIDATE_EMAIL)) {
			throw new \Exception("Email ".$_email.' tiene formato inválido');
		}

		$this->email = $_email;
		$this->nombre = filter_var($_nombre, FILTER_SANITIZE_STRING);
	}

	/**
	 * Obtiene nombre del contacto
	 *
	 * @return string
	 */
	public function getNombre() 
	{
		return $this->nombre;
	}

	/**
	 * Obtiene Email del contacto
	 *
	 * @return string
	 */
	public function getEmail() 
	{
		return $this->email;
	}

	/**
	 * Entrega string contacto válido según formato RFC 2822
	 * 
	 * @return string
	 */
	public function getFormatRFC2822()
	{
		if ($this->nombre!='' and !is_null($this->nombre)) {
			$format_rfc2822 = $this->nombre . ' <'.$this->email.'>';
		} else {
			$format_rfc2822 = $this->email;
		}

		return $format_rfc2822;
	}
	
}