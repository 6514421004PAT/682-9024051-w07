@extends('../layouts.app')

@section('content')
<div class="w-2/3 mx-auto my-10">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">ข้อมูล</h2>
        <a class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded text-xs" href="{{ route('staff.index') }}">
            Back
        </a>
    </div>

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('staff.store') }}" method="POST">
            @csrf

             <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">ID</label>
                <input class="shadow border rounded w-full py-2 px-3 text-gray-700" name="fname" type="text" placeholder="Enter ID" value="{{ old('fname') }}">
                @error('fname') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">ชื่อ</label>
                <input class="shadow border rounded w-full py-2 px-3 text-gray-700" name="fname" type="text" placeholder="Enter Firstname" value="{{ old('fname') }}">
                @error('fname') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">นามสกุล</label>
                <input class="shadow border rounded w-full py-2 px-3 text-gray-700" name="lname" type="text" placeholder="Enter Lastname" value="{{ old('lname') }}">
                @error('lname') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Organization:</label>
                <select name="org_id" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    <option value="">-- Select Organization --</option>
                    @foreach ($organizations as $item)
                        <option value="{{ $item->id }}">{{ $item->org_name }}</option>
                    @endforeach
                </select>
                @error('org_id') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-center mt-6">
                <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-10 rounded focus:outline-none">
                    Save Staff
                </button>
            </div>
        </form>
    </div>
</div>
@endsection