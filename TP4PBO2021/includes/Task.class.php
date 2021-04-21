<?php 


class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke distro
		$query = "SELECT * FROM distro";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
	// memasukan data ke distro
	function insertTask($ijenis, $ikode_produk, $iwarna, $ialamat, $iukuran, $istatus){
		// query insert
		$sql_add = "INSERT INTO distro  
				(kode_produk, jenis, warna, ukuran, alamat_toko, status_layak_jual) VALUES  
				('$ikode_produk', '$ijenis', '$iwarna', '$iukuran', '$ialamat', '$istatus')";

		return $this->execute($sql_add);
		
	}

	// hapus data dari distro
	function delete($data){
		// query delete dari kode_produk yang dipilih
        $sql = "DELETE FROM distro WHERE kode_produk=$data";

		return $this->execute($sql);
    }

	// update status mahasiswa
	function update($data){
		// query update statusnya menjadi sudah lulus
		$sql = "UPDATE distro SET status_layak_jual='Sudah Layak' WHERE kode_produk=$data";

		return $this->execute($sql);
	}

}



?>
