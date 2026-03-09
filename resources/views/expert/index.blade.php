@extends('../layouts.app')
@section('content')
<div class="container mx-auto p-10">
    <h1 class="text-3xl font-bold mb-5 text-gray-800">รายชื่อผู้เชี่ยวชาญ</h1>
    <a href="{{ route('expert.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded transition shadow"> + เพิ่มรายชื่อ</a>
    
    <table class="w-full mt-5 border-collapse border border-gray-300 shadow-sm">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="border border-gray-300 px-4 py-2">ID</th>
                <th class="border border-gray-300 px-4 py-2">ชื่อ-นามสกุล</th>
                <th class="border border-gray-300 px-4 py-2">รายละเอียด</th>
                <th class="border border-gray-300 px-4 py-2">Community ID</th>
                <th class="border border-gray-300 px-4 py-2">จัดการข้อมูล</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($experts as $item)
            <tr class="hover:bg-gray-50 transition">
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->fname }} {{ $item->lname }}</td>
                <td class="border border-gray-300 px-4 py-2 text-sm text-gray-600">{{ $item->description }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->community_id }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <div class="flex justify-center gap-2">
                        <a href="{{ route('expert.edit', $item->id) }}" class="bg-yellow-400 hover:bg-yellow-500 p-1 px-3 rounded text-sm shadow">Edit</a>
                        
                        <form action="{{ route('expert.destroy', $item->id) }}" method="POST" onsubmit="return confirm('ยืนยันการลบ?')">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white p-1 px-3 rounded text-sm shadow">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection