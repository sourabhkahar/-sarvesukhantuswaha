<?php
use Livewire\Volt\Component;
use App\Livewire\Forms\UserForm;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Livewire\Attributes\Computed;

new class extends Component {
    public UserForm $form; 
    public $id ;
    public function with(): array{
        return [
            'Roles' => Role::get()
         ];
    }


    public function save(){
        $this->validate();
        $this->form->edit();
        session()->flash('message', 'Role Created Successfully');
        $this->redirect("/admin/roles/", navigate: true);
        
    }

    public function mount($id){
        $this->form->id = $id;
        $user = User::find($id);
        $this->form->name = $user->name;
        $this->form->email = $user->email;
        $this->form->role = $user->getRoleNames()[0]??'';
        // dd( );
        // $this->form->role = $role->email;
        // $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        //     ->where("role_has_permissions.role_id", $id)
        //     ->get();

        // foreach ($rolePermissions  as $key => $rolePermission) {
        //     $this->form->rolePermission[] = $rolePermission->name;
        // }
    }

    #[Computed]
    public function disableField()
    {
        return in_array($this->form->name,['super-admin','dev']);
    }

   
}
?>
<div>
    <div><strong>Edit User</strong></div>
    <form wire:submit='save'>

        <x-title class="mt-4" wire:model="form.name" caption="Name" name="'name'" disabled/>
        <x-field-error :messages="$errors->get('form.name')" class="mt-2 required" />

        <x-title class="mt-4" wire:model="form.email" caption="Email" name="'email'" disabled/>
        <x-field-error :messages="$errors->get('form.email')" class="mt-2 required" />

        {{-- <x-title class="mt-4" wire:model="form.password" caption="Password" name="'password'" disabled/>
        <x-field-error :messages="$errors->get('form.password')" class="mt-2 required" />

        <x-title class="mt-4" wire:model="form.confirmPassword" caption="Confirm Password" name="'confirmPassword'" disabled/>
        <x-field-error :messages="$errors->get('form.confirmPassword')" class="mt-2 required" /> --}}

        <div class="mt-4">
            <label class="block mb-3 text-sm font-medium text-black dark:text-white">
                Select Option
            </label>
            <div x-data="{ isOptionSelected: false }" class="relative z-20 bg-white dark:bg-form-input">
                <select
                    class="relative z-20 w-full py-3 pl-5 pr-12 transition bg-transparent border rounded outline-none appearance-none border-stroke focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input"
                    :class="isOptionSelected &amp;&amp; 'text-black dark:text-white'" @change="isOptionSelected = true"
                    wire:model="form.role">
                    <option value="">
                        Select Role
                    </option>
                    @foreach ($Roles as $item)
                    <option value="{{$item->name}}">
                        {{$item->name}}
                    </option>
                    @endforeach
                </select>
                <span class="absolute z-20 -translate-y-1/2 right-4 top-1/2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g opacity="0.8">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                fill="#637381"></path>
                        </g>
                    </svg>
                </span>
            </div>
            <x-field-error :messages="$errors->get('form.role')" class="mt-2 required" />
        </div>


        <div class="flex mt-6">
            <button class="flex justify-center p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
                wire:loading.attr="disabled">
                <svg class="hidden w-5 h-5 mr-3 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24" wire:loading.class="animate-spin" wire:loading.class.remove="hidden"
                    wire:target="save">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor"
                        d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                    </path>
                </svg>
                Submit
            </button>
            <a class="flex justify-center p-3 ml-2 font-medium bg-red-500 rounded text-gray hover:bg-opacity-90"
                href="{{route('roles.index')}}" type="button" wire:navigate>
                Cancel
            </a>
        </div>
    </form>
</div>