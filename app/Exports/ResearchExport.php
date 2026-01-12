<?php

namespace App\Exports;

use App\Models\Research;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResearchExport implements FromCollection, WithHeadings
{
    protected $year;

    public function __construct($year = null)
    {
        $this->year = $year;
    }

    public function collection()
    {
        $query = Research::query();

        if ($this->year) {
            $query->where('year', $this->year);
        }

        return $query->select(
            'year',
            'researcher',
            'title',
            'scheme',
            'type',
            'status'
        )->orderBy('year', 'desc')->get();
    }

    public function headings(): array
    {
        return [
            'Tahun',
            'Peneliti',
            'Judul',
            'Skema',
            'Jenis',
            'Status',
        ];
    }
}
