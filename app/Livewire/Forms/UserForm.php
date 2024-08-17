<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Form;

class UserForm extends Form
{
    public $id = null;
    public $name = null;
    public $email = null;
    public $password = null;
    public $confirmPassword = null;
    public $role = null;

    protected function rules()
    {
        if($this->id){
            return [
                'role' => 'required'
            ];
        } else {

            return [
                'name' => 'required|min:5',
                'email' => 'required|email|unique:users,email,'.$this->id,
                'password' => 'required|min:8|same:confirmPassword',
                'role' => 'required'
            ];
        }
    }

    public function save()
    {
        try {
            $userArr = [
                'name' => $this->name,
                'email' => $this->email,
            ];
        
            $userArr['password'] = Hash::make($this->password);
        
            $user = User::create($userArr);
            $user->assignRole($this->role);
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit()
    {
        try {
            //code...
            $user = User::find($this->id);
            $userArr = [
                'role'=>$this->role
            ];
            $user->update($userArr);
            DB::table('model_has_roles')->where('model_id',$this->id)->delete();
        
            $user->assignRole($this->role);
        } catch (\Exception $e) {
            dd($e);
        }

    
    }

    public function destroy()
    {
       try {
           User::where('id', $this->id)->update(['status'=>'N']);
       } catch (\Exception $e) {
           dd($e);
       }
    }
}
