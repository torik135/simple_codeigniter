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
      [
        'title' => 'this is new 1',
        'slug' => 'this-is-new-1',
        'body' => 'THIS IS NEW 1',
      ],
      [
        'title' => 'this is new 2',
        'slug' => 'this-is-new-2',
        'body' => 'THIS IS NEW 2',
      ],
      [
        'title' => 'this is new 3',
        'slug' => 'this-is-new-3',
        'body' => 'THIS IS NEW 3',
      ],
      [
        'title' => 'this is new 4',          
        'slug' => 'this-is-new-4',
        'body' => 'THIS IS NEW 4',
      ],
      [
        'title' => 'this is new 5',
        'slug' => 'this-is-new-5',
        'body' => 'THIS IS NEW 5',
      ],
      [
        'title' => 'this is new 6',
        'slug' => 'this-is-new-6',
        'body' => 'THIS IS NEW 6',
      ],
      [
        'title' => 'this is new 7',          
        'slug' => 'this-is-new-7',
        'body' => 'THIS IS NEW 7',
      ],
      [
        'title' => 'this is new 8',
        'slug' => 'this-is-new-8',
        'body' => 'THIS IS NEW 8',
      ],
      [
        'title' => 'this is new 9',
        'slug' => 'this-is-new-9',
        'body' => 'THIS IS NEW 9',
      ],
      [
        'title' => 'this is new 10',
        'slug' => 'this-is-new-10',
        'body' => 'THIS IS NEW 10',
      ],
      [
        'title' => 'this is new 11',
        'slug' => 'this-is-new-11',
        'body' => 'THIS IS NEW 11',
      ],
    ];

    $this->db->table('news')->insertBatch($data);

  }
}
