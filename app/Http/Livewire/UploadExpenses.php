<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Actions\Expenses\UploadExpensesFile;
class UploadExpenses extends Component
{
    use WithFileUploads;

    public $file;
    public function save()
    {
        //parse file
        UploadExpensesFile::parse($this->file->getRealPath());

    }

    public function render()
    {
        return view('livewire.upload-expenses');
    }
}
