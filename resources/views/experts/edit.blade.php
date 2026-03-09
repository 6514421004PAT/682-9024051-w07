<h1>แก้ไขข้อมูล</h1>
<form action="{{ route('experts.update', $expert->id) }}" method="POST">
    @csrf @method('PUT')
    <input type="text" name="fname" value="{{ $expert->fname }}"><br>
    <input type="text" name="lname" value="{{ $expert->lname }}"><br>
    <textarea name="description">{{ $expert->description }}</textarea><br>
    <input type="number" name="community_id" value="{{ $expert->community_id }}"><br>
    <button type="submit">อัปเดต</button>
</form>