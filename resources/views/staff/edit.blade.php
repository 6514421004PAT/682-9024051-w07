@extends('../layouts.app')

@section('content')
<div class="w-2/3 mx-auto my-10">
    <div class="row">
        <div class="my-4 text-center font-bold">
            <h2 class="text-2xl">Edit Staff</h2>
        </div>
        <div class="pull-right mb-4">
            <a class="font-bold rounded text-xs bg-gray-500 hover:bg-gray-600 text-white py-2 px-4" href="{{ route('staff.index') }}">
                Back
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-4" role="alert">
        <p class="font-bold">{{ $message }}</p>
    </div>
    @endif

    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <form action="{{ route('staff.update', $staff->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <select name="tit_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none">
                    @foreach ($titles as $item)
                        <option value="{{ $item->id }}" @selected($item->id == $staff->tit_id)>
                            {{ $item->tit_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Firstname:</label>
                <input class="shadow border rounded w-full py-2 px-3 text-gray-700" name="fname" type="text" value="{{ $staff->fname }}">
                @error('fname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Lastname:</label>
                <input class="shadow border rounded w-full py-2 px-3 text-gray-700" name="lname" type="text" value="{{ $staff->lname }}">
                @error('lname') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Organization:</label>
                <select name="org_id" class="shadow border rounded w-full py-2 px-3 text-gray-700">
                    @foreach ($organizations as $item)
                        <option value="{{ $item->id }}" @selected($item->id == $staff->org_id)>
                            {{ $item->org_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none">
                    Update Staff
                </button>
            </div>
        </form>
    </div>
</div>
@endsection