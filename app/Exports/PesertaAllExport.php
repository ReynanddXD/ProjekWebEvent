<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class PesertaAllExport implements FromArray, WithEvents
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function array(): array
    {
        // Kosongkan, kita tulis semua data di AfterSheet
        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                // ===== Judul =====
                $sheet->mergeCells('A1:H1');
                $sheet->setCellValue('A1', 'REKAP DATA PESERTA LOMBA & WEBINAR');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()
                      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // ===== Periode =====
                $sheet->mergeCells('A2:H2');
                $sheet->setCellValue('A2', 'Periode: ' . now()->format('d F Y'));
                $sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
                $sheet->getStyle('A2')->getAlignment()
                      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // ===== Header Tabel =====
                $headerRow = 4;
                $headers = ['No','Nama','Email','No HP','Instansi','Pekerjaan','Tipe Kegiatan','Tanggal Daftar'];
                foreach ($headers as $col => $value) {
                    $sheet->setCellValueByColumnAndRow($col+1, $headerRow, $value);
                }

                $sheet->getStyle("A{$headerRow}:H{$headerRow}")->getFont()->setBold(true);
                $sheet->getStyle("A{$headerRow}:H{$headerRow}")->getFill()
                      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                      ->getStartColor()->setARGB('FFBDD7EE');
                $sheet->getStyle("A{$headerRow}:H{$headerRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // ===== Data =====
                $startRow = $headerRow + 1;
                foreach($this->data as $index => $item){
                    $row = $startRow + $index;
                    $sheet->setCellValue("A$row", $index + 1);
                    $sheet->setCellValue("B$row", $item->nama ?? '-');
                    $sheet->setCellValue("C$row", $item->email ?? '-');
                    $sheet->setCellValue("D$row", $item->noHp ?? '-');
                    $sheet->setCellValue("E$row", $item->instansi ?? '-');
                    $sheet->setCellValue("F$row", $item->pekerjaan ?? '-');
                    $sheet->setCellValue("G$row", $item->tipe_kegiatan ?? '-');
                    $sheet->setCellValue("H$row", $item->created_at ? Carbon::parse($item->created_at)->format('d-m-Y H:i') : '-');

                    $sheet->getStyle("A$row")->getAlignment()
                          ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                }

                $endRow = $startRow + count($this->data) - 1;

                // Border seluruh tabel
                $sheet->getStyle("A{$headerRow}:H{$endRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Auto width
                foreach(range('B','H') as $col){
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $sheet->getColumnDimension('A')->setWidth(5);

                // ===== Footer tanda tangan =====
                $footerStart = $endRow + 2;
                $sheet->setCellValue("A{$footerStart}", "Ditandatangani Oleh:");
                $sheet->mergeCells("A{$footerStart}:H{$footerStart}");
                $sheet->getStyle("A{$footerStart}")->getFont()->setBold(true);

                $footerStart += 2;
                $sheet->setCellValue("A{$footerStart}", "Ketua Pelaksana Lomba");
                $sheet->setCellValue("C{$footerStart}", "Penyelenggara Lomba");
                $sheet->setCellValue("E{$footerStart}", "Admin");
            }
        ];
    }
}


