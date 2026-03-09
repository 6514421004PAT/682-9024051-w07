@extends('../layouts.app')

@section('content')
<div class="container mx-auto p-10">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow-lg text-left">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">แก้ไขข้อมูลผู้เชี่ยวชาญ</h2>
        
        <form action="{{ route('expert.update', $expert->id) }}" method="POST">
            @csrf
            @method('PUT') {{-- สำคัญมากสำหรับการ Update --}}

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">ชื่อ (Firstname):</label>
                <input type="text" name="fname" value="{{ $expert->fname }}" class="w-full border rounded py-2 px-3 text-gray-700" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">นามสกุล (Lastname):</label>
                <input type="text" name="lname" value="{{ $expert->lname }}" class="w-full border rounded py-2 px-3 text-gray-700" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">รายละเอียด (Description):</label>
                <textarea name="description" class="w-full border rounded py-2 px-3 text-gray-700" rows="3">{{ $expert->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">ID ชุมชน (Community ID):</label>
                <input type="number" name="community_id" value="{{ $expert->community_id }}" class="w-full border rounded py-2 px-3 text-gray-700" required>
            </div>

            <div class="flex items-center justify-between mt-6">
                <a href="{{ route('expert.index') }}" class="text-gray-500 hover:text-gray-700">ยกเลิก</a>
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-6 rounded shadow">
                    อัปเดตข้อมูล
                </button>
            </div>
        </form>
    </div>
</div>
@endsection