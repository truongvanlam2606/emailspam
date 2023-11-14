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
            ->editColumn('status', function ($exam) {
                if ($exam->status == 1) {
                    return 'Chưa Tiến Hành';
                } else if ($exam->status == 2) {
                    return 'Đang Tiến Hành';
                } else if ($exam->status == 3) {
                    return 'Đã Tiến Hành';
                } else {
                    return 'Lỗi';
                }
            })
            ->addColumn('action', function ($item) {
                return '
                <div>
                    <form id="retry-'. $item->id .'" action="'. route('admin.import-email.retry', $item->id).'" method="post" style="">
                        <input name="_method" type="hidden" value="post">
                        <input type="hidden" name="_token" value="' . csrf_token().'">
                        <button class="btn btn-sm btn-info" type="submit"> Thử lại </button>
                    </form>
                </div>
                ';
            });
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
                        ->select('id', 'path_file', 'status', 'number_faild', 'number_success', 'message', 'retry')
                        ->latest();
        return $query;
    }

}
