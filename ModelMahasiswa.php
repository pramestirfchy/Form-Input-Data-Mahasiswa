Script ModelMahasiswa.php

<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'nim_19230371'; 
    protected $primaryKey = 'nim';
    protected $allowedFields = ['nim', 'nama', 'kelas', 'prodi', 'email'];
}
