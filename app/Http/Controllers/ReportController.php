<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    function index()
    {
        return view('report.user',[
            'users' =>User::get()
        ]);
    }

    function document()
    {
        return view('report.document',[
            'documents' =>Document::get()
        ]);
    }
}
