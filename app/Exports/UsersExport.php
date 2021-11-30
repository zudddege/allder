<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;


class UsersExport implements FromCollection
{
    use exportable;

    private $flieName = "user.xlsx";
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return User::all();
    }
}
