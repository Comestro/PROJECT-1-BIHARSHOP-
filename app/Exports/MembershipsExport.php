<?php

namespace App\Exports;

use App\Models\Membership;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembershipsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Membership::select('id', 'name', 'email')->get(); // Customize as needed
    }

    public function headings(): array
    {
        return ['ID', 'Name', 'Email']; // Customize as needed
    }
}
