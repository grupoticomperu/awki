<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Cliente;

class ClientesIndex extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";

    public $search;

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $clientes = Cliente::where('user_id', auth()->user()->id)
                        ->where('nombres','LIKE','%' . $this->search . '%')
                        ->latest('id')
                        ->paginate();
        return view('livewire.admin.clientes-index', compact('clientes'));
    }
}
