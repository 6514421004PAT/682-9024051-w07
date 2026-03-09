<div class="container mx-auto p-6">
    <div class="flex justify-between mb-6">
        <h2 class="text-2xl font-bold">Communities List</h2>
        <a href="{{ route('communities.create') }}" class="btn btn-primary">Add New</a>
    </div>

    <table class="table w-full shadow-lg">
        <thead>
            <tr class="bg-gray-100">
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($communities as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td class="flex gap-2">
                    <a href="{{ route('communities.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('communities.destroy', $item->id) }}" method="POST">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-error" onclick="return confirm('Delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>