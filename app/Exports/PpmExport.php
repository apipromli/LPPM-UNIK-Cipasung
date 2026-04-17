<?php

namespace App\Exports;

use App\Models\Ppm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PpmExport implements FromCollection, WithHeadings, WithStyles
{
    protected $year;

    public function __construct($year = null)
    {
        $this->year = $year;
    }

    public function collection()
    {
        $query = Ppm::query();

        if ($this->year) {
            $query->where('year', $this->year);
        }

        return $query->select('year', 'executor', 'nidn', 'scheme', 'title', 'location', 'status')
            ->orderBy('year', 'desc')
            ->orderBy('executor', 'asc')
            ->get()
            ->map(function ($item, $i) {
                return [
                    'No'       => $i + 1,
                    'Tahun'    => $item->year,
                    'Pelaksana'=> $item->executor,
                    'NIDN'     => $item->nidn ?? '-',
                    'Skema'    => $item->scheme ?? '-',
                    'Judul'    => $item->title,
                    'Lokasi'   => $item->location ?? '-',
                    'Status'   => $item->status ?? '-',
                ];
            });
    }

    public function headings(): array
    {
        return ['No', 'Tahun', 'Nama Pelaksana', 'NIDN', 'Skema', 'Judul Kegiatan', 'Lokasi', 'Status'];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font'      => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill'      => ['fillType' => 'solid', 'color' => ['rgb' => '0E4226']],
                'alignment' => ['horizontal' => 'center'],
            ],
        ];
    }
}
