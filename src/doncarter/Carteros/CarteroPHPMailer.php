<?php

namespace DonCarter\Carteros;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

use DonCarter\ICartero;
use DonCarter\Sobre;

class CarteroPHPMailer implements ICartero {

    function __construct (Sobre $_sobre) 
	{
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        $this->phpmailer = new PHPMailer(true);

        //Config
        $this->phpmailer->SMTPDebug = SMTP::DEBUG_SERVER;// Enable verbose debug output
        $this->phpmailer->isSMTP();
        $this->phpmailer->Host = $_ENV['SMTP_HOST'];
        $this->phpmailer->Port = $_ENV['SMTP_PORT'];
        $this->phpmailer->SMTPAuth   = $_ENV['SMTP_AUTH'];
        $this->phpmailer->Username   = $_ENV['MAIL_USERNAME'];
        $this->phpmailer->Password   = $_ENV['MAIL_PASSWORD'];
        $this->phpmailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        $this->sobre = $_sobre;
    }

    /**
    * Envía correo
    *
    * @return boolean
    */
    public function enviar()
    {
        try {

            // Remitente
            $this->phpmailer->setFrom($this->sobre->getRemitente()->getEmail(), $this->sobre->getRemitente()->getNombre());
            // Destinatario
            $this->phpmailer->addAddress($this->sobre->getDestinatario()->getEmail(), $this->sobre->getDestinatario()->getNombre());
        
            // Contenido
            $this->phpmailer->isHTML(true);
            $this->phpmailer->Subject = $this->sobre->getAsunto();
            $this->phpmailer->Body = $this->sobre->getMensaje()->toString();
        
            $this->phpmailer->send();

        } catch (\Exception $e) {
            throw new Exception("Message could not be sent. Mailer Error: {$mail->ErrorInfo}");
        }
    }

}