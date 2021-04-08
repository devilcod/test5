<?php

namespace App\Http\Livewire\User;

use LivewireUI\Modal\ModalComponent;

class EditUser extends ModalComponent
{
    public function render()
    {
        return view('livewire.user.edit-user');
    }
}
