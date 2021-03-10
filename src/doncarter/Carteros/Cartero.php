<?php

namespace DonCarter\Carteros;

use DonCarter\ICartero;
use DonCarter\Sobre;

class Cartero implements ICartero {
	
	private $sobre;

	function __construct (Sobre $_sobre) 
	{ 
		$this->sobre = $_sobre;
	}

	/**
	 * Prepara cabeceras de correo
	 *
	 * @return array
	 */
	private function prepareHeaders()
	{
		$headers = [];
		$headers['Content-type'] = 'text/html; charset=iso-8859-1';
		$headers['from'] = $this->sobre->getRemitente()->getFormatRFC2822();

		if (count($this->sobre->getCc())) {
			$ccArray = [];
			foreach ($this->sobre->getCc() as $cc) {
				$ccArray[] = $cc->getFormatRFC2822();
			}
			$headers['cc'] = implode($ccArray, ',');
		}
		
		if (count($this->sobre->getBcc())) {
			$bccArray = [];
			foreach ($this->sobre->getBcc() as $bcc) {
				$bccArray[] = $bcc->getFormatRFC2822();
			}
			$headers['bcc'] = implode($bccArray, ',');
		}	

		return $headers;
	}

	/**
	 * Envía correo
	 *
	 * @return boolean
	 */
	public function enviar()
	{

		return mail(
			$this->sobre->getDestinatario()->getFormatRFC2822(), 
			$this->sobre->getAsunto(),
			$this->sobre->getMensaje()->toString(),
			$this->prepareHeaders()
		);

	}

}
