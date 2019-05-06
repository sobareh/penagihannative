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
        
        $sn     = htmlspecialchars($data["sn"]);
        $merek  = htmlspecialchars($data["merek"]);
        $model  = htmlspecialchars($data["model"]);
        $email  = htmlspecialchars($data["email"]);

        //upload gambar
        $gambar = upload();
        if( !$gambar ) {
            return false;
        }

        $query = "INSERT INTO komputer 
                        VALUES
                        ('', '$sn', '$merek', '$model', '$email', '$gambar')
                    ";
        mysqli_query($conn, $query); 

        return mysqli_affected_rows($conn);
    }

    function upload() {
        
        $namaFile   = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error      = $_FILES['gambar']['error'];
        $tmpName    = $_FILES['gambar']['tmp_name'];

        //cek apakah tidak ada yang diapload
        if( $error === 4 ) {
            echo "<script>
                        alert('pilih filenya terlebih dahulu sheyeng!');
                  </script>";
            return false;
        }

        //yang diapload file apa? safety apa enggax
        $ekstensiValid = ['jpg','jpeg','png','pdf'];
        $ekstensiFile = explode('.', $namaFile);
        $ekstensiFile = strtolower(end($ekstensiFile));
        if( !in_array($ekstensiFile, $ekstensiValid) ) {
            echo "<script>
                        alert('data yang di aplod tidak diperkenankan, pastikan ekstensi file pdf jpg jpeg atau png.');
                  </script>";
            return false;
        }

        //cek jika ukurannya terlalu besar
        if( $ukuranFile > 2097152 ) {
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
        mysqli_query($conn, "DELETE FROM komputer WHERE id = $id");

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
?>