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
        $gambar = htmlspecialchars($data["gambar"]);

        $query = "INSERT INTO komputer 
                        VALUES
                        ('', '$sn', '$merek', '$model', '$email', '$gambar')
                    ";
        mysqli_query($conn, $query); 

        return mysqli_affected_rows($conn);
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
        $gambar = htmlspecialchars($data["gambar"]);

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