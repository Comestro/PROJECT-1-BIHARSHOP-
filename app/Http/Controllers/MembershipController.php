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
        $member=Membership::find($id);
        // $member = Membership::where('id',$id)->first();
        if($member){
           if ($member->isPaid) {
              $referals = Membership::where('referal_id', $member->membership_id)->where('isPaid',1)->limit(2)->get();
                 return view('admin.membership.viewMembership', ['member' => $member, 'referals' => $referals]);
          }
          else{
            return view('admin.membership.viewMembership',['member' => $member]);
          }
        }
    }

    public function editMembership($id){
        $data['member']=Membership::find($id);
        return view('admin.membership.editMembership',$data);
    }

    // public function exportMembership(){
    //     return Excel::download(new MembershipsExport, 'memberships.xlsx');
    // }

    public function exportMembership(Request $request)
    {
        // Validate the date inputs
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        // Pass the date range to the export class
        return Excel::download(new MembershipsExport($startDate, $endDate), 'memberships.xlsx');
    }

   
}
