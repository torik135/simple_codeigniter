<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * 
 */
class NewsSeeder extends Seeder
{
  
  public function run()
  {
    $data = [
      'title' => 'this is new',
      'slug' => 'this-is-new',
      'body' => 'THIS IS NEW',
    ];

    $this->db->table('news')->insert($data);

  }
}
