# DonCarter ![Packagist PHP Version Support](https://img.shields.io/packagist/php-v/jsanbae/doncarter) ![GitHub](https://img.shields.io/github/license/jsan5709/doncarter) ![Travis (.com)](https://img.shields.io/travis/com/jsan5709/doncarter) ![GitHub issues](https://img.shields.io/github/issues/jsan5709/doncarter)

Es una interfaz abstracta muy simple para enviar correos en PHP, que nació como un ejercicio de abstracción en POO.


## Instalación

Puedes instalar DonCarter usando Composer:

```
composer require jsanbae/doncarter
```
Luego necesitarás:

    1. ejecuta composer install para tener las dependencias necesarias
    2. agregar el autoloader a tu aplicación usando: require("vendor/autoload.php")

Alternativamente tu puedes solo descargar simplemente la librería manualmente:

```
include('./Mensaje.php');
include('./Contacto.php');
include('./Sobre.php');
include('./Carteros/Cartero.php');
```


## Ejemplo de Uso
Todo parte con Mensaje, Remitente y un Sobre:

```
$asunto = 'Mi carta de navidad';
$mensaje = new Mensaje('Querido viejito pascuero: me he portado bien, dame regalos!');
$remitente = new Contacto('ninobienportado@gmail.com', 'Niño Bien Portado');
$destinatario = new Contacto('viejopascuero@polonorte.com', 'Santa Clauss');
$sobre = new Sobre($remitente, $destinatario, $asunto, $mensaje);
```

Luego le pasamos el sobre al cartero y el lo envía
```
$cartero = new Cartero($sobre);
$cartero->enviar();
```


## Cambia tu cartero
Por defecto DonCarter utiliza un Cartero con la función nativa mail() de PHP. Este puede ser reemplazada por el cartero que tu quieras.



## Contribución

Esto libreria es una muy simple que comenzó como un simple ejercicio, pero se que puede mejorar con contribuciones de quienes la usen. 

Sugiere tus propias mejoras, te invito a discutirlas en "Issues" antes de enviar tus "Pull Requests".

Los "Pull requests" para bugs siempre son bienvenidos, por favor explica tu bug que estás intentando corregir en el mensaje.

Hay solo algunas pruebas unitarias en el PHPUnit. Sería genial tener más tests para obtener mayor cobertura en otros casos. Sientete libre en contribuir con eso.


## Disclaimer

No, no está inspirado en Don Carter, pero puta que es gracioso el viejo ql :D
