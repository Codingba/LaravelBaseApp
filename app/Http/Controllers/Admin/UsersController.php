<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(){
        $data=array('menuParent'=>'Users', 'menuChild'=>'viewUsers');
        $users=User::all();
        return view('admin.users.index', $data)->with(compact('users'));
    }

    public function create(){
        $data=array('menuParent'=>'Users', 'menuChild'=>'addUser');
        $roles=Role::all();
        return view('admin.users.add', $data)->with(compact('roles'));
    }

    public function store(Request $request){
        $this->validate($request,array(
                'name' => 'required|min:3|max:25',
                'last_name' => 'required|min:3|max:35',
                'email' => 'required|confirmed|email|max:50|unique:users',
                'password' => 'required|confirmed|min:6'
            )
        );
        $data=$request->all();
        $data['password']=bcrypt($data['password']);
        $user=User::create($data);
        $role = Role::where('name', '=', 'user')->firstOrFail();
        $user->roles()->attach($role->id);
        return redirect('/admin/users');
    }

    public function edit($id){
        $data=array('menuParent'=>'Users', 'menuChild'=>'viewUsers');
        $user = User::find($id);
        $roles=Role::all();
        return view('admin.users.edit', $data)->with(compact('user', 'roles'));

    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $this->validate($request,array(
                'name' => 'required|max:25',
                'last_name' => 'required|min:3|max:35',
                'password' => 'confirmed|min:6'
            )
        );
        $data=$request->all();
        if($data['password']!=""){
            $data['password']=bcrypt($data['password']);
        } else {
            unset($data['password']);
        }
        $user->detachAllRoles();
        if(array_key_exists('roles', $data)){
            foreach($data['roles'] as $role_id){
                $role=Role::find($role_id);
                $user->attachRole($role);
            }
        }
        $user->fill($data)->save();
        return redirect('/admin/users');
    }

    public function destroy($id){
        if($id == 1){
            abort(403);
        }
        $user=User::find($id);
        $user->delete();
        return redirect('/admin/users');
    }
}
