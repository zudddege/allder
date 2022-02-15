<?php

namespace App\Http\Controllers\ExcelController;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller {
    public function import(Request $request) {
        if ($request->file('image') !== null) {
            $file_path = $request->file('image')->store('document', 'public');
        }

        $path = Storage::disk('public')->path($file_path);
        Excel::import(new UsersImport, $path);

        return redirect()->back();
    }

    public function export() {
        Auth::user()->id ;
        return Excel::download(new UsersExport, 'order.xlsx');
    }

}
