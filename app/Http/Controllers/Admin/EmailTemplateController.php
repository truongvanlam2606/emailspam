<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EmailTemplateDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmailTemplateRequest;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;

class EmailTemplateController extends Controller
{

    const PAGINATE = 10;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $emailTemplates = [];
        return view('admin.email-templates.index', compact('emailTemplates'));
    }

    public function indexByDataTable(Request $request, EmailTemplateDataTable $emailTemplateDataTable)
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
        return view('admin.email-templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmailTemplateRequest $request) {

        $data = $request->validated();

        $emailTemplate = EmailTemplate::create($data);
        if (!$emailTemplate) {
            return response()->json([
                'code' => 1,
                'message' => 'Create error'
            ]);
        }

        return response()->json([
            'code' => 0,
            'message' => 'Create emailTemplate success !'
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
        $emailTemplate = EmailTemplate::find($id);
        if (!$emailTemplate) {
            abort(404);
        }

        return view('admin.email-templates.edit', compact('emailTemplate'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmailTemplateRequest $request, $id) {

        $data = $request->validated();
        $emailTemplate = EmailTemplate::find($id);

        if (!$emailTemplate) {
            return response()->json([
                'code' => 1,
                'message' => 'Update error'
            ]);
        }
        $emailTemplate->update($data);

        return response()->json([
            'code' => 0,
            'message' => 'Update emailTemplate success !'
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
        $emailTemplate = EmailTemplate::find($id);
        if (!$emailTemplate) {
            session()->flash('error', __("Question not found"));
        }
        $emailTemplate->delete();
        session()->flash('success', __("Successful delete"));
        return redirect()->route('admin.emailTemplate.index');
    }

    public function show($id) {

        $emailTemplate = EmailTemplate::find($id);

        if (!$emailTemplate) {
            return response()->json([
                'code' => 1,
                'message' => 'Notfound emailTemplate'
            ]);
        }

        return response()->json([
            'code' => 0,
            'data' => $emailTemplate
        ]);
    }

}
