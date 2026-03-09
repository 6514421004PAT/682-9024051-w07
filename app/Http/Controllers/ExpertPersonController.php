<?php

namespace App\Http\Controllers;

use App\Models\ExpertPerson;
use Illuminate\Http\Request;

class ExpertPersonController extends Controller
{
    // แสดงรายการทั้งหมด
    public function index() {
        $experts = ExpertPerson::all();
        return view('experts.index', compact('experts'));
    }

    // หน้าฟอร์มเพิ่มข้อมูล
    public function create() {
        return view('experts.create');
    }

    // บันทึกข้อมูลใหม่
    public function store(Request $request) {
        ExpertPerson::create($request->all());
        return redirect()->route('experts.index');
    }

    // หน้าฟอร์มแก้ไข
    public function edit($id) {
        $expert = ExpertPerson::findOrFail($id);
        return view('experts.edit', compact('expert'));
    }

    // อัปเดตข้อมูล
    public function update(Request $request, $id) {
        $expert = ExpertPerson::findOrFail($id);
        $expert->update($request->all());
        return redirect()->route('experts.index');
    }

    // ลบข้อมูล
    public function destroy($id) {
        ExpertPerson::destroy($id);
        return redirect()->route('experts.index');
    }
}