<?php

namespace App\Exports;

use App\Models\IlmuKeuangan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class IlmuKeuanganExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithCustomStartCell, WithEvents
{
    protected $counter = 0;

    public function collection()
    {
        return IlmuKeuangan::all();
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
            'Email',
            'No. WhatsApp',
            'Usaha / Brand',
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
            $row->email,
            $row->whatsapp,
            $row->business_name,
            $statusMap[$row->status] ?? $row->status,
            $row->created_at->format('Y-m-d H:i'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $sheet->setCellValue('A1', 'Data Peserta Smart Financial Map Workshop Chapter Makassar');
        $sheet->mergeCells("A1:{$highestColumn}1");
        $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        $sheet->getStyle('A3:' . $highestColumn . '3')->getFont()->setBold(true);
        $sheet->getStyle('A3:' . $highestColumn . $highestRow)
            ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(18);
        $sheet->getColumnDimension('E')->setWidth(25);
        $sheet->getColumnDimension('F')->setWidth(15);
        $sheet->getColumnDimension('G')->setWidth(20);

        return [];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet->getDelegate();
                $highestRow = $sheet->getHighestRow();

                $sheet->getStyle('D4:D' . $highestRow)
                    ->getNumberFormat()
                    ->setFormatCode(NumberFormat::FORMAT_TEXT);

                $sheet->getStyle('A3:G3')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFDDDD');

                $sheet->getStyle('A3:G3')->getFont()->setBold(true);
            },
        ];
    }
}
