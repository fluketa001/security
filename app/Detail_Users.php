<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail_Users extends Model
{
    //* การตั้งชื่อไฟล์จะใช้ชื่อตารางโดยตัด(s)ออก เช่น ตารางชื่อ blogs ก็จะตั้งชื่อเป็น Blog.php แต่หากจะตั้งแบบอื่นก็ได้ แล้วระบุชื่อตารางที่ต้องการ เช่น
    protected $table = 'detail_users'; // กำหนดชื่อของตารางที่ต้องการเรียกใช้
}
