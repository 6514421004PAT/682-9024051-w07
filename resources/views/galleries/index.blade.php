<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">สวัสดี</h1>
    <a href="{{ route('galleries.create') }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
       เพิ่มรูปภาพใหม่
    </a>

    <table class="min-w-full border-collapse border border-gray-300 shadow-sm mt-4">
        <thead class="bg-gray-100">
            <tr>
                <th class="border border-gray-300 px-4 py-2">ข้อมูล</th>
                <th class="border border-gray-300 px-4 py-2">.....</th>
                <th class="border border-gray-300 px-4 py-2">.....</th>
                <th class="border border-gray-300 px-4 py-2">.....</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $item)
            <tr class="hover:bg-gray-50">
                <td class="border border-gray-300 px-4 py-2 text-center">{{ $item->id }}</td>
                <td class="border border-gray-300 px-4 py-2">{{ $item->title }}</td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    @if($item->image_path)
                        <img src="{{ asset('storage/' . $item->image_path) }}" width="100" class="mx-auto rounded">
                    @else
                        No Image
                    @endif
                </td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <form action="{{ route('galleries.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded text-sm"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>