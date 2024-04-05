<?php
namespace Modules\MemberShip\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\MemberShip\DTO\MemberShipDto;
use Modules\MemberShip\Service\MemberShipService;
use Modules\MemberShip\Validation\MemberShipValidation;
use Modules\Common\Helper\UploaderHelper;


class MemberShipController extends Controller
{

    use UploaderHelper, MemberShipValidation;
    private $MemberShipService;
    public function __construct(MemberShipService $MemberShipService)
    {
        $this->middleware(['auth', 'prevent-back-history']);
        $this->MemberShipService = $MemberShipService;
    }

    public function index(Request $request)
    {
           $memberships = $this->MemberShipService->findAll();
         
      
        return view('membership::membership.index', ['memberships' => $memberships]);
    }
 
    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('membership::show');
    }

    public function edit($id)
    {
         $membership = $this->MemberShipService->findById($id);
        return view('membership::membership.edit', compact('membership'));
    }
    public function update(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateUpdateMembership($data, $request->id);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new MemberShipDto($request))->dataFromRequest();
        $membership = $this->MemberShipService->update($request->id, $data);
        return redirect('admin/memberships')->with('updated', 'updated');
    }
 
}
