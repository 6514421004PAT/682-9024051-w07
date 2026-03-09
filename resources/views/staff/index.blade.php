@extends('../layouts.app')

@section('title','Staff List')

@section('header')
    <h1 class="text-center text-6xl text-red-600 font-bold my-6">หน่วยงานราชการ</h1>
@endsection
   
@section('content')
    <div class="container mx-auto px-4">
        <div class="mb-6">
            <a class="font-bold rounded text-sm bg-blue-500 hover:bg-blue-600 text-white py-3 px-6 shadow-lg transition duration-200"
             href="{{ route('staff.create') }}"> + เพิ่มข้อมูล</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 shadow-sm" role="alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="table-auto w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-gray-700 uppercase text-sm">
                        <th class="px-6 py-4 border-b">ID</th>
                        <th class="px-6 py-4 border-b">ชื่อ-นามสกุล</th>
                        <th class="px-6 py-4 border-b">หน่วยงาน</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 text-sm">
                    @foreach ($staffs as $item) 
                    <tr class="hover:bg-gray-50 transition duration-150">
                        <td class="px-6 py-4 border-b">{{ $item->id }}</td>
                        <td class="px-6 py-4 border-b font-medium">
                            {{ $item->title->tit_name ?? '' }} {{ $item->fname }} {{ $item->lname }}
                        </td>
                        <td class="px-6 py-4 border-b">
                            {{ $item->organization->org_name ?? 'ไม่ระบุ' }}
                        </td>
                        <td class="px-6 py-4 border-b text-center">
                            <form action="{{ route('staff.destroy', $item->id) }}" method="POST" class="flex justify-center space-x-2">
                                <a class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded" href="{{ route('staff.edit', $item->id) }}">Edit</a>
                                <a class="bg-blue-400 hover:bg-blue-500 text-white px-3 py-1 rounded" href="{{ route('staff.show', $item->id) }}">Detail</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded" onclick="return confirm('ยืนยันการลบข้อมูล?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection