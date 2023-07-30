<?php  
	$host = "localhost";
	$db = "perpustakaan_2020";
	$user = "root";
	$password = "";

	$con = mysqli_connect($host, $user, $password, $db);

	if(mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	$conn = mysqli_connect("localhost", "root", "", "perpustakaan_2020");


	function query($query){
		global $conn;
		// Ambil data dari table mahasiswa / query data mahasiswa
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ($row = mysqli_fetch_array($result)) {
			$rows[] = $row;
		}
		return $rows;
	}
?>