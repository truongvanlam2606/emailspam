<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmailSendedDataTable;
use App\DataTables\ImportEmailDataTable;
use App\Http\Controllers\Controller;
use App\Jobs\ImportEmailJob;
use App\Models\EmailTemplate;
use App\Models\ImportEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImportEmailController extends Controller
{

    const PAGINATE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $importEmails = [];
        return view('admin.import-emails.index', compact('importEmails'));
    }

    public function indexByDataTable(Request $request, ImportEmailDataTable $emailTemplateDataTable)
    {
        return $emailTemplateDataTable->ajax();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emailTemplates = EmailTemplate::get();
        return view('admin.import-emails.create', compact('emailTemplates'));
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $file = $request->file('file');
        $fileName = strval(Str::uuid()) . $file->getClientOriginalName();
        Storage::put($fileName, $file->getContent());
        $path = 'storage/app/' . $fileName;

        $importEmail = ImportEmail::create([
            'path_file' => $path,
            'status' => 1,
            'email_template_id' => $request->get('email_template_id'),
        ]);
        ImportEmailJob::dispatch($importEmail);

        return redirect()->route('admin.import-email.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function retry($id)
    {
        $importEmail = ImportEmail::findOrFail($id);
        $importEmail->retry += 1;
        $importEmail->status = 1;
        $importEmail->number_success = 0;
        $importEmail->number_faild = 0;
        $importEmail->save();
        ImportEmailJob::dispatch($importEmail);

        return redirect()->route('admin.import-email.index');
    }
}
