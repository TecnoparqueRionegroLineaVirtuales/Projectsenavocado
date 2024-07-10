<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserEdit extends Component
{
    public $user, $userId;

    public $readForm = [
        'name' => '', 
    ];

    public $editForm = [
        'role_id' => '',
        'model_id' => ''
    ];

    public function mount($id)
    {
        $this->getRoles();
        $this->userId = $id;
        $this->read();
    }

    public function getRoles()
    {
        $this->roles = Role::all();
    }

    public function read()
    {
        $this->user = User::find($this->userId);

        $this->readForm['name'] = $this->user->name;
        $this->editForm['role_id'] = $this->user->role_id;
    }

    /*public function edit()
    {
        
    }*/

    public function update()
    {
        $this->user->roles()->sync($this->editForm['role_id']);

        $this->user->save();

        $this->emit('updated');
    }

    public function render()
    {
        return view('livewire.admin.user-edit')->layout('layouts.admin');
    }
}
