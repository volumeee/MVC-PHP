<?php

class Mahasiswa_model
{
    // private $mhs = [
    //     [
    //         "nama" => "Agos",
    //         "nrp" => "173040001",
    //         "email" => "bagus25100@mail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Bagus",
    //         "nrp" => "173040002",
    //         "email" => "asad@mail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ],
    //     [
    //         "nama" => "Asad",
    //         "nrp" => "173040003",
    //         "email" => "asdajskda@mail.com",
    //         "jurusan" => "Teknik Informatika"
    //     ]
    // ];

    private $dbh; //database handler
    private $stmt;

    public function __construct()
    {
        //data source name
        $dsn = 'mysql:host=localhost;dbname=phpmvc';

        try {
            $this->dbh = new PDO($dsn, 'root', '');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa');
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMahasiswaById($id)
    {
        $this->stmt = $this->dbh->prepare('SELECT * FROM mahasiswa WHERE id = :id');
        $this->stmt->bindParam(':id', $id);
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}
