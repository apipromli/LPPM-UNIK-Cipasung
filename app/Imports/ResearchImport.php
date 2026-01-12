<?php

namespace App\Imports;

use App\Models\Research;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResearchImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Research([
            'nidn'       => $row['nidn'] ?? null,
            'researcher' => $row['researcher'],
            'scheme'     => $row['scheme'],
            'title'      => $row['title'],
            'year'       => $row['year'],
        ]);
    }
}
