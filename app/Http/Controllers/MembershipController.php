<?php

namespace App\Http\Controllers;
use App\Models\Membership;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembershipController extends Controller 
{
    public function viewMembership($id){
        $data['member']=Membership::find($id);
        return view('admin.membership.viewMembership',$data);
    }

    public function exportMembership(){
        return Excel::download($this, 'memberships.xlsx');
    }

    // Fetch data to export
    public function collection()
    {
        return Membership::select('id', 'name', 'email')->get(); // Customize as needed
    }

    // Define headings
    public function headings(): array
    {
        return ['ID', 'Name', 'Email']; // Customize as needed
    }
}
