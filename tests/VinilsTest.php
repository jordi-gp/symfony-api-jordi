<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Symfony\Bundle\Test\Client;
use App\Entity\Artista;
use App\Entity\Vinilo;
use App\Repository\ArtistaRepository;
use DateTime;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;

class VinilsTest extends ApiTestCase
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

    #Test per comprovar que un vinil es inserit de forma correcta
    public function testVinilCreation():void
    {
        $iriArtista = $this->findIriBy(Artista::class, ['name'=>'Desakato']);

        $this->client->request('POST', '/api/vinilos',
            [
                'headers' => ['Accept: application/json'],
                'json' => [
                    'name' => 'Yes, future',
                    'artista' => $iriArtista,
                    'price' => 20,
                    'description' => 'Últim albúm del grup llançat a 2022',
                    'createdAt' => (new DateTime())->format('c')
                ]
            ]
        );
        $this->assertResponseStatusCodeSame(201);
    }

    #Test per comprovar que falla en cas que al crear un vinil no li proporcionem una artista
    public function testVinilCreationError():void
    {
        $this->client->request('POST', '/api/vinilos',
            [
                'headers' => ['Accept: application/json'],
                'json' => [
                    'name' => 'Vinilo de prueba',
                    'price' => 10,
                    'description' => 'Lorem ipsum dolor',
                    'createdAt' => (new DateTime())->format('c')
                ]
            ]
        );
        $this->assertResponseStatusCodeSame(422);
    }

    #Test per comprovar que el filtre de búsqueda per nom funciona
    public function testFilterByNameWorks():void
    {
        $response = $this->client->request('GET', '/api/vinilos?page=1&name=Com',
            [
                'headers' => ['Accept: application/json']
            ]
        );

        $this->assertCount(1, $response->toArray());
        $this->assertResponseIsSuccessful();
    }

    #Test per comprovar que el filtre de búsqueda per data funciona
    public function testFilterByDateWorks():void
    {
        $response = $this->client->request('GET', '/api/vinilos?page=1&createdAt[before]=2023-08-20&createdAt[after]=2016-01-10',
            [
                'headers' => ['Accept: application/json']
            ]
        );

        $this->assertCount(2, $response->toArray());
        $this->assertResponseIsSuccessful();
    }

    #Test per comprovar que el filtre de búsqueda per artista funciona
    public function testFilterByArtist():void
    {
        $response = $this->client->request('GET', '/api/vinilos?page=1&artista.name=Desakato',
            [
                'headers' => ['Accept: application/json']
            ]
        );

        $this->assertCount(1, $response->toArray());
        $this->assertResponseIsSuccessful();
    }

    #Test per comprovar que es poden borrar vinils de forma correcta
    public function testDeletingVinil():void
    {
        $this->client->request('DELETE', '/api/vinilos/1',
            [
                'headers' => ['Accept: application/json']
            ]
        );

        $this->assertResponseStatusCodeSame(204);
        $this->assertResponseIsSuccessful();
    }

    #Test per comprovar que si inserim un id erróni salta l'error 404
    public function testDeletingUnexistingVinil():void
    {
        $this->client->request('DELETE', '/api/vinilos/20',
            [
                'headers' => ['Accept: application/json']
            ]
        );

        $this->assertResponseStatusCodeSame(404);
    }
}
