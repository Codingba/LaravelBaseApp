<?php namespace App;

use Illuminate\Support\Facades\DB;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{

    protected $fillable = ['name', 'display_name', 'description'];

    public function detachAllPermissions(){
        DB::table('permission_role')->where('role_id', $this->id)->delete();
        return true;
    }

}