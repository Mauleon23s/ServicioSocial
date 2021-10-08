<?php
require_once '../../sql/conexion.php';
$conexion = $mysqli;
    

if(isset($_POST['periodo_'])){

    $periodo_ = $conexion->real_escape_string($_POST['periodo_']);
    $resultado = $conexion->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.periodo='$periodo_'     GROUP BY cursos.curso");
    $reprobados = $conexion->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.periodo='$periodo_' AND usuario_curso.calificacion=5 GROUP BY cursos.curso");
}elseif (isset($_POST['data1']) || isset($_POST['data2'])) {
    $date1 = $conexion->real_escape_string($_POST['data1']);
    $date2 = $conexion->real_escape_string($_POST['data2']);
    $resultado = $conexion->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.fecha_registro BETWEEN '$date1 00:00:00' AND '$date2 23:59:59'  GROUP BY cursos.curso");
    $reprobados = $conexion->query("SELECT cursos.curso, periodo_curso.periodo ,periodo_curso.fecha_inicio,periodo_curso.fecha_fin, COUNT(usuario_curso.id_usuario_curso) FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos ON cursos.id_curso=periodo_curso.id_curso WHERE periodo_curso.fecha_registro BETWEEN '$date1 00:00:00' AND '$date2 23:59:59' AND usuario_curso.calificacion=5 GROUP BY cursos.curso");
}else{
     echo "No se encontraron registros";
    exit();
}

	if($resultado->num_rows > 0 ){
						
		date_default_timezone_set('America/Mexico_City');

		if (PHP_SAPI == 'cli')
			die('Este archivo solo se puede ver desde un navegador web');

		/** Se agrega la libreria PHPExcel */
		require_once 'lib/PHPExcel.php';

		// Se crea el objeto PHPExcel
		$objPHPExcel = new PHPExcel();

		// Se asignan las propiedades del libro
		$objPHPExcel->getProperties()->setCreator("Codedrinks") //Autor
							 ->setLastModifiedBy("Codedrinks") //Ultimo usuario que lo modificó
							 ->setTitle("Reporte Excel con PHP y MySQL")
							 ->setSubject("Reporte Excel con PHP y MySQL")
							 ->setDescription("Reporte")
							 ->setKeywords("reporte alumnos carreras")
							 ->setCategory("Reporte excel");

		$tituloReporte = "UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO "."
FACULTAD DE ESTUDIOS SUPERIORES ACATLÁN";
		$a1 = "Reporte "; 
		$titulosColumnas = array('NO.', 'Curso','Periodo','Fecha inicio','Fecha fin', 'Numero de alumnos', 'Aprobados','Reprobados','OBSERVACION');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:H1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',  $tituloReporte)
					->setCellValue('A5',  $a1)
        		    ->setCellValue('A7',  $titulosColumnas[0])
		            ->setCellValue('B7',  $titulosColumnas[1])
        		    ->setCellValue('C7',  $titulosColumnas[2])
            		->setCellValue('D7',  $titulosColumnas[3])
            		->setCellValue('E7',  $titulosColumnas[4])
            		->setCellValue('F7',  $titulosColumnas[5])
            		->setCellValue('G7',  $titulosColumnas[6])
            		->setCellValue('H7',  $titulosColumnas[7])
            		->setCellValue('I7',  $titulosColumnas[8]);
		
		//Se agregan los datos de los alumnos
		$i = 8;
		$n = 1;	
		while ($fila = $resultado->fetch_array() AND $var2 = $reprobados->fetch_array() ) {
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$i,  $n++)
        		    ->setCellValue('B'.$i,  $fila['curso'])
        		    ->setCellValue('C'.$i,  $fila['periodo'])
        		    ->setCellValue('D'.$i,  $fila['fecha_inicio'])
        		    ->setCellValue('E'.$i,  $fila['fecha_fin'])
		            ->setCellValue('F'.$i,  $fila['COUNT(usuario_curso.id_usuario_curso)'])
        		    ->setCellValue('G'.$i,  $fila['COUNT(usuario_curso.id_usuario_curso)']-$var2['COUNT(usuario_curso.id_usuario_curso)'])
        		    ->setCellValue('H'.$i,  $var2['COUNT(usuario_curso.id_usuario_curso)']);
					$i++;
		}
		$a = $i;
		$estiloTituloReporte = array(
        	'font' => array(
	        	'name'      => 'Verdana',
    	        'bold'      => true,
        	    'italic'    => false,
                'strike'    => false,
               	'size' =>16,
	            	'color'     => array(
    	            	'rgb' => 'FFFFFF'
        	       	)
            ),
	        'fill' => array(
				'type'	=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'	=> array('argb' => 'FF220835')
			),
            'borders' => array(
               	'allborders' => array(
                	'style' => PHPExcel_Style_Border::BORDER_NONE                    
               	)
            ), 
            'alignment' =>  array(
        			'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        			'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        			'rotation'   => 0,
        			'wrap'          => TRUE
    		)
        );

		
			
		$estiloInformacion = new PHPExcel_Style();
		$estiloInformacion->applyFromArray(
			array(
           		'font' => array(
               	'name'      => 'Arial',               
               	'color'     => array(
                   	'rgb' => '000000'
               	)
           	),
           	'fill' 	=> array(
				'type'		=> PHPExcel_Style_Fill::FILL_SOLID,
				'color'		=> array('argb' => 'FFd9b7f4')
			),
           	'borders' => array(
               	'left'     => array(
                   	'style' => PHPExcel_Style_Border::BORDER_THIN ,
	                'color' => array(
    	            	'rgb' => '3a2a47'
                   	)
               	)             
           	)
        ));
		 
		$objPHPExcel->getActiveSheet()->getStyle('A5:I1')->applyFromArray($estiloTituloReporte);
		//$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($estiloTituloColumnas);		
		$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A15:H".($i-1));
				
		for($i = 'A'; $i <= 'H'; $i++){
			$objPHPExcel->setActiveSheetIndex(0)			
				->getColumnDimension($i)->setAutoSize(TRUE);
		}
		
		// Se asigna el nombre a la hoja
		$objPHPExcel->getActiveSheet()->setTitle('Reporte');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		//s$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,$a, 8);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reporte.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{

		echo "<script>alert('NO HAY REGISTROS PARA MOSTRAR');
		window.location = 'reporte2.php'; 
		</script>";
	}

?>
