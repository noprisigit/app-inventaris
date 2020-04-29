<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf');
    }

    public function cetak_pdf_hardware()
    {
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(300,7,'LABORATORIUM KOMPUTER LANJUT',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(300,7,'DATA HARDWARE',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'NO',1,0,'C');
        $pdf->Cell(60,6,'KODE BARANG',1,0,'C');
        $pdf->Cell(55,6,'NAMA BARANG',1,0,'C');
        $pdf->Cell(50,6,'MERK BARANG',1,0,'C');
        $pdf->Cell(50,6,'JENIS BARANG',1,0,'C');
        $pdf->Cell(50,6,'KONDISI BARANG',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $data = $this->db->get('master_stok_hardware')->result();
        $no = 1;
        foreach ($data as $row){
            $pdf->Cell(10,6,$no,1,0,'C');
            $pdf->Cell(60,6,$row->kode_barang,1,0);
            $pdf->Cell(55,6,$row->nama_barang,1,0);
            $pdf->Cell(50,6,$row->merk_barang,1,0);
            $pdf->Cell(50,6,$row->jenis_barang,1,0,'C');
            $pdf->Cell(50,6,$row->kondisi_barang,1,1,'C');
            $no++;
        }
        $pdf->Output('D', 'Rekap Hardware.pdf');
    }

    public function cetak_pdf_atk()
    {
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(300,7,'LABORATORIUM KOMPUTER LANJUT',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(300,7,'DATA ALAT TULIS KANTOR',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'NO',1,0,'C');
        $pdf->Cell(60,6,'KODE ATK',1,0,'C');
        $pdf->Cell(55,6,'NAMA ATK',1,0,'C');
        $pdf->Cell(50,6,'MERK ATK',1,0,'C');
        $pdf->Cell(50,6,'JENIS ATK',1,0,'C');
        $pdf->Cell(50,6,'STOK ATK',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $data = $this->db->get('master_stok_atk')->result();
        $no = 1;
        foreach ($data as $row){
            $pdf->Cell(10,6,$no,1,0,'C');
            $pdf->Cell(60,6,$row->kode_atk,1,0);
            $pdf->Cell(55,6,$row->nama_atk,1,0);
            $pdf->Cell(50,6,$row->merk_atk,1,0);
            $pdf->Cell(50,6,$row->jenis_atk,1,0,'C');
            $pdf->Cell(50,6,$row->stok_atk,1,1,'C');
            $no++;
        }
        $pdf->Output('D', 'Rekap ATK.pdf');
    }

    public function cetak_pdf_komputer()
    {
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(300,7,'LABORATORIUM KOMPUTER LANJUT',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(300,7,'DATA KOMPUTER',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'NO',1,0,'C');
        $pdf->Cell(60,6,'NAMA PC',1,0,'C');
        $pdf->Cell(55,6,'PROCESSOR',1,0,'C');
        $pdf->Cell(50,6,'RAM',1,0,'C');
        $pdf->Cell(50,6,'GRAPHIC CARD',1,0,'C');
        $pdf->Cell(50,6,'PENYIMPANAN',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $data = $this->db->get('master_komputer')->result();
        $no = 1;
        foreach ($data as $row){
            $pdf->Cell(10,6,$no,1,0,'C');
            $pdf->Cell(60,6,$row->nama_pc,1,0);
            $pdf->Cell(55,6,$row->processor,1,0);
            $pdf->Cell(50,6,$row->ram,1,0,'C');
            $pdf->Cell(50,6,$row->graphic_card,1,0,'C');
            $pdf->Cell(50,6,$row->penyimpanan,1,1,'C');
            $no++;
        }
        $pdf->Output('D', 'Rekap Komputer.pdf');
    }
}