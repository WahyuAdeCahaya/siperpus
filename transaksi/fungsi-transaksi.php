<?php
function ambilBuku($connect)
{
    $sql = "SELECT id_buku, judul  FROM buku";
    $res = mysqli_query($connect, $sql);
    
    $data_buku = array();

    while ($data = mysqli_fetch_assoc($res)) {
        $data_buku[] = $data;
    }

    return $data_buku;
}

function ambilBukuPinjam($connect, $id_pinjam)
{
    $sql = "SELECT * FROM buku INNER JOIN detail_pinjam ON detail_pinjam.id_buku = buku.id_buku WHERE id_pinjam = $id_pinjam";
    
    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($res);

    
    return $data;
}

function ambilAnggota($connect)
{
    $sql = "SELECT id_anggota, nama  FROM anggota";
    $res = mysqli_query($connect, $sql);
    
    $data_anggota = array();

    while ($data = mysqli_fetch_assoc($res)) {
        $data_anggota[] = $data;
    }

    return $data_anggota;   
}

function ambilPeminjaman($connect, $id_pinjam)
{
    $sql = "SELECT * FROM peminjaman INNER JOIN anggota ON peminjaman.id_anggota = anggota.id_anggota WHERE id_pinjam = $id_pinjam";

    //echo $sql;

    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($res);

    
    return $data;
}

function ambilPeminjamanBuku($connect, $id_pinjam)
{
    $sql = "SELECT * FROM buku INNER JOIN detail_pinjam ON detail_pinjam.id_buku = buku.id_buku WHERE id_pinjam = $id_pinjam";

    

    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($res);

    
    return $data;
}


function ambilStok($connect, $id_buku)
{
    $sql = "SELECT stok FROM buku WHERE id_buku = $id_buku";
    $res = mysqli_query($connect, $sql);

    $data = mysqli_fetch_assoc($res);

    return $data['stok'];
}

function cekPinjam($connect, $id_anggota)
{
    $sql = "SELECT * FROM peminjaman WHERE id_anggota = $id_anggota AND status = 'dipinjam'";
    $res = mysqli_query($connect, $sql);

    $pinjam = mysqli_affected_rows($connect);

    if($pinjam == 0)
        return true;
    else
        return false;
}

function updateStok($connect, $id_buku, $stok_update)
{
    $sql = "UPDATE buku SET stok = $stok_update WHERE id_buku = $id_buku";
    $res = mysqli_query($connect, $sql);
}

function hitungDenda($connect, $id_pinjam, $tgl_kembali)
{
    $denda = 0;

    $sql = "SELECT tgl_jatuh_tempo FROM peminjaman WHERE id_pinjam = $id_pinjam";
    $res = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($res);
    $tgl_jatuh_tempo = $data['tgl_jatuh_tempo'];

    $hari_denda = (strtotime($tgl_kembali) - strtotime($tgl_jatuh_tempo))/60/60/24;

    if($hari_denda >= 0)
    {
        $denda = $hari_denda * 1000;
    }

    return $denda;
}
?>