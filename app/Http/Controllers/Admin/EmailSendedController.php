<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmailSendedDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailSendedController extends Controller
{

    const PAGINATE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emailSendeds = [];
        return view('admin.email-sendeds.index', compact('emailSendeds'));
    }

    public function indexByDataTable(Request $request, EmailSendedDataTable $emailTemplateDataTable)
    {
        return $emailTemplateDataTable->ajax();
    }
}
