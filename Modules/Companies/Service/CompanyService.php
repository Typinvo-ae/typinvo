<?php


namespace Modules\Companies\Service;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\Company;
use App\Models\CompanyTransactions;
use Modules\Common\Helper\UploaderHelper;

class CompanyService
{
    use UploaderHelper;
    function findAll()
    {
        return Company::where('visible',1)->get();
    }
    function findById($id)
    {
        return Company::find($id);
    }
   
    function findBy($key, $value)
    {
        return Company::where($key, $value)->get();
    }
    function save($data)
    {
       Company::create($data);
     
    }
    function saveTransactions($data)
    {
        CompanyTransactions::create($data);
    }

    function update($id, $data)
    {
        $Company = $this->findById($id);
        $Company->update($data);
    }
    function delete($id)
    {
        Company::whereId($id)->update(array('visible'=>0));
    }
 

  
}
