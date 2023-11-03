<?php

namespace App\DataTables;

use App\Models\EmailTemplate;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class EmailTemplateDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {

        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($question) {
                return '<a href="'. route('admin.email-template.edit', $question->id).'" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a> <a href="'. route('admin.email-template.delete', $question->id).'" data-id="'.$question->id.'" class="btn btn-sm btn-danger btn-delete actionDelete"><i class="fa fa-trash"></i></a>';
            })
            ->editColumn('created_at', function ($question) {
                return $question->created_at ? $question->created_at->format('d-m-Y') : ' ';
            })
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EmailTemplate $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EmailTemplate $model)
    {
        $query = $model->newQuery()
                        ->select('id', 'content', 'name' , 'created_at');
        return $query;
    }

}
