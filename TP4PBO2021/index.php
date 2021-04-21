<?php

/******************************************
PRAKTIKUM RPL
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Task.class.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

// insert data
if(isset($_POST['add'])){
	$ijenis = $_POST['tjenis'];
	$ikode_produk = $_POST['tkode_produk'];
	$iwarna = $_POST['twarna'];
	$ialamat = $_POST['talamat'];
	$iukuran = $_POST['tukuran'];
	$istatus = "Belum Layak";

	$otask->insertTask($ijenis, $ikode_produk, $iwarna, $ialamat, $iukuran, $istatus);

	
	
	header('Location: index.php');
}

// delete data
if(isset($_GET['kode_hapus'])){
	$kode_produk = $_GET['kode_hapus'];
	$otask->delete($kode_produk);
	
        header('Location: index.php');
    
}

// update status data distro
if(isset($_GET['kode_status'])){
	$kode_produk = $_GET['kode_status'];
	$otask->update($kode_produk);

	header('Location: index.php');
}


$otask->getTask();


$data = null;
$no = 1;

while (list($kode_produk, $tjenis, $twarna, $tukuran, $talamat, $tstatus) = $otask->getResult()) {
	// Tampilan jika status nya sudah lulus
	if($tstatus == "Sudah Layak"){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $kode_produk . "</td>
		<td>" . $tjenis . "</td>
		<td>" . $twarna . "</td>
		<td>" . $talamat . "</td>
		<td>" . $tukuran . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?kode_hapus=" . $kode_produk . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
	}

	// Tampilan jika status nya belum lulus
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $kode_produk . "</td>
		<td>" . $tjenis . "</td>
		<td>" . $twarna . "</td>
		<td>" . $talamat . "</td>
		<td>" . $tukuran . "</td>
		<td>" . $tstatus . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?kode_hapus=" . $kode_produk . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success' ><a href='index.php?kode_status=" . $kode_produk .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}


// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// Menutup koneksi database
$otask->close();


// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);

// Menampilkan ke layar
$tpl->write();
