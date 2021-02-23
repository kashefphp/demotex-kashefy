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
    use
        RefreshDatabase;


    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCreateDetail()
    {
        $this->withoutExceptionHandling();

        $res = $this->post('/detail', [
            'key_id' => 1,
            'value' => 'value2',
            'price' => 43,
            'kind_id' => 1,
            'kind' => 'product',
        ]);
        $res->assertOk();

    }

    public function testValueIsRequire()
    {
        $res = $this->post('/detail', [
            'key_id' => 1,
            'value' => '',
            'price' => 43,
            'kind_id' => 1,
            'kind' => 'product',
        ]);
        $errors = session('errors');
        $this->assertEquals($errors->get('value')[0], 'فیلد value الزامی است');
    }

    public function testSomeDetail()
    {
//        $this->seed();
//        $this->assertNotEquals(10, Detail::count());
    }

    public function testUpdateDetail()
    {
//        $this->withoutExceptionHandling();
        $this->post('/detail', [
            'key_id' => 1,
            'value' => 'testval1',
            'price' => 43,
            'kind_id' => 1,
            'kind' => 'product',
        ]);
        $res = Detail::first();

        $this->patch('/detail/' . $res->id, [
            'key_id' => 1,
            'value' => 'testval2',
            'price' => 43,
            'kind_id' => 1,
            'kind' => 'product',
        ]);

        $this->assertEquals('testval2', Detail::first()->value);
    }

    public function testDeleteDetail()
    {
//        $detail = Detail::first();
//
//        $detail->delete();
//
//        $this->assertDeleted($detail);
    }


}
