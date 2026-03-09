<div style="padding: 20px;">
    <h2>รายชื่อชุมชน (Communities)</h2>
    <a href="{{ route('communities.create') }}" style="text-decoration: none; color: blue;">+ เพิ่มชุมชนใหม่</a>
    
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: #f2f2f2;">
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">ID</th>
                <th style="border: 1px solid #ddd; padding: 12px; text-align: left;">ชื่อชุมชน</th>
                <th style="border: 1px solid #ddd; padding: 12px; text-align: center;">จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @forelse($communities as $community)
            <tr>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $community->id }}</td>
                <td style="border: 1px solid #ddd; padding: 10px;">{{ $community->name }}</td>
                <td style="border: 1px solid #ddd; padding: 10px; text-align: center;">
                    <a href="{{ route('communities.edit', $community->id) }}">แก้ไข</a> | 
                    <form action="{{ route('communities.destroy', $community->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button type="submit" style="color: red; border: none; background: none; cursor: pointer;" onclick="return confirm('ยืนยันการลบ?')">ลบ</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="border: 1px solid #ddd; padding: 20px; text-align: center;">ยังไม่มีข้อมูลชุมชน</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>