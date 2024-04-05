<?php

namespace Modules\Companies\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Companies\DTO\CompanyDto;
use Modules\Companies\DTO\CompanyTransactionsDto;
use Modules\Companies\Service\CompanyService;
use Modules\Companies\Validation\CompanyValidation;
use Modules\Common\Helper\UploaderHelper;
use App\Models\CompanyTransactions;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    use UploaderHelper, CompanyValidation;
    private $CompanyService;
    public function __construct(CompanyService $CompanyService)
    {
        $this->middleware(['auth', 'prevent-back-history']);
        $this->CompanyService = $CompanyService;
    }
    public function index(Request $request)
    {
   
        $companies = $this->CompanyService->findAll();
        if ($request->ajax()) {
            return response()->json(['data' => $companies]);
        }
        return view('companies::company.index', ['companies' => $companies]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $randomString = Str::random(10); 
        return view('companies::company.create',['randomString'=>$randomString]);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data = (new CompanyDto($request))->dataFromRequest();
         $this->CompanyService->save($data);
        return redirect('admin/companies')->with('created', 'created');
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('company::show');
    }
    public function edit($id)
    {
         $company = $this->CompanyService->findById($id);
         return view('companies::company.edit', compact('company'));
    }
    public function update(Request $request)
    {
        $data = $request->except('_token');
         $data = (new CompanyDto($request))->dataFromRequest();
        $admin = $this->CompanyService->update($request->id, $data);
        return redirect('admin/companies')->with('updated', 'updated');
       
    }
    public function delete($id)
    {
        $this->CompanyService->delete($id);
        return redirect()->back()->with('deleted', 'deleted');
    
    }
    public function addTransaction( Request $request)
    {
        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }


          $companies=Company::where('user_id',$main_id)->where('visible',1)->get();
        return view('companies::company.addTransaction',['companies'=>$companies]);
    }

    public function createTransaction(Request $request)
    {
        $data = $request->except('_token');
       $data = (new CompanyTransactionsDto($request))->dataFromRequest();
        $this->CompanyService->saveTransactions($data);
        return redirect("/admin/companies/viewTransaction")->with('created','created');
    }

    public function viewTransaction(Request $request)
    {

        if( Auth::user()->role=='isAdmin')
        {
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->id;
        }else{
            $user_id=Auth::user()->id;
            $main_id=Auth::user()->owner_id;
        }

          $companies=Company::where(function ($query) use($user_id,$main_id) {
            $query->whereUserId($user_id)
                  ->orWhere('user_id', '=',$main_id);
        })->where('visible',1)->pluck('id');

        $CompanyTransactions=  CompanyTransactions::wherein('company_id',$companies)->with('Company')->get();
       
        return view('companies::company.viewTransaction',['CompanyTransactions'=>$CompanyTransactions]);
    
    }
    public function confirmTransaction($transId,Request $request)
    {
    
        CompanyTransactions::whereId($transId)->update(array('status'=>2));
        $CompanyTransactions= CompanyTransactions::whereId($transId)->first();
        $amount=  $CompanyTransactions->amount;
        $companyId= $CompanyTransactions->company_id;
        $cashAccount= Company::whereId($companyId)->first()->cash_account;
        $newCashAccountAmount=$amount+$cashAccount;
        Company::whereId($companyId)->update(array('cash_account'=>$newCashAccountAmount));
        return redirect()->back()->with('confirmed', 'confirmed');
    
    }
    
    
    
}
