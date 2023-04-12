<?php

include $_SERVER['DOCUMENT_ROOT']."/tes4/koneksi.php";

$jenis_surat = $_GET['jenis_surat'];

function getNama($jenis_surat)
{
    switch ($jenis_surat) {
        case 1:
            return "Surat Keputusan (SK)";
            break;
        case 2:
            return "Surat Undangan (SU)";
            break;
        case 3:
            return "Surat Permohonan (SPm)";
            break;
        case 4:
            return "Surat Pemberitahuan (SPb)";
            break;
        case 5:
            return "Surat Peminjaman (SPp)";
            break;
        case 6:
            return "Surat Pernyataan (SPn)";
            break;
        case 7:
            return "Surat Mandat (SM)";
            break;
        case 8:
            return "Surat Tugas (ST)";
            break;
        case 9:
            return "Surat Keterangan (SKet)";
            break;
        case 10:
            return "Surat Rekomendasi (SR)";
            break;
        case 11:
            return "Surat Balasan (SB)";
            break;
        case 12:
            return "Surat Perintah Perjalanan Dinas (SPPD)";
            break;
        case 13:
            return "Sertifikat (SRT)";
            break;
        case 14:
            return "Perjanjian Kerja (PK)";
            break;
        case 15:
            return "Surat Pengantar (SPeng)";
            break;
    }
}
