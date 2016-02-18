<?php

include ('conexion/conexion.php');


    function calculadora($x, $y, $operacion){
        if($operacion == "suma")
            return $x + $y;
        else if($operacion == "suma")
            return $x + $y;
        else if($operacion == "resta")
            return $x - $y;
        else if($operacion == "multiplica")
            return $x * $y;
        else if($operacion == "divide")
            return $x / $y;
        return 0;

    }
    	
    function registrarVentaTotal($cantidadCopiasTotal, $TotalVentas)
    {
    	$db = new MySQL();
    	$fechaactual = date('Y/m/d H:i:s');
        $sql='INSERT INTO ventas  values("","'.$fechaactual.'",'.$cantidadCopiasTotal.','.$TotalVentas.')';
        $consulta = $db->consulta($sql);
        $id=mysql_insert_id();
        return $id;

    }	

    function registrarDetalleVentaIndividual($idVenta,$idRangoXTipoCopiaBN,$cantidadCopiasBN,$costoCopiasBN,$idCatTipoCopia,$idPorcentajeCopiaColor,$cantidadCopiasColor,$costoCopiasColor)
    {
    		$db = new MySQL();
    		$sql = 'INSERT INTO detallesventa values ("",'.$idVenta.','.$idRangoXTipoCopiaBN.','.$cantidadCopiasBN.','.$costoCopiasBN.','.$idCatTipoCopia.','.$idPorcentajeCopiaColor.','.$cantidadCopiasColor.','.$costoCopiasColor.')';
			$consulta = $db->consulta($sql);
            return 1;

    }

    function registrarDetalleVenta($datosVenta ,$cantidadCopiasTotal, $TotalVentas)
    {
		$msg="";
		$id=0;
		foreach($datosVenta as $key => $value){     
			$msg .= 'idRangoXTipoCopiaBN '. $value['idRangoXTipoCopiaBN'] .' costoCopiasColor: ' . $value['costoCopiasColor'] . '  ==== <br />'.
			'la cantidad de copias totales es'.$cantidadCopiasTotal.'   ==== <br /> la venta es de $'.$TotalVentas; 
		}
		
		$db = new MySQL();
		$fechaactual = date('Y/m/d H:i:s');
        $sql='INSERT INTO VENTAS  values("","'.$fechaactual.'",'.$cantidadCopiasTotal.','.$TotalVentas.')';
		//return $sql;
        $consulta = $db->consulta($sql);
		$id=mysql_insert_id();

		foreach ($datosVenta as $key => $value){
			
				$idRangoXTipoCopiaBN	=	$value['idRangoXTipoCopiaBN'] == "NULL" ? null : $value['idRangoXTipoCopiaBN'];
				$cantidadCopiasBN	=	$value['cantidadCopiasBN']== "NULL" ? null : $value['cantidadCopiasBN'];
				$costoCopiasBN	=	$value['costoCopiasBN']== null ? "NULL" : $value['costoCopiasBN'];
				$idCatTipoCopia	=	$value['idCatTipoCopia']== null ? "NULL" : $value['idCatTipoCopia'];
				$idPorcentajeCopiaColor	=	$value['idPorcentajeCopiaColor']== null ? "NULL" : $value['idPorcentajeCopiaColor'];
				$cantidadCopiasColor	=	$value['cantidadCopiasColor']== null ? "NULL" : $value['cantidadCopiasColor'];
				$costoCopiasColor	=	$value['costoCopiasColor']=="" ? "NULL" : $value['costoCopiasColor'];
			
			$sql = 'INSERT INTO detallesventa values ("",'.$id.','.$idRangoXTipoCopiaBN.','.$cantidadCopiasBN.','.$costoCopiasBN.','.$idCatTipoCopia.','.$idPorcentajeCopiaColor.','.$cantidadCopiasColor.','.$costoCopiasColor.')';
			$consulta = $db->consulta($sql);
		}
		return  "1";
		
    }



?>