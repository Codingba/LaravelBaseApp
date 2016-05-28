<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\Permission;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller{
   
    public function index(){
        $data=array('menuParent'=>'Roles', 'menuChild'=>'viewRoles');
        $roles=Role::all();
        return view('admin.roles.view', $data)->with(compact('roles'));
    }

    public function create(){
        $data=array('menuParent'=>'Roles', 'menuChild'=>'addRole');
        $permissions=Permission::all();
        return view('admin.roles.add', $data)->with(compact('permissions'));
    }

    public function store(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:25',
            'display_name' => 'required|max:25',
            'description' => 'required|max:25',
        ));
        $data=$request->all();
        $role=Role::create($data);
        if(array_key_exists('permissions', $data)){
            foreach($data['permissions'] as $permission_id){
                $permission=Permission::find($permission_id);
                $role->attachPermission($permission);
            }
        }
        return redirect('/admin/roles');
    }

    public function edit($id){
        $data=array('menuParent'=>'Roles', 'menuChild'=>'viewRoles');
        $role = Role::find($id);
        $permissions=Permission::all();
        $rolepremissions=$role->perms()->get();
        return view('admin.roles.edit', $data)->with(compact('role', 'permissions', 'rolepremissions'));
    }
    
    public function update(Request $request, $id){
        $role = Role::find($id);
        $this->validate($request,array(
            'name' => 'required|max:25',
            'display_name' => 'required|max:25',
            'description' => 'required|max:25'
        ));
        $data = $request->all();
        $role->detachAllPermissions();
        if(array_key_exists('permissions', $data)){
            foreach($data['permissions'] as $permission_id){
                $permission=Permission::find($permission_id);
                $role->attachPermission($permission);
            }
        }
        $role->fill($data)->save();
        return redirect('/admin/roles');
   }
    
    public function destroy($id){
        $role=Role::find($id);
        $role->delete();
       return redirect('/admin/roles');
    }
}
