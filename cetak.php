<?php

require_once __DIR__ . '/vendor/autoload.php';

		
		$data_laporan = query("SELECT * FROM data_laporan");
		$mpdf = new \Mpdf\Mpdf();
		$html='

		<!DOCTYPE html>
		<html>
		<head>
			<title>
				Tabel Pelaporan
			</title>
		</head>
		<body>
		 <table border="1" cellpading="10" cellspacing="0">
                                  
                                        <tr>
                                            <th>No</th>
                                            <th>Uniq Code</th>
                                            <th>Jenis Pelaporan</th>
                                            <th>Waktu Pelaporan</th>
                                         
                                        </tr>';

                                        	$i = 1;
                                        foreach ($data_laporan as $row) {
                                        	$html .= '<tr>
                                        	<td>'. $i++ .'</td>
                                        	<td>'. $row["kode_unik"] .'</td>
                                        	<td>'. $row["jenis_pelaporaan"] .'</td>
                                        	<td>'. $row["date_created"] .'</td>
                                        </tr>';
                                        }
                                
                           
                             $html .= '</table>
		</body>
		</html>';
		$mpdf->WriteHTML($html);		
		$mpdf->Output();
		
?>