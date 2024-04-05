<?php

namespace Modules\Settings\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Settings\DTO\PaymentTypeDto;
use Modules\Settings\Service\PaymentTypeService;
use Modules\Settings\Validation\PaymentTypeValidation;

class PaymentTypeController extends Controller
{
  use PaymentTypeValidation;
    private $PaymentTypeService;
    public function __construct(PaymentTypeService $PaymentTypeService)
    {
        $this->PaymentTypeService = $PaymentTypeService;
    }
    public function index(Request $request)
    {
        $paymentType = $this->PaymentTypeService->findAll();
        if($request->ajax()){
            return response()->json(['data' => $paymentType]);
        }
        return view('settings::paymentType.index',['paymentType' => $paymentType]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $userId=auth()->user()->id ;
        return view('settings::paymentType.create',['userId'=>$userId]);
    }
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateStore($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
        $data = (new PaymentTypeDto($request))->dataFromRequest();
         $this->PaymentTypeService->save($data);
        return redirect('/admin/paymentType')->with('created','created');
    }
    public function edit($id)
    {
        $paymentType = $this->PaymentTypeService->findById($id);
        $userId=auth()->user()->id ;
        return view('settings::paymentType.edit',compact('paymentType','userId'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        $validation = $this->validateUpdate($data);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new PaymentTypeDto($request))->dataFromRequest();
        $this->PaymentTypeService->update($id,$data);
        return redirect('admin/paymentType')->with('updated','updated');
    }

   
}
