<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery; 
use App\Models\Community; // เพิ่มการนำเข้า Model Community สำหรับหน้า Create/Edit
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // 1. เพิ่มฟังก์ชัน index เพื่อดึงข้อมูลมาแสดงผล (แก้ Error ที่คุณเจอ)
    public function index()
    {
        // ดึงข้อมูล Gallery พร้อมความสัมพันธ์ของ Community
        $galleries = Gallery::with('community')->get(); 
        return view('galleries.index', compact('galleries'));
    }

    // 2. เพิ่มฟังก์ชัน create เพื่อเปิดหน้าฟอร์มเพิ่มรูป
    public function create()
    {
        $communities = Community::all(); // ดึงข้อมูลชุมชนไปให้เลือกใน Dropdown
        return view('galleries.create', compact('communities'));
    }

    // 3. ฟังก์ชัน store (ที่คุณเขียนไว้)
    public function store(Request $request) 
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'community_id' => 'required' 
        ]);

        $path = $request->file('image')->store('galleries', 'public');

        Gallery::create([
            'title' => $request->title,
            'image_path' => $path,
            'community_id' => $request->community_id
        ]);

        return redirect()->route('galleries.index')->with('success', 'บันทึกรูปภาพเรียบร้อย');
    }

    public function destroy(Gallery $gallery)
    {
        if ($gallery->image_path) {
            Storage::disk('public')->delete($gallery->image_path);
        }
        
        $gallery->delete();
        return redirect()->route('galleries.index')->with('success', 'ลบรูปภาพแล้ว');
    }
}