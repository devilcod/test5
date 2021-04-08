<?php

namespace App\Http\Livewire\User;

use Livewire\Component;;
use App\Models\User;
use Livewire\WithPagination;

class IndexUser extends Component
{
    use WithPagination;
    

    public function render()
    {
        return view('livewire.user.index-user', [
            'users' => User::paginate(3),
        ]);
    }
}
