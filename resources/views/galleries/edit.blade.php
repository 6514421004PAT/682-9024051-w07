<div style="padding: 20px;">
    <h2>แก้ไขข้อมูลรูปภาพ (Edit Gallery)</h2>
    <form action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label>ชื่อภาพ:</label><br>
            <input type="text" name="title" value="{{ $gallery->title }}" style="width: 300px; padding: 5px;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label>เปลี่ยนชุมชน:</label><br>
            <select name="community_id" style="width: 312px; padding: 5px;" required>
                @foreach($communities as $community)
                    <option value="{{ $community->id }}" {{ $gallery->community_id == $community->id ? 'selected' : '' }}>
                        {{ $community->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label>รูปภาพปัจจุบัน:</label><br>
            <img src="{{ asset('storage/' . $gallery->image_path) }}" width="150" style="margin-bottom: 10px;"><br>
            <label>เปลี่ยนรูปภาพ (ปล่อยว่างไว้หากไม่ต้องการเปลี่ยน):</label><br>
            <input type="file" name="image">
        </div>
        <button type="submit" style="padding: 5px 15px; background: blue; color: white; border: none; cursor: pointer;">บันทึกการแก้ไข</button>
        <a href="{{ route('galleries.index') }}">ยกเลิก</a>
    </form>
</div>