<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class CompanyTransactions extends Model
{
    protected $table = 'company_transactions';
    protected $guarded = [];

    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
