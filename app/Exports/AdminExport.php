<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class AdminExport implements FromArray, WithEvents
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data; // Data admin dari controller
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
                $sheet->mergeCells('A1:D1');
                $sheet->setCellValue('A1', 'REKAP DATA ADMIN');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()
                      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // ===== Periode =====
                $sheet->mergeCells('A2:D2');
                $sheet->setCellValue('A2', 'Periode: ' . now()->format('d F Y'));
                $sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
                $sheet->getStyle('A2')->getAlignment()
                      ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // ===== Header Tabel =====
                $headerRow = 4;
                $headers = ['No','Nama','Email','Bergabung Sejak'];
                foreach ($headers as $col => $value) {
                    $sheet->setCellValueByColumnAndRow($col+1, $headerRow, $value);
                }

                $sheet->getStyle("A{$headerRow}:D{$headerRow}")->getFont()->setBold(true);
                $sheet->getStyle("A{$headerRow}:D{$headerRow}")->getFill()
                      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                      ->getStartColor()->setARGB('FFBDD7EE');
                $sheet->getStyle("A{$headerRow}:D{$headerRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // ===== Data =====
                $startRow = $headerRow + 1;
                foreach($this->data as $index => $admin){
                    $row = $startRow + $index;
                    $sheet->setCellValue("A$row", $index + 1);
                    $sheet->setCellValue("B$row", $admin->name ?? '-');
                    $sheet->setCellValue("C$row", $admin->email ?? '-');
                    $sheet->setCellValue("D$row", $admin->created_at ? Carbon::parse($admin->created_at)->format('d-m-Y H:i') : '-');

                    $sheet->getStyle("A$row")->getAlignment()
                          ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                }

                $endRow = $startRow + count($this->data) - 1;

                // Border seluruh tabel
                $sheet->getStyle("A{$headerRow}:D{$endRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Auto width
                foreach(range('B','D') as $col){
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $sheet->getColumnDimension('A')->setWidth(5);

                // ===== Footer tanda tangan =====
                $footerStart = $endRow + 2;
                $sheet->setCellValue("A{$footerStart}", "Ditandatangani Oleh:");
                $sheet->mergeCells("A{$footerStart}:D{$footerStart}");
                $sheet->getStyle("A{$footerStart}")->getFont()->setBold(true);

                $footerStart += 2;
                $sheet->setCellValue("A{$footerStart}", "Admin Sistem");
            }
        ];
    }
}


