<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Symfony\Bundle\Test\Client;
use App\Entity\User;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;

class UsersTest extends ApiTestCase
{
    private Client $client;

    #Creació d'un client autènticat gastat durant els tests
    protected function setUp():void
    {
        parent::setUp();
        $this->client = static::createClient();
        $encoder = $this->client->getContainer()->get(JWTEncoderInterface::class);
        $this->client = static::createClient([], ["auth_bearer"=>$encoder->encode(["username"=>"user", "role"=>["ROLE_USER"]])]);
    }

    public function testGetCollectionReturnValidData(): void
    {
        $response = $this->client->request('GET', '/api/users',
            [
                'headers' => ['Accept: application/json']
            ]
        );

        $this->assertResponseIsSuccessful();
        $this->assertMatchesResourceCollectionJsonSchema(User::class, null, 'json');
        $this->assertCount(2, $response->toArray());
    }

    public function testLogin(): void
    {
        #Solicitud a la api amb les credencials d'usuari
        $response = $this->client->request('POST', '/login', [
            'headers' => ['Content-Type: application/json'],
            'json' => [
                'username' => 'admin',
                'password' => 'admin'
            ]
        ]);

        $json = $response->toArray();
        $this->assertResponseIsSuccessful();
        $this->assertArrayHasKey('token', $json);

        #En cas de fer el login de forma correcta
        $this->client->request('GET', '/api/users',
            [
                'auth_bearer' => $json['token'],
                'headers'=> ['Accept: application/json']
            ]);
        $this->assertResponseIsSuccessful();
    }

    public function testWrongLogin():void
    {
        #Solicitud a la api sense les credencials d'usuari
        $this->client->request('POST', '/login', [
            'headers' => ['Content-Type: application/json'],
            'json' => [
                //'username' => 'admin',
                'password' => 'admin'
            ]
        ]);

        $this->assertResponseStatusCodeSame(400);
    }

    public function testJsonFormatIsNotGiven():void
    {
        $this->client->request('POST', '/login', [
            'headers' => ['Content-Type: application/json']
        ]);

        $this->assertResponseStatusCodeSame(400);
    }
}
