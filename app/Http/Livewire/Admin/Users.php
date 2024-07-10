<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search;

    // Esta función le dice a Liveware, que este atento a cambios en la propiedad "$search".
    public function updatingSearch()
    {
        $this->resetPage(); // nos retorna a la primera página.
    }

    public function assignRole(User $user, $value)
    {
        if ($value == '1') {
            $user->assignRole('admin');
        } else {
            $user->removeRole('admin');
        }
    }

    // Está función trae primero los usuario que no coincidan con el email del usuario atutenticado,
    // y luego a esa consulta, se le aplican los dos filtros por name y por email.
    // Es como si primero ubiesemos hecho una subconsulta.
    public function render()
    {
        $users = User::where('email', '<>', auth()->user()->email)
            ->where(function ($query) {
                $query->where('name', 'LIKE', '%' . $this->search . '%');
                $query->orwhere('email', 'LIKE', '%' . $this->search . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate(5);

        return view('livewire.admin.users', compact('users'))->layout('layouts.admin');
    }
}
