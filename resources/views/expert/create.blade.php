@extends('../layouts.app')
@section('content')
<div class="container mx-auto p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow-lg border border-gray-100">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">เพิ่มผู้เชี่ยวชาญ</h2>
        
        <form action="{{ route('expert.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">ชื่อ (fname):</label>
                <input type="text" name="fname" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">นามสกุล (lname):</label>
                <input type="text" name="lname" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">รายละเอียด (description):</label>
                <textarea name="description" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500 outline-none" rows="3"></textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Community ID:</label>
                <input type="number" name="community_id" class="w-full border rounded p-2 focus:ring-2 focus:ring-blue-500 outline-none" required>
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('expert.index') }}" class="text-gray-500 pt-2 hover:underline">ย้อนกลับ</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2 rounded shadow-md transition">บันทึก</button>
            </div>
        </form>
    </div>
</div>
@endsection