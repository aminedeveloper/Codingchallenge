<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    // this function is responsable to make automated tests
    
    public function createProducttest(){
        $this->visit('addproduct')
             ->type('samsung s10', 'productname')
             ->type('samsung s10 is the best smartphone in the world ', 'productdescription')
             ->type(800.5, 'productprice')
             ->attach(asset('productsimages/1610220701.PNG'), 'productimage')
             ->type(1, 'category_parent_product')
             ->press('addproduct');

    }
}
