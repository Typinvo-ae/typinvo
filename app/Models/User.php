<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use App\Models\RolePermission;
use Illuminate\Support\Facades\Hash;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded =[];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
 
    public function scopeRole($query)
    {
       
        if( Auth::user()->role=='isAdmin')
        {
            return $query->where('owner_id', '=',  Auth::user()->id);
        }elseif(Auth::user()->role=='isUser')
        {
            return $query->where('employee_id', '=',  Auth::user()->id);
        }
    
    }
  
    public function isSuperAdmin()    
    {
        $role=  User::whereId($this->id)->first()->role;
        if($role=='isSuperAdmin')
            return true;
      
        return false;
    }
    public function isAdmin()    
    {
        $role=  User::whereId($this->id)->first()->role;
        if(  $role=='isAdmin')
            return true;
        return false;
    }

    public function PROFIL()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(1)->first())
            return true;
        return false;
    }

    public function SETTINGS_General()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(2)->first())
            return true;
        return false;
    }


    public function SETTINGS_Payment_Type()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(3)->first())
            return true;
        return false;
    }

    public function SETTINGS_Edit_Inoice()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(4)->first())
            return true;
        return false;
    }

    public function SETTINGS_Department()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(5)->first())
            return true;
        return false;
    }

    public function Edit_Tax_Services()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(6)->first())
            return true;
        return false;
    }
    public function Edit_Permissions()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(7)->first())
            return true;
        return false;
    }

    
    public function Add_User()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(8)->first())
            return true;
        return false;
    }

    public function Edit_User()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(9)->first())
            return true;
        return false;
    }

    public function View_User()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(10)->first())
            return true;
        return false;
    }
    public function Add_Payment_Expenses()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(11)->first())
            return true;
        return false;
    }
    public function Dashboard_User()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(12)->first())
            return true;
        return false;
    }
    public function Dashboard_Company()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(13)->first())
            return true;
        return false;
    }
    public function Invoice_View_Mine()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(14)->first())
            return true;
        return false;
    }

    public function Invoice_View_All()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(15)->first())
            return true;
        return false;
    }

    public function Invoice_government_fees()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(16)->first())
            return true;
        return false;
    }

    public function Invoice_printing_fees()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(17)->first())
            return true;
        return false;
    }
    public function Invoice_priniting_client()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(18)->first())
            return true;
        return false;
    }
  
    public function Invoice_taxes()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(19)->first())
            return true;
        return false;
    }

    public function Invoice_discount()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(20)->first())
            return true;
        return false;
    }

    public function View_Company()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(21)->first())
            return true;
        return false;
    }
    public function Edit_Company()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(22)->first())
            return true;
        return false;
    }

    public function Delete_Company()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(23)->first())
            return true;
        return false;
    }
    public function Add_Balance_Company()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(24)->first())
            return true;
        return false;
    }

    public function Add_Tax_Services()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(25)->first())
            return true;
        return false;
    }

    public function Delete_Tax_Services()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(26)->first())
            return true;
        return false;
    }


    public function View_Balance_Company()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(27)->first())
            return true;
        return false;
    }
  

    public function Accept_Balance_Company()    
    {
        if( RolePermission::whereUserId($this->id)->wherePermissionId(28)->first())
            return true;
        return false;
    }

}
