<?php

namespace Tests\Feature;

use App\ControlNode;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class nodesTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetAllnodess()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/nodes');
        $response->assertStatus(200);
    }

    public function testGetnodessById()
    {
        $response = $this->get('/nodes');

        $response->assertStatus(200);
    }

    public function testGetnodesByType()
    {
        $response = $this->get('/nodes');

        $response->assertStatus(200);
    }

    public function testPostNodes()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/nodes',$this->getNodeData());
        $this->assertCount(1, ControlNode::all());
        $response->assertSessionHas('message','Control node created');
    }

    public function testPutNodes()
    {
        $response = $this->put('/nodes');

        $response->assertStatus(200);
    }

    public function testDeleteNodes()
    {
        $response = $this->delete('/nodes');

        $response->assertStatus(200);
    }

    public function getNodeData(): array
    {

        factory(User::class, 1)->create();
        return [
            'node_city' => $this->faker->address,
            'node_subcity' => $this->faker->address,
            'node_woreda' => $this->faker->randomDigit,
            'node_name' => $this->faker->word,
            'node_kebela' => $this->faker->randomDigit,
            'node_detail' => $this->faker->paragraph,
            'node_manager' => User::first()->id,
            'node_type' => $this->faker->randomElement(array('central', 'child'))
        ];
    }


}

