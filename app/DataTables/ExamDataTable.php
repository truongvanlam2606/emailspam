<?php

namespace App\DataTables;

use App\Models\Exam;
use App\examt;
use App\Models\Question;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ExamDataTable extends DataTable
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
            ->addColumn('action', function ($exam) {
                return   '<a href="'. route('admin.exam.show', $exam->id).'" class="btn btn-sm btn-warning"><i class="fa fa-eye"></i></a>'
                        .'<a href="'. route('admin.exam.edit', $exam->id).'" class=" ml-2 btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>'
                        .'<a href="'. route('admin.exam.delete', $exam->id).'" data-id="'.$exam->id.'" class=" ml-2 btn btn-sm btn-danger btn-delete actionDelete"><i class="fa fa-trash"></i></a>';
            })
            ->editColumn('type', function ($exam) {
                return $exam->getNameType();
            })
            ->editColumn('created_at', function ($exam) {
                return $exam->created_at ? $exam->created_at->format('d-m-Y') : ' ';
            })
            ->rawColumns(['action']);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Exam $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Exam $model)
    {
        $query = $model->newQuery();
        return $query;
    }

}
