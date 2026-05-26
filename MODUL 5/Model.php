<?php

require_once 'Koneksi.php';

class Model {
    
    public static function insertMember($nama, $email, $no_telp, $alamat) {
        global $koneksi;
        
        $query = "INSERT INTO member (nama, email, no_telp, alamat, tanggal_daftar) 
                  VALUES ('$nama', '$email', '$no_telp', '$alamat', NOW())";
        
        if ($koneksi->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function getMember() {
        global $koneksi;
        
        $query = "SELECT * FROM member ORDER BY id_member DESC";
        $result = $koneksi->query($query);
        
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public static function getMemberById($id) {
        global $koneksi;
        
        $query = "SELECT * FROM member WHERE id_member = $id";
        $result = $koneksi->query($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    public static function updateMember($id, $nama, $email, $no_telp, $alamat) {
        global $koneksi;
        
        $query = "UPDATE member SET nama='$nama', email='$email', no_telp='$no_telp', alamat='$alamat' 
                  WHERE id_member=$id";
        
        if ($koneksi->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function deleteMember($id) {
        global $koneksi;
        
        $query = "DELETE FROM member WHERE id_member=$id";
        
        if ($koneksi->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function insertBuku($judul, $pengarang, $penerbit, $isbn, $tahun_terbit, $jumlah_stok) {
        global $koneksi;
        
        $query = "INSERT INTO buku (judul, pengarang, penerbit, isbn, tahun_terbit, jumlah_stok) 
                  VALUES ('$judul', '$pengarang', '$penerbit', '$isbn', '$tahun_terbit', '$jumlah_stok')";
        
        if ($koneksi->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function getBuku() {
        global $koneksi;
        
        $query = "SELECT * FROM buku ORDER BY id_buku DESC";
        $result = $koneksi->query($query);
        
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
    public static function getBukuById($id) {
        global $koneksi;
        
        $query = "SELECT * FROM buku WHERE id_buku = $id";
        $result = $koneksi->query($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    
    public static function updateBuku($id, $judul, $pengarang, $penerbit, $isbn, $tahun_terbit, $jumlah_stok) {
        global $koneksi;
        
        $query = "UPDATE buku SET judul='$judul', pengarang='$pengarang', penerbit='$penerbit', 
                  isbn='$isbn', tahun_terbit='$tahun_terbit', jumlah_stok='$jumlah_stok' 
                  WHERE id_buku=$id";
        
        if ($koneksi->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function deleteBuku($id) {
        global $koneksi;
        
        $query = "DELETE FROM buku WHERE id_buku=$id";
        
        if ($koneksi->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function insertPeminjaman($id_member, $id_buku, $tanggal_kembali) {
        global $koneksi;
        
        $query = "INSERT INTO peminjaman (id_member, id_buku, tanggal_peminjaman, tanggal_kembali, status) 
                  VALUES ('$id_member', '$id_buku', NOW(), '$tanggal_kembali', 'Dipinjam')";
        
        if ($koneksi->query($query) === TRUE) {
            // Kurangi stok buku
            self::kurangiStokBuku($id_buku, 1);
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function getPeminjaman() {
        global $koneksi;
        
        $query = "SELECT p.*, m.nama as nama_member, b.judul as judul_buku 
                  FROM peminjaman p 
                  JOIN member m ON p.id_member = m.id_member 
                  JOIN buku b ON p.id_buku = b.id_buku 
                  ORDER BY p.id_peminjaman DESC";
        
        $result = $koneksi->query($query);
        
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    }
    
    public static function getPeminjamanById($id) {
        global $koneksi;
        
        $query = "SELECT p.*, m.nama as nama_member, b.judul as judul_buku 
                  FROM peminjaman p 
                  JOIN member m ON p.id_member = m.id_member 
                  JOIN buku b ON p.id_buku = b.id_buku 
                  WHERE p.id_peminjaman = $id";
        
        $result = $koneksi->query($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    
    public static function updatePeminjaman($id, $id_member, $id_buku, $tanggal_kembali, $status) {
        global $koneksi;
        
        $query = "UPDATE peminjaman SET id_member='$id_member', id_buku='$id_buku', 
                  tanggal_kembali='$tanggal_kembali', status='$status' 
                  WHERE id_peminjaman=$id";
        
        if ($koneksi->query($query) === TRUE) {
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function deletePeminjaman($id) {
        global $koneksi;
        
        $peminjaman = self::getPeminjamanById($id);
        
        $query = "DELETE FROM peminjaman WHERE id_peminjaman=$id";
        
        if ($koneksi->query($query) === TRUE) {
            if ($peminjaman['status'] == 'Dipinjam') {
                self::tambahStokBuku($peminjaman['id_buku'], 1);
            }
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    public static function kembalikanBuku($id_peminjaman) {
        global $koneksi;
        
        $peminjaman = self::getPeminjamanById($id_peminjaman);
        
        $query = "UPDATE peminjaman SET status='Dikembalikan', tanggal_dikembalikan=NOW() 
                  WHERE id_peminjaman=$id_peminjaman";
        
        if ($koneksi->query($query) === TRUE) {
            self::tambahStokBuku($peminjaman['id_buku'], 1);
            return true;
        } else {
            echo "Error: " . $query . "<br>" . $koneksi->error;
            return false;
        }
    }
    
    private static function kurangiStokBuku($id_buku, $jumlah) {
        global $koneksi;
        
        $query = "UPDATE buku SET jumlah_stok = jumlah_stok - $jumlah WHERE id_buku = $id_buku";
        $koneksi->query($query);
    }
    
    private static function tambahStokBuku($id_buku, $jumlah) {
        global $koneksi;
        
        $query = "UPDATE buku SET jumlah_stok = jumlah_stok + $jumlah WHERE id_buku = $id_buku";
        $koneksi->query($query);
    }
}

?>