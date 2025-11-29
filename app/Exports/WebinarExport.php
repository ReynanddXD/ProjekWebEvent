<?php

namespace App\Exports;

use App\Models\UserWebinar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Carbon\Carbon;

class WebinarExport implements FromCollection, WithMapping, WithEvents
{
    public function collection()
    {
        return UserWebinar::with('webinar')->get();
    }

    public function map($item): array
    {
        static $no = 0;
        $no++;
        return [
            $no,
            $item->nama,
            $item->email,
            $item->webinar->judul ?? '-',
            $item->webinar ? Carbon::parse($item->webinar->tanggal)->format('d-m-Y') : '-',
            $item->webinar ? Carbon::parse($item->webinar->mulai)->format('H:i') : '-',
            $item->webinar ? Carbon::parse($item->webinar->selesai)->format('H:i') : '-',
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
                $sheet->setCellValue('A1', 'REKAP DATA PESERTA WEBINAR');
                $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
                $sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // ===== Periode =====
                $sheet->mergeCells('A2:I2');
                $sheet->setCellValue('A2', 'Periode: ' . now()->format('d F Y'));
                $sheet->getStyle('A2')->getFont()->setItalic(true)->setSize(12);
                $sheet->getStyle('A2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // ===== Header Tabel =====
                $headerRow = 4;
                $headers = ['No', 'Nama Peserta','Email','Webinar','Tanggal','Mulai','Selesai','Pekerjaan','Instansi'];
                foreach ($headers as $col => $value) {
                    $sheet->setCellValueByColumnAndRow($col + 1, $headerRow, $value);
                }

                // Styling header
                $sheet->getStyle("A{$headerRow}:I{$headerRow}")->getFont()->setBold(true);
                $sheet->getStyle("A{$headerRow}:I{$headerRow}")->getFill()
                      ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                      ->getStartColor()->setARGB('FFBDD7EE'); // biru muda
                $sheet->getStyle("A{$headerRow}:I{$headerRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
                
                // Kolom No header rata tengah
                $sheet->getStyle("A{$headerRow}")
                      ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                // ===== Data =====
                $startRow = $headerRow + 1;
                $data = $this->collection();
                foreach($data as $index => $item){
                    $row = $startRow + $index;
                    
                    // Kolom No
                    $sheet->setCellValue("A$row", $index + 1);
                    $sheet->getStyle("A$row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                    $sheet->setCellValue("B$row", $item->nama);
                    $sheet->setCellValue("C$row", $item->email);
                    $sheet->setCellValue("D$row", $item->webinar->judul ?? '-');
                    $sheet->setCellValue("E$row", $item->webinar ? Carbon::parse($item->webinar->tanggal)->format('d-m-Y') : '-');
                    $sheet->setCellValue("F$row", $item->webinar ? Carbon::parse($item->webinar->mulai)->format('H:i') : '-');
                    $sheet->setCellValue("G$row", $item->webinar ? Carbon::parse($item->webinar->selesai)->format('H:i') : '-');
                    $sheet->setCellValue("H$row", $item->pekerjaan ?? '-');
                    $sheet->setCellValue("I$row", $item->instansi ?? '-');
                }

                $endRow = $startRow + count($data) - 1;

                // Border seluruh tabel
                $sheet->getStyle("A{$headerRow}:I{$endRow}")
                      ->getBorders()->getAllBorders()
                      ->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

                // Auto width kolom B–I
                foreach(range('B','I') as $col){
                    $sheet->getColumnDimension($col)->setAutoSize(true);
                }
                // Kolom No manual kecil
                $sheet->getColumnDimension('A')->setWidth(5);

                // ===== Footer tanda tangan =====
                $footerStart = $endRow + 2;
                $sheet->setCellValue("A{$footerStart}", "Ditandatangani Oleh:");
                $sheet->mergeCells("A{$footerStart}:I{$footerStart}");
                $sheet->getStyle("A{$footerStart}")->getFont()->setBold(true);

                $footerStart += 2;
                $sheet->setCellValue("A{$footerStart}", "Ketua Pelaksana Webinar");
                $sheet->setCellValue("C{$footerStart}", "Penyelenggara Webinar");
                $sheet->setCellValue("E{$footerStart}", "Admin");
            }
        ];
    }
}


