<?php

namespace App\Http\Controllers;
use App\Models\Membership;
use Illuminate\Http\Request;
use App\Exports\MembershipsExport;
use Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MembershipController extends Controller
{
    public function viewMembership($id){
        $data['member']=Membership::find($id);
        return view('admin.membership.viewMembership',$data);
    }

    public function editMembership($id){
        $data['member']=Membership::find($id);
        return view('admin.membership.editMembership',$data);
    }

    public function exportMembership(){
        return Excel::download(new MembershipsExport, 'memberships.xlsx');
    }

   
}
