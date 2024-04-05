<?php

namespace App\Providers;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();
        
         Gate::define('isSuperAdmin', function(User $user) {
            return $user->isSuperAdmin();
         });
        Gate::define('isAdmin', function($user) {
            return $user->isAdmin();
        });
        Gate::define('PROFIL', function($user) {
            return $user->PROFIL();
        });
        Gate::define('SETTINGS_General', function($user) {
            return $user->SETTINGS_General();
        });
        Gate::define('SETTINGS_Payment_Type', function($user) {
            return $user->SETTINGS_Payment_Type();
        });
        Gate::define('SETTINGS_Edit_Inoice', function($user) {
            return $user->SETTINGS_Edit_Inoice();
        });
        Gate::define('SETTINGS_Department', function($user) {
            return $user->SETTINGS_Department();
        });
        Gate::define('Edit_Tax_Services', function($user) {
            return $user->Edit_Tax_Services();
        });
        
        Gate::define('Add_Balance', function($user) {
            return $user->Add_Balance();
        });
        Gate::define('Edit_Tax_Services', function($user) {
            return $user->Edit_Tax_Services();
        });
        Gate::define('Add_Payment_Expenses', function($user) {
            return $user->Add_Payment_Expenses();
        });
        Gate::define('Edit_Permissions', function($user) {
            return $user->Edit_Permissions();
        });
        Gate::define('Add_User', function($user) {
            return $user->Add_User();
        });
        Gate::define('Edit_User', function($user) {
            return $user->Edit_User();
        });
        Gate::define('View_User', function($user) {
            return $user->View_User();
        });
        Gate::define('Dashboard_User', function($user) {
            return $user->Dashboard_User();
        });
        Gate::define('Dashboard_Company', function($user) {
            return $user->Dashboard_Company();
        });
        Gate::define('Invoice_View_Mine', function($user) {
            return $user->Invoice_View_Mine();
        });
        Gate::define('Invoice_View_All', function($user) {
            return $user->Invoice_View_All();
        });
        Gate::define('Invoice_government_fees', function($user) {
            return $user->Invoice_government_fees();
        });
        Gate::define('Invoice_printing_fees', function($user) {
            return $user->Invoice_printing_fees();
        });
        Gate::define('Invoice_priniting_client', function($user) {
            return $user->Invoice_priniting_client();
        });
        Gate::define('Invoice_taxes', function($user) {
            return $user->Invoice_taxes();
        });
        Gate::define('Invoice_discount', function($user) {
            return $user->Invoice_discount();
        });
        Gate::define('View_Company', function($user) {
            return $user->View_Company();
        });
        Gate::define('Edit_Company', function($user) {
            return $user->Edit_Company();
        });
        Gate::define('Delete_Company', function($user) {
            return $user->Delete_Company();
        });


        Gate::define('Add_Balance_Company', function($user) {
            return $user->Add_Balance_Company();
        });
        Gate::define('Add_Tax_Services', function($user) {
            return $user->Add_Tax_Services();
        });
        Gate::define('Delete_Tax_Services', function($user) {
            return $user->Delete_Tax_Services();
        });
        Gate::define('View_Balance_Company', function($user) {
            return $user->View_Balance_Company();
        });
        Gate::define('Accept_Balance_Company', function($user) {
            return $user->Accept_Balance_Company();
        });
      

    }
}

