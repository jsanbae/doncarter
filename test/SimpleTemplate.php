<?php 

class SimpleTemplate {

	private $data;

    function __construct($_data)
	{
		$this->data = $_data;
	}

    private function defineStyle()
    {
        $styles = 
<<< Styles
<link href="https://fonts.googleapis.com/css2?family=Spartan:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Tamma+2&family=Open+Sans&display=swap" rel="stylesheet"> 
<style>
    body {
        background-color:#ffcaca;
        padding-top: 40px;
        font-family: 'Open Sans', sans-serif;
    }
    dl {
        margin-bottom: 3rem;
    }
    dt {
        color:gray;
        font-weight: bold;
    }
    dd {
        font-size: .9rem;
    }
    dd {
        margin-left: 0;
        margin-bottom: 1em;
    }
    hr {
        margin: 10px auto 10px auto;
        width: 80%;
        border: 0;
        height: 1px;
        background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(179, 179, 179, 0.75), rgba(0, 0, 0, 0));
    }
    footer {
        margin: 30px auto 30px auto;
        text-align: center;
        font-size: 12px;
        color:dimgray;
    }
    .center {
        margin: auto;
        width: 50%;
    }
    .text-center {
        text-align: center;
    }
    .title {
        padding-bottom: 20px;
        font-family: 'Baloo Tamma 2', cursive;
        font-weight: lighter;
        font-size: 35px;
        overflow-wrap: break-word;
        line-height: 2.5rem;
    }
    .message {
        background-color: white;
        border: 1px solid #d5dde2;
        padding: 30px;
        color: #646464;
    }
    .message__title {
        padding: 20px auto;
        font-size: 28px;
    }
    .message__title--sub {
        font-size: 14px;
        font-weight: bold;
    }
    .message__body {
        padding: 20px;
        font-size: 14px;
        margin: auto;
        width: 80%;
    }
    .button {
        display: inline-block;
        border: none;
        padding: 1rem 2rem;
        margin: 0;
        text-decoration: none;
        background: #0069ed;
        color: #ffffff;
        font-family: sans-serif;
        font-size: 1rem;
        line-height: 1;
        cursor: pointer;
        text-align: center;
        transition: background 250ms ease-in-out, transform 150ms ease;
        -webkit-appearance: none;
        -moz-appearance: none;
    }
    .button:hover,
    .button:focus {
        background: #0053ba;
    }
    .button:focus {
        outline: 1px solid #fff;
        outline-offset: -4px;
    }
    .button:active {
        transform: scale(0.99);
    }
</style>
Styles;

        return $styles;
    }

	public function getTemplate() 
	{
        $template = 
<<< Template

        <h1 class="title text-center">Orden de Compra con errores</h1>
        <div class="message center">
            <h1 class="message__title text-center">OC #{$this->data->nrorden}</h1>
            <div class="message__body text-center">
                <dl>
                    <dt>Errores</dt>
Template;

    foreach ($this->data->errores as $error) {
        $template .= "<dd>" . $error . "</dd>";
    }

        $template .= 
<<< Template
                </dl>
                <h2 class="message__title--sub">¿Qué hacemos ahora?</h2>
                <p>Comuníquese con el área de Informatica de PEFER (<a href="mailto:soporte@pefer.cl">soporte@pefer.cl</a>) para solucionar este problema.</p>
            </div>
        </div>
        <footer>
            <strong>© 2020 - Agencia de Aduanas PEFER Limitada</strong><br />
            Mensaje generado automáticamente, favor no responder este mensaje.
        </footer>
Template;        

        return utf8_decode($template);
    }

}