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
  			//cek nilai normalisasi
  			// echo $matrixUpd[0];echo "<br/>";
  			// echo $matrixUpd[1];echo "<br/>";
  			// echo $matrixUpd[2];echo "<br/>";
  			// echo $matrixUpd[3];echo "<br/>";
  			// echo "<br/>";
  			// echo "<br/>";
		}// end of foreach
    $matrix_normal = $matrix;
    print_r($matrix_normal);
    echo "<br/>";
	// print_r($matrix_k);

	//PENGALIAN MATRIX R DENGAN MATRIX BOBOT
    $matrix_k = array();
    $data_k = mysqli_query($koneksi,"SELECT * FROM kriteria WHERE Id");
    while ($dk = mysqli_fetch_array($data_k)) {
    // print_r($d);    
    $matrix_k[] = array($dk['Bobot']);
	}
	$matrix_hasil = array();
	$result=mysqli_query($koneksi,"SELECT * FROM konversi WHERE NIM");
	$rowcount=mysqli_num_rows($result);
	for ($i=0; $i < $rowcount ; $i++) { 
		$matrix_normal[$i][0] = $matrix_normal[$i][0]*$matrix_k[0][0];
		$matrix_normal[$i][1] = $matrix_normal[$i][1]*$matrix_k[1][0];
		$matrix_normal[$i][2] = $matrix_normal[$i][2]*$matrix_k[2][0];
		$matrix_normal[$i][3] = $matrix_normal[$i][3]*$matrix_k[3][0];
		$matrix_hasil[] = array($matrix_normal[$i][0]+$matrix_normal[$i][1]+$matrix_normal[$i][2]+$matrix_normal[$i][3]);
	} //end of for i
	
	//untuk cek apakah hasil total sudah sesuai perkalian
	// echo $matrix_normal[0][0];
	// echo $matrix_normal[0][1];
	// echo $matrix_normal[0][2];
	// echo $matrix_normal[0][3];
	// echo "<br/>";
	// echo $matrix_normal[1][0];
	// echo $matrix_normal[1][1];
	// echo $matrix_normal[1][2];
	// echo $matrix_normal[1][3];
	print_r($matrix_hasil);

	//SORTING
	rsort($matrix_hasil);
	$matrix_sort = array();
	$mlength = count($matrix_hasil);
	echo $mlength;
	for($row = 0; $row < $mlength; $row++) {
	    $matrix_sort[] = array($matrix_hasil[$row][0]);
		}//end of for
	print_r($matrix_sort);

	//PEMILIHAN KANDIDAT
	$terpilih = max(array_column($matrix_hasil, 0));
	echo $terpilih;

} //end of function

?>
</body>
</html>
