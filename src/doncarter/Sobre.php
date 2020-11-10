<?php

namespace DonCarter;

use DonCarter\Contacto;
use DonCarter\Mensaje;
use DonCarter\Adjunto;

class Sobre {

	private $remitente;
	private $destinatario;
	private $asunto;
	private $mensaje;
	private $adjunto;
	private $cc;
	private $bcc;

	function __construct (Contacto $_remitente, Contacto $_destinatario, string $_asunto, Mensaje $_mensaje, array $_cc = [], array $_bcc = [], Adjunto $_adjunto = null) 
	{
		$this->remitente = $_remitente;
		$this->destinatario = $_destinatario;
		$this->asunto = filter_var($_asunto, FILTER_SANITIZE_STRING);
		$this->mensaje = $_mensaje;
		$this->adjunto = $_adjunto;
		$this->cc = $_cc;
		$this->bcc = $_bcc;
	}

	public function getAsunto() 
	{
		return $this->asunto;
	}

	public function getRemitente() 
	{
		return $this->remitente;
	}

	public function getDestinatario() 
	{
		return $this->destinatario;
	}

	public function getMensaje() 
	{
		return $this->mensaje;
	}

	public function getCc() 
	{
		$ccArray = [];
		foreach ($this->cc as $email) {
			if ($email instanceof Contacto) {
				$ccArray[] = $email;
			} else {
				$ccArray[] = new Contacto($email);
			}
		}

		return $ccArray;
	}

	public function getBcc() 
	{
		$bccArray = [];
		foreach ($this->bcc as $email) {
			if ($email instanceof Contacto) {
				$bccArray[] = $email;
			} else {
				$bccArray[] = new Contacto($email);
			}
		}
		return $bccArray;
	}
	
	public function getAdjunto() 
	{
		return $this->adjunto;
	}

}