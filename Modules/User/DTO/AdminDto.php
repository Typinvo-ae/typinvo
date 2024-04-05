<?php


namespace Modules\User\DTO;


class AdminDto
{

    public $name;
    public $phone;
    public $password;
    public $image;
    public $is_active;
    public $membership_id;
    

    public function __construct($request)
    {

        $this->name = $request->get('name');
        $this->email = $request->get('email');
        $this->phone = $request->get('phone');
     
        $this->membership_id = $request->get('membership_id');
        $this->role = 'isAdmin';
        if ($request->get('password')) $this->password =  bcrypt($request->get('password'));
        if ($request->hasFile('image')) $this->image   = $request->file('image');
        $this->is_active   = isset($request['is_active']) ? 1 :0;
    }

    public function dataFromRequest()
    {
        $data =  json_decode(json_encode($this), true);
        if ($data['password'] == null) unset($data['password']);
        if ($data['image'] == null) unset($data['image']);
        return $data;
    }

}
