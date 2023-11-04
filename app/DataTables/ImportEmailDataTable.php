<?php

namespace App\DataTables;

use App\Models\ImportEmail;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ImportEmailDataTable extends DataTable
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
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\EmailSended $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ImportEmail $model)
    {
        $query = $model->newQuery()
                        ->select('id', 'path_file', 'status', 'number_faild', 'number_success');
        return $query;
    }

}
