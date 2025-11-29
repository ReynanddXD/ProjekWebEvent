<?php

namespace App\Exports;

use App\Models\UserLomba;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class LombaExport implements FromCollection, WithMapping, WithEvents
{
    public function collection()
    {
        return UserLomba::with('lomba')->get();
    }

    public function map($item): array
    {
        static $no = 0;
        $no++;
        return [
            $no,
            $item->nama,
            $item->email,
            $item->lomba->lomba ?? '-',
            $item->lomba ? Carbon::parse($item->lomba->tanggal)->format('d-m-Y') : '-',
            $item->lomba ? Carbon::parse($item->lomba->mulai)->format('H:i') : '-',
            $item->lomba ? Carbon::parse($item->lomba->selesai)->format('H:i') : '-',
            $item->pekerjaan ?? '-',
            $item->instansi ?? '-',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {

                $sheet = $event->sheet->getDelegate();

                // ===== Judul =====
                $sheet->mergeCells('A1:I1');
                $sheet->setCellValue('A1', 'REKAP DATA PESERTA LOMBA');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

                // ===== Periode =====
                $sheet->mergeCells('A2:I2');
                $sheet->setCellValue('A2', 'Periode: ' . now()->format('d F Y'));
                $sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
                $sheet->getStyle('A2')->getAlignment()->setHorizontal('center');

                // ===== Header Tabel =====
                $headerRow = 4;
                $headers = ['No','Nama Peserta','Email','Lomba','Tanggal','Mulai','Selesai','Pekerjaan','Instansi'];
                foreach ($headers as $col => $value) {
                    $sheet->setCellValueByColumnAndRow($col+1, $headerRow, $value);
                }

                // Styling header
                $sheet->getStyle("A{$headerRow}:I{$headerRow}")->getFont()->setBold(true);
                $sheet->getStyle("A{$headerRow}:I{$headerRow}")->getFill()
                      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                      ->getStartColor()->setARGB('FFBDD7EE'); // biru muda
                $sheet->getStyle("A{$headerRow}:I{$headerRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // ===== Data =====
                $startRow = $headerRow + 1;
                $data = $this->collection();
                foreach($data as $index => $item){
                    $row = $startRow + $index;
                    // Kolom No (A) rata tengah
                    $sheet->setCellValue("A$row", $index + 1);
                     $sheet->getStyle("A$row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
                    $sheet->setCellValue("B$row", $item->nama);
                    $sheet->setCellValue("C$row", $item->email);
                    $sheet->setCellValue("D$row", $item->lomba->lomba ?? '-');
                    $sheet->setCellValue("E$row", $item->lomba ? Carbon::parse($item->lomba->tanggal)->format('d-m-Y') : '-');
                    $sheet->setCellValue("F$row", $item->lomba ? Carbon::parse($item->lomba->mulai)->format('H:i') : '-');
                    $sheet->setCellValue("G$row", $item->lomba ? Carbon::parse($item->lomba->selesai)->format('H:i') : '-');
                    $sheet->setCellValue("H$row", $item->pekerjaan ?? '-');
                    $sheet->setCellValue("I$row", $item->instansi ?? '-');
                }

                $endRow = $startRow + count($data) - 1;

                // Border seluruh tabel
                $sheet->getStyle("A{$headerRow}:I{$endRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Auto width
                foreach(range('B','I') as $col){
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
                $sheet->getColumnDimension('A')->setWidth(5);

                // ===== Footer tanda tangan =====
                $footerStart = $endRow + 2;
                $sheet->setCellValue("A{$footerStart}", "Ditandatangani Oleh:");
                $sheet->mergeCells("A{$footerStart}:I{$footerStart}");
                $sheet->getStyle("A{$footerStart}")->getFont()->setBold(true);

                $footerStart += 2;
                $sheet->setCellValue("A{$footerStart}", "Ketua Pelaksana Lomba");
                $sheet->setCellValue("C{$footerStart}", "Penyelenggara Lomba");
                $sheet->setCellValue("E{$footerStart}", "Admin");
            }
        ];
    }
}
