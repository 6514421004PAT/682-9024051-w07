<div style="padding: 20px;">
    <h2>แก้ไขชุมชน (Edit Community)</h2>
    <form action="{{ route('communities.update', $community->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label>ชื่อชุมชน:</label><br>
            <input type="text" name="name" value="{{ $community->name }}" style="width: 300px; padding: 5px;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label>รายละเอียด:</label><br>
            <textarea name="description" style="width: 300px; height: 100px; padding: 5px;">{{ $community->description }}</textarea>
        </div>
        <button type="submit" style="padding: 5px 15px; background: blue; color: white; border: none; cursor: pointer;">อัปเดตข้อมูล</button>
        <a href="{{ route('communities.index') }}">ยกเลิก</a>
    </form>
</div>