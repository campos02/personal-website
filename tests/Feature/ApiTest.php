<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\Fluent\AssertableJson;
use Tests\TestCase;
use App\Models\User;
use App\Models\Artist;
use App\Models\Album;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_inserting_an_artist(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->postJson('/api/artists', [
            'artists' => [
                [
                    'name' => 'Polaris',
                    'category' => 'listening'
                ]
            ]
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('artists', [
            'name' => 'Polaris',
            'category' => 'listening'
        ]);
    }

    public function test_deleting_an_artist(): void
    {
        Artist::insertArtist('Polaris', 'listening');

        $user = User::factory()->create();
        $response = $this->actingAs($user)->deleteJson('/api/artists', [
            'name' => 'Polaris',
            'category' => 'listening'
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('artists', [
            'name' => 'Polaris',
            'category' => 'listening'
        ]);
    }

    public function test_getting_artists(): void
    {
        $polaris = Artist::insertArtist('Polaris', 'listening');
        $depeche_mode = Artist::insertArtist('Depeche Mode', 'other');

        $polaris->insertAlbum('The Death of Me');
        $depeche_mode->insertAlbum('Violator');
        $depeche_mode->insertAlbum('Ultra');

        $response = $this->get('/api/artists');
        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) =>
            $json->has('data', 1)
                ->first(fn (AssertableJson $json) =>
                    $json->has('artists', 2)
                        ->has('artists.0', fn (AssertableJson $json) =>
                            $json->where('name', 'Polaris')
                                ->where('category', 'listening')
                                ->has('albums', 1)->has('albums.0', fn (AssertableJson $json) =>
                                    $json->where('artistName', 'Polaris')
                                        ->where('album', 'The Death of Me')
                                        ->etc()
                                )
                                ->etc()
                        )

                        ->has('artists.1', fn (AssertableJson $json) =>
                            $json->where('name', 'Depeche Mode')
                                ->where('category', 'other')
                                ->has('albums', 2)->has('albums.0', fn (AssertableJson $json) =>
                                    $json->where('artistName', 'Depeche Mode')
                                        ->where('album', 'Violator')
                                        ->etc()
                                )
                                ->etc()
                            )
                )
        );
    }

    public function test_inserting_artists(): void
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->postJson('/api/artists', [
            'artists' =>
                [
                    [
                        'name' => 'Polaris',
                        'category' => 'listening',
                        'albums' =>
                            [
                                [
                                    'artistName' => 'Polaris',
                                    'album' => 'The Death of Me'
                                ]
                            ]
                    ],
                    [
                        'name' => 'Depeche Mode',
                        'category' => 'other',
                        'albums' =>
                            [
                                [
                                    'artistName' => 'Depeche Mode',
                                    'album' => 'Violator'
                                ],
                                [
                                    'artistName' => 'Depeche Mode',
                                    'album' => 'Ultra'
                                ]
                            ]
                    ]
                ]
        ]);
        
        $response->assertStatus(200);

        $this->assertDatabaseHas('artists', [
            'name' => 'Polaris',
            'category' => 'listening'
        ]);

        $this->assertDatabaseHas('artists', [
            'name' => 'Depeche Mode',
            'category' => 'other'
        ]);

        $this->assertDatabaseHas('albums', [
            'artist_name' => 'Polaris',
            'album' => 'The Death of Me'
        ]);

        $this->assertDatabaseHas('albums', [
            'artist_name' => 'Depeche Mode',
            'album' => 'Violator'
        ]);

        $this->assertDatabaseHas('albums', [
            'artist_name' => 'Depeche Mode',
            'album' => 'Ultra'
        ]);
    }
}
