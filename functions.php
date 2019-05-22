<?php
    $conn = mysqli_connect("localhost","root","","komputer");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $conn;
        
        $timezone       = time() + (60 * 60 * 7);
        $tanggalBerkas  = gmdate("Y-m-d H:i:s", $timezone);
        $npwp           = htmlspecialchars($data["npwp"]);
        $namawp         = htmlspecialchars($data["namawp"]);
        $namaData       = htmlspecialchars($data["namaData"]);

        //upload gambar
        $dokumen = upload();
        if( !$dokumen ) {
            return false;
        }

        $query = "INSERT INTO berkasrbk 
                        VALUES
                        ('', '$tanggalBerkas', '$npwp', '$namawp', '$namaData', '$dokumen')
                    ";
        mysqli_query($conn, $query); 

        return mysqli_affected_rows($conn);
    }

    function upload() {
        
        $namaFile   = $_FILES['dokumen']['name'];
        $ukuranFile = $_FILES['dokumen']['size'];
        $error      = $_FILES['dokumen']['error'];
        $tmpName    = $_FILES['dokumen']['tmp_name'];

        //cek apakah tidak ada yang diapload
        if( $error === 4 ) {
            echo "<script>
                        alert('pilih filenya terlebih dahulu sheyeng!');
                  </script>";
            return false;
        }

        //yang diapload file apa? safety apa enggax
        $ekstensiValid = ['pdf', 'rar'];
        $ekstensiFile = explode('.', $namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));
        if( !in_array($ekstensiFile, $ekstensiValid) ) {
            echo "<script>
                        alert('data yang di aplod tidak diperkenankan, pastikan ekstensi file .pdf atau .rar.');
                  </script>";
            return false;
        }

        //cek jika ukurannya terlalu besar
        if( $ukuranFile > 3145728 ) {
            echo "<script>
            alert('ukuran gambarnya kegedean, maksimal 3mb ya!');
                </script>";
            return false;
        }

        //generate nama gambar baru agar tidak ada duplikasi data dan asiyap asiyap
        $namaFileBaru = date('dmYhis');
        $namaFileBaru .= '-';
        $namaFileBaru .= rand(1000, 9999);
        $namaFileBaru .= '-';
        $namaFileBaru .= $namaFile;

        //lolos pengecekan
        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);
        return $namaFileBaru;

    }

    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM datarbk WHERE id = $id");

        return mysqli_affected_rows($conn);
    }
    
    function ubah($data) {
        global $conn;
        
        $id     = $data["id"];
        $sn     = htmlspecialchars($data["sn"]);
        $merek  = htmlspecialchars($data["merek"]);
        $model  = htmlspecialchars($data["model"]);
        $email  = htmlspecialchars($data["email"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);

        // cek apakah user pilih gambar baru atau tidak
        if( $_FILES['gambar']['error'] === 4 ) {
            $gambar = $gambarLama;
        } else{
            $gambar = upload();
        }
        
        
        
        $query = "UPDATE komputer SET 
                        sn = '$sn',
                        merek = '$merek',
                        model = '$model',
                        email = '$email',
                        gambar = '$gambar'
                    WHERE id = $id
                    ";
        mysqli_query($conn, $query); 

        return mysqli_affected_rows($conn);
    }

    function cari($keyword) {
        $query = "SELECT * FROM komputer 
                    WHERE merek LIKE '%$keyword%' OR
                    model LIKE '%$keyword%' OR
                    email LIKE '%$keyword%' OR
                    sn LIKE '%$keyword%'
                 ";
        
        return query($query);
    }

    function tampilkanUser() {
        global $conn;
        
    }

    function tambahdata($data) {
        global $conn;
        
        $timezone = time() + (60 * 60 * 7);
        $tanggal    = gmdate("Y-m-d H:i:s", $timezone);
        $npwp       = htmlspecialchars($data["npwp"]);
        $nama       = htmlspecialchars($data["nama"]); 
        $noberkas   = htmlspecialchars($data["norbk"]);
        $noruang    = htmlspecialchars($data["noruang"]);
        $nobox      = htmlspecialchars($data["nobox"]);
        $alamat     = htmlspecialchars($data["alamat"]);
        $kelurahan  = htmlspecialchars($data["kelurahan"]);
        $keterangan = htmlspecialchars($data["keterangan"]);

        $query = "INSERT INTO datarbk 
                        VALUES
                        ('','$tanggal','$noberkas','$npwp', '$nama', '$noruang', '$nobox', '$alamat', '$kelurahan','$keterangan')
                    ";
        mysqli_query($conn, $query); 

        return mysqli_affected_rows($conn);
    }

    function ubahData($data) {
        global $conn;
        
        $id     = $data["id"];
        $npwp       = htmlspecialchars($data["npwp"]);
        $nama       = htmlspecialchars($data["nama"]); 
        $noberkas   = htmlspecialchars($data["norbk"]);
        $noruang    = htmlspecialchars($data["noruang"]);
        $nobox      = htmlspecialchars($data["nobox"]);
        $alamat     = htmlspecialchars($data["alamat"]);
        $kelurahan  = htmlspecialchars($data["kelurahan"]);
        $keterangan = htmlspecialchars($data["keterangan"]);
        
        
        $query = "UPDATE datarbk SET 
                        norbk = '$noberkas',
                        npwp = '$npwp',
                        nama = '$nama',
                        noruang = '$noruang',
                        nobox = '$nobox',
                        alamat = '$alamat',
                        kelurahan = '$kelurahan',
                        keterangan = '$keterangan'
                    WHERE id = $id
                    ";
        mysqli_query($conn, $query); 

        return mysqli_affected_rows($conn);
    }
?>