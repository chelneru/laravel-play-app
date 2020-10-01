<?php

namespace App\Http\Livewire;

use App\Imports\TransactionsImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
class UploadExpenses extends Component
{
    use WithFileUploads;

    public $file;
    public function save()
    {
        //parse file
        Excel::import(new TransactionsImport(), $this->file->getRealPath());


    }

    public function render()
    {
        return view('livewire.upload-expenses');
    }
}
