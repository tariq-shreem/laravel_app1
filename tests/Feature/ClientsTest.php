<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_get_clients_data()
    {
        $response = $this->get('/clients');

        $response->assertStatus(200)
        ->assertSee('Clients Index');
    }

    public function test_table_content_is_valid()
    {
        $tableData = ['name', 'phone', 'email', 'edit', 'delete'];

        $response = $this->get('/clients');

        foreach ($tableData as $data)
        {
            $response->assertSee($data);
        }
    }


    /**
     * @return void
     */
    public function test_open_create_new_client_page()
    {
        $response = $this->get('/clients/create');

        $response->assertStatus(200)->assertSee('Create New Client');
    }

    public function test_store_new_client_action_without_validation_error()
    {
        $data = [
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'phone'=> '01000000000'
        ];

        $response = $this->post('/clients/store', $data);

        $response->assertRedirect('/clients');
    }

    public function test_store_new_client_action_with_validation_error()
    {
        $data = [
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'phone'=> '01000'
        ];

        $response = $this->post('/clients/store', $data);

        $response->assertStatus(302);
    }


    public function test_edit_client_page_with_correct_id()
    {
        $data = [
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'phone'=> '01000000000'
        ];

        $client = Client::firstOrNew($data);

        $response = $this->get('/clients/edit/'. $client->id);
        $response->assertStatus(200);
    }


    public function test_edit_client_page_with_wrong_id()
    {
        $response = $this->get('/clients/edit/'. 100000);
        $response->assertStatus(404);
    }



    public function test_update_client_without_validation_error()
    {
        $data = [
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'phone'=> '01000000000',
        ];

        $client = Client::firstOrNew($data);
        $updateData = array_merge($data, ['client_id' => $client->id]);

        $response = $this->put('clients/update', $updateData);
        $response->assertRedirect('clients');
    }


    public function test_update_client_with_validation_error()
    {
        $data = [
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'phone'=> '01000000000',
        ];

        $response = $this->put('clients/update', $data);
        $response->assertStatus(302);
    }


    public function test_delete_client()
    {
        $data = [
            'name' => 'ahmed',
            'email' => 'ahmed@gmail.com',
            'phone'=> '01000000000',
        ];

        $client = Client::firstOrNew($data);

        $response = $this->delete('clients/delete', ['client_id' => $client->id]);
        $response->assertRedirect('clients');
    }

}
