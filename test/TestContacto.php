<?php

include('../src/doncarter/Contacto.php'); // must include if tests are for non OOP code

use DonCarter\Contacto;
use PHPUnit\Framework\TestCase;

class TestContacto extends Testcase {

    /*
     * Testing the addition function
     */
    public function testContactoInvalido()
    {
     
        $email = 'j@.c';
        $this->expectException("Exception");
        $contacto = new Contacto($email);
        $this->assertSame('j@.c', $contacto->getEmail());
    }

    /*
     * Testing the addition function
     */
    public function testContactoValido()
    {
     
        $email = 'jsanchez@gmail.com';
        $contacto = new Contacto($email);
        $this->assertSame($email, $contacto->getEmail());
    }
}
