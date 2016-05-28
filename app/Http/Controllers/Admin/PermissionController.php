<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;

class PermissionController extends Controller{
    
    public function index(){
        $data=array('menuParent'=>'Permissions', 'menuChild'=>'viewPermissions');
        $permissions=Permission::all();
        return view('admin.permissions.view', $data)->with(compact('permissions'));
    }

    public function create(){
        $data=array('menuParent'=>'Permissions', 'menuChild'=>'addPermission');
        return view('admin.permissions.add', $data);
    }

    public function store(Request $request){
        $this->validate($request,array(
            'name' => 'required|max:25',
        ));
        $data=$request->all();
        $permissions=Permission::create($data);
        $role = Role::where('name', 'Admin')->first();
        $role->attachPermission($permissions);
        return redirect('/admin/permissions');
    }

    public function edit($id){
        $data=array('menuParent'=>'Permissions', 'menuChild'=>'viewPermissions');
        $permission = Permission::find($id);
        return view('admin.permissions.edit', $data)->with(compact('permission'));
    }

    public function update(Request $request, $id){
        $permission = Permission::find($id);
        $this->validate($request,array(
            'name' => 'required|max:25',
            'display_name' => 'required|max:25',
            'description' => 'required|max:25'
        ));
             
        $data = $request->all();
        $permission->fill($data)->save();
        return redirect('/admin/permissions');
        
    }

    public function destroy($id){
        $permission=Permission::find($id);
        $permission->delete();
        return redirect('/admin/permissions');
    }
}
