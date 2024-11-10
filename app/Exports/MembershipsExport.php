<?php

namespace App\Exports;

use App\Models\Membership;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembershipsExport implements FromCollection, WithHeadings
{
    // public function collection()
    // {
    //     return Membership::select('id', 'name', 'email')->get(); // Customize as needed
    // }

    // public function headings(): array
    // {
    //     return ['ID', 'Name', 'Email']; // Customize as needed
    // }

    protected $startDate;
    protected $endDate;

    // Constructor to accept date range
    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function collection()
    {
        // Filter data based on the date range
        return Membership::whereBetween('created_at', [$this->startDate, $this->endDate])
            ->select('membership_id', 'name', 'email','mobile','mother_name','father_name','pancard','aadhar_card','created_at','home_address')->whereNotNull('membership_id')
            ->get();
    }

    public function headings(): array
    {
        return ['Membership Id', 'Name', 'Email','Mobile',"Mother's Name","Father's Name",'Pancard','Aadhar Card','Joining Date','Address'];
    }
}
