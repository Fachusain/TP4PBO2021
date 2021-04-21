<?php

/******************************************
PRAKTIKUM RPL
 ******************************************/

class Template{
	var $filename = ''; // handle file
	var $content = ''; // handle isi file

	function Template($filename = ''){
		// konstruktor
		$this->filename = $filename;

		// membaca file tampilan
		$this->content = implode('', @file($filename));
	}

	function clear(){
		  

		$this->content = preg_replace("/DATA_[A-Z|_|0-9]+/", "", $this->content);

	}

	function write(){
		// menulis isi file ke layar
		// menghapus DATA_ yang belum diganti
		
		$this->clear();
		// tampilkan tampilan yang telah diganti ke layar
		
		print $this->content;

	}

	function getContent(){
		// mengambil isi file yang sudah di proses
		// mengahpus DATA_..  yang belum diganti
		$this->clear();

		// mengembalikan isi tampilan
		return $this->content;
	}

	function replace($old = '', $new = ''){
		
		if(is_int($new)){
			
			$value = sprintf("%d", $new);

		}elseif(is_float($new)){
			
			$value = sprintf("%f", $new);
		}elseif(is_array($new)){
			
			$value = '';
			
			foreach( $new as $item){
				$value .= $item. '';
			}

		}else{
			// jika selain tipe yang ada diatas maka langsung diisikan untuk menggantikan
			$value = $new;
		}

		// menggantikan suatu teks dengan teks baru (misal DATA_... diganti dengan <table> </table>)
		$this->content = preg_replace("/$old/",  $value, $this->content);

	}
}

 ?>