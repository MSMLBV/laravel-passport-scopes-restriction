<?php

namespace MSML\PassportScopeRestriction\Database\Factories;

use MSML\PassportScopeRestriction\Models\Client;
use Laravel\Passport\Database\Factories\ClientFactory as PassportClientFactory;

class ClientFactory extends PassportClientFactory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return array_merge(parent::definition(), [
            config('passport-scopes.allowed_scopes_column') => ['*'],
        ]);
    }
}
