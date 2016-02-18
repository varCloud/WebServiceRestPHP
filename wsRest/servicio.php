<?php
    require_once('lib/nusoap.php');
    require_once('funciones.php');    
  $server = new nusoap_server();
	$server->configureWSDL("servicio", "urn:servicio");

  $server->wsdl->addComplexType('datosVenta',
    'complexType',
    'struct',
    'all',
    '',
    array('idRangoXTipoCopiaBN'     => array('name' => 'idRangoXTipoCopiaBN', 'type' => 'xsd:int'),
          'cantidadCopiasBN'        => array('name' => 'cantidadCopiasBN', 'type' => 'xsd:int'),
          'costoCopiasBN'           => array('name' => 'costoCopiasBN', 'type' => 'xsd:int'),
          'idCatTipoCopia'          => array('name' => 'idCatTipoCopia', 'type' => 'xsd:int'),
          'idPorcentajeCopiaColor'  => array('name' => 'idPorcentajeCopiaColor', 'type' => 'xsd:int'),
          'cantidadCopiasColor'     => array('name' => 'cantidadCopiasColor', 'type' => 'xsd:int'),
          'costoCopiasColor'        => array('name' => 'costoCopiasColor', 'type' => 'xsd:int'),
    ));
            $server->register("registrarDetalleVenta",
                          array("datosVenta" => "tns:datosVenta","cantidadCopiasTotal" => "xsd:int","TotalVentas" => "xsd:int"),
                          array("return" => "xsd:string"),
                          "urn:servicio",
                          "urn:servicio#registrarDetalleVenta",//nombre de la funcion definida en algun lugar
                          "rpc",
                          "encoded",
                          "registra una venta detallada");

        $server->register("calculadora",
        array("x" => "xsd:string","y" => "xsd:string","operacion" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:servicio",
        "urn:servicio#calculadora",
        "rpc",
        "encoded",
        "es una suma");

        $server->register("registrarVentaTotal",
        array("cantidadCopiasTotal" => "xsd:float","TotalVentas" => "xsd:float"),
        array("return" => "xsd:string"),
        "urn:servicio",
        "urn:servicio#registrarVentaTotal",
        "rpc",
        "encoded",
        "REGISTRA UNA VENTA TOTAL");



        $server->register("registrarDetalleVentaIndividual",
        array("idVenta" => "xsd:int","idRangoXTipoCopiaBN" => "xsd:int","cantidadCopiasBN" => "xsd:int",
              "costoCopiasBN" => "xsd:float","idCatTipoCopia" => "xsd:int","idPorcentajeCopiaColor" => "xsd:int",
              "cantidadCopiasColor" => "xsd:int","costoCopiasColor" => "xsd:float"),
        array("return" => "xsd:int"),
        "urn:servicio",
        "urn:servicio#registrarDetalleVentaIndividual",
        "rpc",
        "encoded",
        "es una suma");

  
    $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
    $server->service($HTTP_RAW_POST_DATA);
  /*


    /*
    $server->register("calculadora",
        array("x" => "xsd:string","y" => "xsd:string","operacion" => "xsd:string"),
        array("return" => "xsd:string"),
        "urn:servicio",
        "urn:servicio#calculadora",
        "rpc",
        "encoded",
        "es una suma");*/

   /* $server->register("registrarVenta",
        array("cantidadCopiasTotal" => "xsd:int","TotalVentas" => "xsd:int"),
        array("return" => "xsd:int"),
        "urn:servicio",
        "urn:servicio#registrarVenta",
        "rpc",
        "encoded",
        "registra una venta");

/*idVenta
idRangoXTipoCopiaBN
cantidadCopiasBN
costoCopiasBN
idCatTipoCopia
idPorcentajeCopiaColor
cantidadCopiasColor
costoCopiasColor



$server->register(  'calculo_edad', // nombre del metodo o funcion
                    array('datosVenta' => 'tns:datosVenta','TotalVentas' => 'xsd:int'), // parametros de entrada
                    array('return' => 'tns:datos_persona_salidad'), // parametros de salida
                    'urn:mi_ws1', // namespace
                    'urn:hellowsdl2#calculo_edad', // soapaction debe ir asociado al nombre del metodo
                    'rpc', // style
                    'encoded', // use
                    'La siguiente funcion recibe los parametros de la persona y calcula la Edad' // documentation
);*/



?>