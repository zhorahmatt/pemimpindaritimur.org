<?php

namespace App\Exports;

use App\Models\Hpi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class HpiExport implements
    FromCollection,
    WithHeadings,
    WithMapping,
    WithStyles,
    WithCustomStartCell,
    WithEvents
{
    protected $counter = 0;

    public function collection()
    {
        return Hpi::all();
    }

    public function startCell(): string
    {
        return 'A3';
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Peserta',
            'Asal Kab/Kota',
            'Ukuran Baju',
            'Nama Usaha/Brand',
            'Bidang Usaha',
            'Jabatan',
            'Masalah/Tantangan yang Dihadapi',
            'Harapan Setelah Mengikuti Training',
            'Sumber Informasi',
            'Status',
            'Waktu Daftar',
        ];
    }

    public function map($row): array
    {
        $this->counter++;

        $statusMap = [
            'accept' => 'Disetujui',
            'pending' => 'Pending',
            'deny' => 'Ditolak',
        ];

        return [
            $this->counter,
            $row->name,
            $row->city,
            $row->size,
            $row->business_name,
            $row->business_field,
            $row->position,
            $row->problem,
            $row->hope,
            $row->from,
            $statusMap[$row->status] ?? $row->status,
            $row->created_at->format('Y-m-d H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        // Judul
        $sheet->setCellValue('A1', 'Data Peserta High Performing Individual (HPI)');
        $sheet->mergeCells("A1:{$highestColumn}1");
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Header tabel
        $sheet->getStyle('A3:' . $highestColumn . '3')->getFont()->setBold(true);

        // Border semua data
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)
            ->getBorders()->getAllBorders()->setBorderStyle(
                \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN
            );

        // Lebar kolom
        $columnWidths = [
            'A' => 5,
            'B' => 25,
            'C' => 20,
            'D' => 15,
            'E' => 25,
            'F' => 20,
            'G' => 15,
            'H' => 30,
            'I' => 30,
            'J' => 25,
            'K' => 15,
            'L' => 20,
        ];

        foreach ($columnWidths as $col => $width) {
            $sheet->getColumnDimension($col)->setWidth($width);
        }

        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();

                $sheet->getStyle('A3:L3')
                    ->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFFDDDD');

                $sheet->getStyle('A3:L3')->getFont()->setBold(true);
            },
        ];
    }
}
