<?php

namespace App\Http\Controllers;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    public function viewMembership($id){
        $data['member']=Membership::find($id);
        return view('admin.membership.viewMembership',$data);
     }
}
