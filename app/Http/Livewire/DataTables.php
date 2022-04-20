<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class DataTables extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $active = 1;
    public $search;
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'active', 'sortAsc', 'sortField'];

    public function updatingSearch(){
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if($this->sortField == $field){
            $this->sortAsc = !$this->sortAsc;
        }else{
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function render()
    {
        //$posts = Post::with(['photo','categories','user'])->paginate(10);
        //return view('livewire.data-tables', compact('posts');
        return view('livewire.data-tables',
            [
                'posts'=>Post::where('active',$this->active)
                    ->where(function($query){
                        $query->where('title', 'like', '%' . $this->search .'%')
                            ->orWhere('body','like', '%' . $this->search .'%')
                            ->orWhereHas('categories', function ($query) {
                                $query->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->with(['photo','categories','user'])
                    ->when($this->sortField, function($query){
                        $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                    });
                    })
                    ->paginate(10)
            ]);
    }
}
