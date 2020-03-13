<?php

namespace Tests\Feature;

use App\Helpers\PublicId;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class PublicIdTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test public id is a valid uuid
     *
     * @return void
     */
    public function testGeneratePublicId()
    {
        $uuid = PublicId::getUnique(new \App\User());
        $this->assertNotNull($uuid);
        $this->assertIsString($uuid);
        $this->assertTrue(Str::isUuid($uuid));
    }

    /**
     * Test if user public id exists
     */
    public function testExistsPublicId()
    {
        $user = factory(\App\User::class)->create();
        $result = PublicId::isUnique($user, $user->public_id);
        $this->assertNotNull($result);
        $this->assertTrue($result);
    }
}
