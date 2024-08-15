<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public $name = '';
    public $rolePermission = [];
    public $id = null;

    protected function rules()
    {
        return [
            'name' => 'required|min:5|unique:roles,name,'.$this->id,
            'rolePermission' => 'array|min:1|required',
        ];
    }

    public function save(){
        try {
            //code...
            $role = Role::create(['name' => $this->name]);
            $role->syncPermissions($this->rolePermission);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit(){
        try {
            
            $role = Role::find($this->id);
            $role->name = $this->name;
            $role->save();
            $role->syncPermissions($this->rolePermission);

        } catch (\Exception $e) {
            dd($e);
        }
    }

    
     public function destroy()
     {
        try {
            Role::where('id', $this->id)->delete();
        } catch (\Exception $e) {
            dd($e);
        }
     }
}
