<?php

namespace DonCarter\Carteros;

require_once('./methodin/Mailgun.php');

use Dotenv\Dotenv;

use DonCarter\ICartero;
use DonCarter\Sobre;

class CarteroMailgun implements ICartero {

	private $sobre;
	private $mailgun;

	function __construct (Sobre $_sobre) 
	{ 
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $domain = $_ENV['MAILGUN_DOMAIN'];
        $api_key = $_ENV['MAILGUN_API_KEY'];

		$this->mailgun = new Methodin\Mailgun($api_key, $domain);
		$this->sobre = $_sobre;
	}

	/**
	 * Envía correo
	 *
	 * @return boolean
	 */
	public function enviar()
	{
		$this->mailgun->sendMessage(
			[
				$this->sobre->getDestinatario()->getEmail(), 
				...$this->sobre->cc
			], 
			$this->sobre->getRemitente()->getEmail(), 
			$this->sobre->getAsunto(), 
			$this->sobre->getMensaje()->toString());
	}

}
