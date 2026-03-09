<h1>เพิ่มข้อมูลผู้เชี่ยวชาญ</h1>
<form action="{{ route('experts.store') }}" method="POST">
    @csrf
    <input type="text" name="fname" placeholder="ชื่อ" required><br>
    <input type="text" name="lname" placeholder="นามสกุล" required><br>
    <textarea name="description" placeholder="รายละเอียด"></textarea><br>
    <input type="number" name="community_id" placeholder="ID ชุมชน" required><br>
    <button type="submit">บันทึก</button>
</form>