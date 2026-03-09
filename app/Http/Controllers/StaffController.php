<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Title;
use App\Models\Organization;
use Illuminate\Http\Request;

class StaffController extends Controller
{
   
    public function index()
    {
       
        $staffs = Staff::with(['title', 'organization'])->get(); 
        return view('staff.index', compact('staffs'));
    }

    public function create()
    {
        $titles = Title::all();
        $organizations = Organization::all();
        return view('staff.create', compact('titles', 'organizations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'tit_id' => 'required',
            'org_id' => 'required',
        ]);

        Staff::create($request->all());
        return redirect()->route('staff.index')->with('success', 'บันทึกข้อมูลพนักงานสำเร็จ');
    }

    public function show(Staff $staff)
    {
        return view('staff.show', compact('staff'));
    }

    public function edit(Staff $staff)
    {
        $titles = Title::all();
        $organizations = Organization::all();
    
        return view('staff.edit', compact('staff', 'titles', 'organizations'));
    }

    public function update(Request $request, Staff $staff)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'tit_id' => 'required',
            'org_id' => 'required',
        ]);

        $staff->update($request->all());
        return redirect()->route('staff.index')->with('success', 'ปรับปรุงข้อมูลสำเร็จ');
    }

    
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'ลบข้อมูลพนักงานเรียบร้อยแล้ว');
    }
}