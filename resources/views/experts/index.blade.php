<h1>รายชื่อผู้เชี่ยวชาญ</h1>
<a href="{{ route('experts.create') }}"> + เพิ่มผู้เชี่ยวชาญ</a>

<table border="1" style="width:100%; margin-top:10px;">
    <thead>
        <tr>
            <th>ชื่อ-นามสกุล</th>
            <th>รายละเอียด</th>
            <th>จัดการ</th>
        </tr>
    </thead>
    <tbody>
        @foreach($experts as $expert)
        <tr>
            <td>{{ $expert->fname }} {{ $expert->lname }}</td>
            <td>{{ $expert->description }}</td>
            <td>
                <a href="{{ route('experts.edit', $expert->id) }}">แก้ไข</a>
                <form action="{{ route('experts.destroy', $expert->id) }}" method="POST" style="display:inline;">
                    @csrf @method('DELETE')
                    <button type="submit" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>