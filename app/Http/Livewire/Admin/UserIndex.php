<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UserIndex extends Component
{
    use WithPagination;
    protected $paginationTheme='bootstrap';
    public $search ;
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $users= User::where('name','LIKE','%'.$this->search .'%')
                    ->orWhere('name','LIKE','%'.$this->search .'%')
                    ->latest('id')
                    ->paginate(4);
        return view('livewire.admin.user-index',compact('users'));
    }
}
