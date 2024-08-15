<?php
use Livewire\Volt\Component;
use App\Livewire\Forms\RoleForm;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Livewire\Attributes\Computed;

new class extends Component {
    public RoleForm $form; 
    public $id = [];
    public function with(): array{
        return [
          'Permission' => Permission::get()
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
        $role = Role::find($id);
        $this->form->name = $role->name;
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();

        foreach ($rolePermissions  as $key => $rolePermission) {
            $this->form->rolePermission[] = $rolePermission->name;
        }
    }

    #[Computed]
    public function disableField()
    {
        return in_array($this->form->name,['super-admin','dev']);
    }

   
}
?>
<div>
    <div><strong>Add Roles</strong></div>
    <form wire:submit='save'>
        <x-title  class="mt-4" wire:model="form.name" caption="Name" name="'name'" value="{{$form->name}}" disabled/>
        <x-field-error :messages="$errors->get('form.name')" class="mt-2 required" />
            <div class="min-w-[370px] max-w-max rounded-md border border-stroke py-1 dark:border-strokedark mt-4" >
                <ul class="flex flex-col">
                @foreach ($Permission as $item)
                    <li class="flex items-center gap-2.5 border-b border-stroke px-5 py-3 last:border-b-0 dark:border-strokedark">
                        <x-check-box wire:model="form.rolePermission" caption="{{$item->name}}" name="{{$item->name}}" value="{{$item->name}}" checkedprop="'{{in_array($item->name,$this->form->rolePermission)}}'" disabledInput="{{ $this->disableField() }}"/>
                    </li>
                @endforeach
                </ul>
            </div>
        <x-field-error :messages="$errors->get('form.rolePermission')" class="mt-2 required" />
       
        <div class="flex mt-6">
            <button class="flex justify-center p-3 font-medium rounded bg-primary text-gray hover:bg-opacity-90"
                wire:loading.attr="disabled" {{ $this->disableField()?'disabled':''}}>
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