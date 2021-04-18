<?php
include("koneksi.php");
$arr = array();
$q = mysql_query("select * from tbl_soal order by rand() limit 10");
        while ($row = mysql_fetch_assoc($q)) {
            $temp = array(
                "soal_id" => $row['id'],
				"soal"=>$row['soal'],
				"a"=>$row['a'],
				"b"=>$row['b'],
                "c" => $row['c'],
                "jawaban" => $row['jwaban'],
                "gambar" => "http://10.0.2.2:30/kuis/images/".$row['gambar'].""
            );
            array_push($arr, $temp);
        }	
	$data = json_encode($arr);
    $data = str_replace("\\", "", $data);
    echo "{\"daftar_soal\":" . $data . "}";
?>