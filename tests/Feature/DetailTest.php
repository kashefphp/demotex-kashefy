<?php

namespace Tests\Feature;

use App\Models\Detail;
use App\Models\User;
use Database\Seeders\DetailSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailTest extends TestCase
{
//    use
//        RefreshDatabase;



    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateDetail()
    {
        $d = new Detail([
            'key' => 'key',
            'value' => 'value',
            'price' => 23,
            'detailable_id' => 1,
            'detailable_type' => 'App\Model\Product',
        ]);

        $this->assertEquals('key', $d->key);

    }

    public function testSomeDetail()
    {
        $this->seed();
        $this->assertNotEquals(10, Detail::count());
    }

    public function testEditDetail()
    {
        $detail = Detail::first();

        $detail->update([
            'key'=>'key',
            'value'=>'val',
            'price'=> 250,
            'detailable_id'=>1,
            'detailable_type'=>'App\Models\ProductCategory',
        ]);

        $this->assertEquals('key', $detail->key);
    }

    public function testDeleteDetail()
    {
        $detail = Detail::first();

        $detail->delete();

        $this->assertDeleted($detail);
    }


}
