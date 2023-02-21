<?php

namespace App\Tests;

use ApiPlatform\Symfony\Bundle\Test\ApiTestCase;
use ApiPlatform\Symfony\Bundle\Test\Client;
use App\Entity\Artista;
use Lexik\Bundle\JWTAuthenticationBundle\Encoder\JWTEncoderInterface;

class ArtistsTest extends ApiTestCase
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

    public function testGetArtistCollectionReturnsValidData(): void
    {
        $response = $this->client->request('GET', '/api/artistas',
            [
                'headers' => ['Accept: application/json']
            ]
        );

        $this->assertResponseIsSuccessful();
        $this->assertMatchesResourceCollectionJsonSchema(Artista::class, null, 'json');
        $this->assertCount(2, $response->toArray());
    }
}
