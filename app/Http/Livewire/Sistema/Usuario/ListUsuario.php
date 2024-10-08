<?php

namespace App\Http\Livewire\Sistema\Usuario;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ListUsuario extends Component
{
    use WithPagination;
    public $attribute = '';
    public $message = '';
    public $showMessage = false;

    //Metodo de reinicio de buscador
    public function updatingAttribute()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        $user = User::DeleteUsuario($id);
        if ($user) {
            $this->message = 'Eliminado correctamente';
        } else {
            $this->message = 'Error al eliminar';
        }
        $this->showMessage = true;
    }

    public function render()
    {
        $users = User::GetUsuarios($this->attribute, 'ASC', 20);
        return view('livewire.sistema.usuario.list-usuario', compact('users'));
    }
}
