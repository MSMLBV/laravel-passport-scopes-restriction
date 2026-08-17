<?php

namespace MSML\PassportScopeRestriction;

use MSML\PassportScopeRestriction\Commands\SyncClientScopesCommand;
use MSML\PassportScopeRestriction\Models\Client;
use MSML\PassportScopeRestriction\Models\Token;
use MSML\PassportScopeRestriction\Observers\TokenObserver;
use Laravel\Passport\Passport;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PassportClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-passport-scopes-restriction')
            ->hasConfigFile('passport-scopes')
            ->hasMigration('add_allowed_scopes_column_to_oauth_clients_table')
            ->hasCommand(SyncClientScopesCommand::class);
    }

    public function bootingPackage(): void
    {
        Passport::useTokenModel(Token::class);
        Passport::useClientModel(Client::class);

        Passport::tokenModel()::observe(TokenObserver::class);
    }
}
