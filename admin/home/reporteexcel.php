<?php
require_once '../../sql/conexion.php';
$conexion = $mysqli;
    

$curso_ = $_POST['cursos_'];

$periodo = $_POST['periodo_'];


	$consulta = "SELECT * FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos on cursos.id_curso=periodo_curso.id_curso WHERE cursos.id_curso=$curso_ and periodo_curso.periodo='$periodo'"; // sustituir 7 por el curso que se seleccione.
	$resultado = $conexion->query($consulta);
	$consulta1 = "SELECT * FROM usuario_curso INNER JOIN usuarios ON usuarios.id_usuario=usuario_curso.id_usuario INNER JOIN periodo_curso ON periodo_curso.id_periodo=usuario_curso.id_periodo INNER JOIN profesores ON profesores.id_profesores=periodo_curso.id_profesores INNER JOIN cursos on cursos.id_curso=periodo_curso.id_curso WHERE cursos.id_curso=$curso_ and periodo_curso.periodo = '$periodo'"; // sustituir 7 por el curso que se seleccione.
	$resultado1 = $conexion->query($consulta1);


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
							 ->setDescription("Reporte de alumnos")
							 ->setKeywords("reporte alumnos carreras")
							 ->setCategory("Reporte excel");

		$tituloReporte = "UNIVERSIDAD NACIONAL AUTÓNOMA DE MÉXICO "."
FACULTAD DE ESTUDIOS SUPERIORES ACATLÁN";
		$fila1 = $resultado1->fetch_array();
		$a1 = "Actividad: "; 
		$curso = "Curso: ";
		$pone = "Ponente: ";
		$fech = "Fecha: ";
		$horar = "Horario: ";
		$ubica = "Ubicación: ";
		$valor = "Cursos internos CEDETEC";
		$titulosColumnas = array('NO.', 'NOMBRE','date','date','date', 'CORREO', 'DEPTO','OBSERVACION');
		
		$objPHPExcel->setActiveSheetIndex(0)
        		    ->mergeCells('A1:H1');
						
		// Se agregan los titulos del reporte
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1',  $tituloReporte)
					->setCellValue('A7',  $a1)
					->setCellValue('B7',  $valor)
					->setCellValue('A8',  $curso)
					->setCellValue('B8',  $fila1['curso'])
					->setCellValue('A9',  $pone)
					->setCellValue('B9',  $fila1['nombre_prof']." ".$fila1['ap_p_prof']." ".$fila1['ap_m_prof'])
					->setCellValue('A10',  $fech)
					->setCellValue('B10',  "del ".$fila1['fecha_inicio']." al ".$fila1['fecha_fin'])
					->setCellValue('A11',  $horar)
					->setCellValue('B11',  $fila1['hora'])
					->setCellValue('A12',  $ubica)
					->setCellValue('B12',  $fila1['ubicacion'])
        		    ->setCellValue('A14',  $titulosColumnas[0])
		            ->setCellValue('B14',  $titulosColumnas[1])
        		    ->setCellValue('C14',  $titulosColumnas[2])
            		->setCellValue('D14',  $titulosColumnas[3])
            		->setCellValue('E14',  $titulosColumnas[4])
            		->setCellValue('F14',  $titulosColumnas[5])
            		->setCellValue('G14',  $titulosColumnas[6])
            		->setCellValue('H14',  $titulosColumnas[7]);
		
		//Se agregan los datos de los alumnos
		$i = 15;
		$n = 1;	
		while ($fila = $resultado->fetch_array()) {
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$i,  $n++)
        		    ->setCellValue('B'.$i,  $fila['nombre']." ".$fila['apellido_paterno']." ".$fila['apellido_materno'])
        		    ->setCellValue('C'.$i,  $n)
        		    ->setCellValue('D'.$i,  $n)
        		    ->setCellValue('E'.$i,  $n)
		            ->setCellValue('F'.$i,  $fila['correo'])
        		    ->setCellValue('G'.$i,  $fila['area']);
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
		$objPHPExcel->getActiveSheet()->setTitle('Alumnos');

		// Se activa la hoja para que sea la que se muestre cuando el archivo se abre
		$objPHPExcel->setActiveSheetIndex(0);
		// Inmovilizar paneles 
		//$objPHPExcel->getActiveSheet(0)->freezePane('A4');
		//s$objPHPExcel->getActiveSheet(0)->freezePaneByColumnAndRow(0,$a, 8);

		// Se manda el archivo al navegador web, con el nombre que se indica (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="Reportedealumnos.xlsx"');
		header('Cache-Control: max-age=0');

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$objWriter->save('php://output');
		exit;
		
	}
	else{

		echo "<script>alert('Tienes que llenar todos los campos');
		window.location = 'mostrar_listas.php'; 
		</script>";
	}

?>
