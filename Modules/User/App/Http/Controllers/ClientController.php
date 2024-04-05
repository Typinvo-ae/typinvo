<?php

namespace Modules\User\App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\User\DTO\ClientDto;
use Modules\User\Service\ClientService;
use Modules\User\Validation\ClientValidation;
use Modules\Common\Helper\UploaderHelper;
use  App\Models\UserPermissions;
use  App\Models\RolePermission;
use  App\Models\User;
use App\Models\Permission;


class ClientController extends Controller
{

    use UploaderHelper, ClientValidation;
    private $ClientService;
    public function __construct(ClientService $ClientService)
    {
        $this->middleware(['auth', 'prevent-back-history']);
        $this->ClientService = $ClientService;
    }

    public function index(Request $request)
    {
        $clients = $this->ClientService->findAll();
        $unActiveClients = $this->ClientService->UnCtiveUsers();
        if ($request->ajax()) {
            return response()->json(['data' => $clients]);
        }
        return view('user::client.index', ['clients' => $clients, 'unActiveClients' => $unActiveClients]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('user::client.create');
    }

    public function unActiveClients(Request $request)
    {
        if (empty($request->unactive))
            return redirect('admin/clients')->with('error', 'error');
            
        $this->ClientService->updateUnactive($request->unactive);
        return redirect('admin/clients')->with('updated', 'updated');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $validation = $this->validateStoreClient($data);
        if ($validation->fails()) return redirect()->back()->withInput()->withErrors($validation);
        $data = (new ClientDto($request))->dataFromRequest();
        $this->ClientService->save($data);
        return redirect('admin/clients')->with('created', 'created');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('client::show');
    }

    public function edit($id)
    {
        $OutOfRole=[2,3,4,7,8,9,10,21,22,23,25,26,28];
        $cat_permissionsData = Permission::orderby('order_data','asc')->whereNotIn('id', $OutOfRole)->get();
        $cat_permissions=    $cat_permissionsData->groupBy('category');
        $rolePermissions =  RolePermission::where('user_id',$id)->pluck('permission_id')->toArray();
      
        $client = $this->ClientService->findById($id);
         return view('user::client.edit', compact('client','cat_permissions','rolePermissions','id'));
    }


    public function update(Request $request)
    {
      
        $data = $request->except('_token');
        $validation = $this->validateUpdateClient($data, $request->id);
        if ($validation->fails()) return redirect()->back()->withErrors($validation);
        $data = (new ClientDto($request))->dataFromRequest();
        $admin = $this->ClientService->update($request->id, $data);
        return redirect('admin/clients')->with('updated', 'updated');
    }

    public function destroy($id, Request $request)
    {
        $this->ClientService->delete($id);
        return response()->json(['data' => 'success'], 200);
    }

    public function activate($id)
    {
        $this->ClientService->activate($id);
        return redirect('admin/clients')->with('updated', 'updated');
    }
}
