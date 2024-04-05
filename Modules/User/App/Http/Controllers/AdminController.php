<?php

namespace Modules\User\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\DTO\AdminDto;
use Modules\User\Service\AdminService;
use Modules\MemberShip\Service\MemberShipService;
use Modules\User\Validation\AdminValidation;
use Modules\Common\Helper\UploaderHelper;


class AdminController extends Controller
{

    use UploaderHelper, AdminValidation;
   
    public function __construct(AdminService $AdminService,MemberShipService $MemberShipService)
    {
        $this->middleware(['auth', 'prevent-back-history']);
        $this->AdminService = $AdminService;
        $this->MemberShipService = $MemberShipService;
    }

    public function index(Request $request)
    {
         $admins = $this->AdminService->findAll('isAdmin');
        if ($request->ajax()) {
            foreach($admins as $key=>$value)
            {
                if(empty($value['image']))
                {
                    $value['image']=  asset('admin/images/portrait/small/avatar-s-11.jpg');
                }else{
                    $value['image']=asset('uploads/user').'/'.$value['image'];
                }
            }
            return response()->json(['data' => $admins]);
        }
        return view('user::admin.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $memberShips = $this->MemberShipService->findAll();
        return view('user::admin.create', ['memberShips' => $memberShips]);
    }

    public function unActiveAdmins(Request $request)
    {
        if (empty($request->unactive))
            return redirect('admin/admins')->with('error', 'error');
            
        $this->AdminService->updateUnactive($request->unactive);
        return redirect('admin/admins')->with('updated', 'updated');
    }

    public function store(Request $request)
    {
      
        $data = $request->except('_token');
        $validation = $this->validateStoreAdmin($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
        $data = (new AdminDto($request))->dataFromRequest();
         $this->AdminService->save($data);
        return redirect('admin/admins')->with('created', 'created');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('admin::show');
    }

    public function edit($id)
    {
         $admin = $this->AdminService->findById($id);
         $memberShips = $this->MemberShipService->findAll();
        return view('user::admin.edit', compact('admin','memberShips'));
    }


    public function update(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateUpdateAdmin($data, $request->id);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new AdminDto($request))->dataFromRequest();
        $admin = $this->AdminService->update($request->id, $data);
        return redirect('admin/admins')->with('updated', 'updated');
    }

    public function destroy($id, Request $request)
    {
        $this->AdminService->delete($id);
        return response()->json(['data' => 'success'], 200);
    }

    public function activate($id)
    {
        $this->AdminService->activate($id);
        return redirect('admin/admins')->with('updated', 'updated');
    }
}
