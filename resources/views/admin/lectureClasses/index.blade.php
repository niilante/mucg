@extends('layouts.admin_datatable')
@section('title', __('All School Classes'))
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-layers bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ trans('cruds.lectureClass.title') }} {{ trans('global.list') }}</h5>
                            <span>Registered {{ trans('cruds.lectureClass.title') }} with last updated on top</span>
                        </div>
                    </div>
                </div>
                @can('lecture_class_create')
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <div>
                                <a href="{{route('admin.lecture-classes.create')}}" class="btn btn-outline-info">
                                    <i class="ik ik-plus-square"></i>
                                    {{ trans('global.add') }} {{ trans('cruds.lectureClass.title_singular') }}
                                </a>
                            </div>
                        </nav>
                    </div>
                @endcan
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dt-responsive">
                            @include('admin.lectureClasses.list_table')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @parent
        <script>
            $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('lecture_class_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.lecture-classes.massDestroy') }}",
            className: 'btn-danger',
            action: function (e, dt, node, config) {
            var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                return $(entry).data('entry-id')
            });

            if (ids.length === 0) {
                alert('{{ trans('global.datatables.zero_selected') }}')

                return
            }

            if (confirm('{{ trans('global.areYouSure') }}')) {
                $.ajax({
                headers: {'x-csrf-token': _token},
                method: 'POST',
                url: config.url,
                data: { ids: ids, _method: 'DELETE' }})
                .done(function () { location.reload() })
            }
            }
        }
        dtButtons.push(deleteButton)
        @endcan

        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            pageLength: 100,
        });
        $('.datatable-LectureClass:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

        </script>
@endsection
