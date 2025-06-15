<?php

namespace App\Exports;

use App\Models\Inscription;
use Maatwebsite\Excel\Concerns\FromCollection;

namespace App\Exports;

use App\Models\Inscription;
use Maatwebsite\Excel\Concerns\FromCollection;

class InscriptionsExport implements FromCollection
{
    public function collection()
    {
        return Inscription::all();
    }
}
