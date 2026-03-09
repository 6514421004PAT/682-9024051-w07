<div style="padding: 20px;">
    <h2>เพิ่มชุมชน(Add Community)</h2>
    <form action="{{ route('communities.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label>ชื่อชุมชน:</label><br>
            <input type="text" name="name" style="width: 300px; padding: 5px;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label>รายละเอียด:</label><br>
            <textarea name="description" style="width: 300px; height: 100px; padding: 5px;"></textarea>
        </div>
        <button type="submit" style="padding: 5px 15px; background: green; color: white; border: none; cursor: pointer;">บันทึกข้อมูล</button>
        <a href="{{ route('communities.index') }}">ยกเลิก</a>
    </form>
</div>