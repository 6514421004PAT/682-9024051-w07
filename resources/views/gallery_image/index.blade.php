@extends('../layouts.app')


@section('title','ebd-w01-lecturer')


@section('header')
    <h1 class="anuphan-700 text-center text-6xl text-red-600">Lecturer</h1>
@endsection
   
@section('content')
    <div class="container mx-auto">
        <div class="overflow-x-auto">
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>แกลลอรี</th>
                        <th>ภาพ</th>
                        <th>คำอธิบาย</th>	
                    </tr>
                </thead>
                <tbody>
<tbody>
    @foreach ($galleryImages as $item) 
    <tr class="hover:bg-gray-50 border-b">
        <td class="p-4">{{ $item->id }}</td>
    </tr>
    @endforeach
</tbody>
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->gallery->name }}
                            {{ $item->image_path }}
                            {{ $item->description }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
