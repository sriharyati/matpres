<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
function proses_saw(){
	include 'koneksi.php';
	//PEMBUATAN MATRIX
	$matrix = array();
	$data = mysqli_query($koneksi,"SELECT * FROM konversi WHERE NIM");
	while ($d = mysqli_fetch_array($data)) {
    // print_r($d);    
    $matrix[] = array($d['ip'],$d['kt'],$d['prestasi'],$d['pb']);
	} //end of while rows
	echo "<br/>";

	//PROSES NORMALISASI MATRIX R DENGAN PROFIT-> X/MAX
    $max_ip = max(array_column($matrix, 0));
    $max_kt = max(array_column($matrix, 1));
    $max_pres = max(array_column($matrix, 2));
    $max_pb = max(array_column($matrix, 3));
    print_r($matrix); echo "<br/>";
    foreach($matrix as &$matrixUpd){
  			$matrixUpd[0] = $matrixUpd[0]/$max_ip;
  			$matrixUpd[1] = $matrixUpd[1]/$max_kt;
  			$matrixUpd[2] = $matrixUpd[2]/$max_pres;
  			$matrixUpd[3] = $matrixUpd[3]/$max_pb;
		}// end of foreach
	// print_r($matrix_k);

	//PENGALIAN MATRIX R DENGAN MATRIX BOBOT
    $matrix_k = array();
    $data_k = mysqli_query($koneksi,"SELECT * FROM kriteria WHERE Id");
    while ($dk = mysqli_fetch_array($data_k)) {
    // print_r($d);    
    $matrix_k[] = array($dk['Bobot']);
    print_r($matrix_k);
	}
	$result=mysqli_query($koneksi,"SELECT * FROM konversi WHERE NIM");
	$rowcount=mysqli_num_rows($result);
	for ($i=0; $i < $rowcount ; $i++) { 
		$matrix[$i][0] = $matrix[$i][0]*$matrix_k[0][0];
		$matrix[$i][1] = $matrix[$i][1]*$matrix_k[1][0];
		$matrix[$i][2] = $matrix[$i][2]*$matrix_k[2][0];
		$matrix[$i][3] = $matrix[$i][3]*$matrix_k[3][0];
		$matrix[] = array($matrix[$i][0]+$matrix[$i][1]+$matrix[$i][2]+$matrix[$i][3]);
	} //end of for i
	
	print_r($matrix);

	//SORTING
	rsort($matrix);
	$matrix_sort = array();
	$mlength = count($matrix);
	echo $mlength;
	for($row = 0; $row < $mlength; $row++) {
	    $matrix_sort[] = array($matrix[$row][0]);
		}//end of for
	print_r($matrix_sort);

	//PEMILIHAN KANDIDAT
	$terpilih = max(array_column($matrix, 0));
	echo $terpilih;

} //end of function
	proses_saw();
?>
</body>
</html>
