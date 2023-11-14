<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmailTemplateDataTable;
use App\DataTables\SmtpEmailDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\SmtpEmailRequest;
use App\Models\EmailTemplate;
use App\Models\SmtpEmail;
use Illuminate\Http\Request;

class SmtpEmailController extends Controller
{

    const PAGINATE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $smtpEmails = [];
        return view('admin.smtp-emails.index', compact('smtpEmails'));
    }

    public function indexByDataTable(Request $request, SmtpEmailDataTable $smtpEmailDataTable)
    {
        return $smtpEmailDataTable->ajax();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.smtp-emails.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SmtpEmailRequest $request) {

        $data = $request->validated();

        $smtpEmail = SmtpEmail::create($data);
        if (!$smtpEmail) {
            return response()->json([
                'code' => 1,
                'message' => 'Create error'
            ]);
        }

        return response()->json([
            'code' => 0,
            'message' => 'Create smtpEmail success !'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $smtpEmail = SmtpEmail::find($id);
        if (!$smtpEmail) {
            abort(404);
        }

        return view('admin.smtp-emails.edit', compact('smtpEmail'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SmtpEmailRequest $request, $id) {

        $data = $request->validated();
        $smtpEmail = SmtpEmail::find($id);

        if (!$smtpEmail) {
            return response()->json([
                'code' => 1,
                'message' => 'Update error'
            ]);
        }
        $smtpEmail->update($data);

        return response()->json([
            'code' => 0,
            'message' => 'Update smtpEmail success !'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $smtpEmail = SmtpEmail::find($id);
        if (!$smtpEmail) {
            session()->flash('error', __("Question not found"));
        }
        $smtpEmail->delete();
        session()->flash('success', __("Successful delete"));
        return redirect()->route('admin.smtp-email.index');
    }

    public function show($id) {

        $smtpEmail = SmtpEmail::find($id);

        if (!$smtpEmail) {
            return response()->json([
                'code' => 1,
                'message' => 'Notfound smtpEmail'
            ]);
        }

        return response()->json([
            'code' => 0,
            'data' => $smtpEmail
        ]);
    }

}
