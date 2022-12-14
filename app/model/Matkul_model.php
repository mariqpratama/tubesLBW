<?php

class Matkul_model{
    // private $table = 'mahasiswa';
    private $table1 = 'matkul';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMatkul()
    {
        // $this->db->query('SELECT * FROM ' . $this->table);
        $this->db->query('SELECT * FROM ' . $this->table1);
        return $this->db->resultSet();
    }

    public function tambahMatkul($data)
    {
        $query = "INSERT INTO matkul 
                    VALUES
                    (kodeMK, :namaMK, :statusMK)";

        $this->db->query($query);

        $this->db->bind('kodeMK', $data['kodeMK']);
        $this->db->bind('namaMK', $data['namaMK']);
        $this->db->bind('statusMK', $data['statusMK']);

        $this->db->execute();

        return  $this->db->rowCount();

    }
}