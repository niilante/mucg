@extends('layouts.admin_datatable')
@section('title', __('All Users'))

{{-- @section('content')
@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.users.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
            </a>
            <a class="btn btn-success" href="{{ route("admin.users.create") }}?student">
                {{ trans('global.add') }} New Student
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">

        </div>
    </div>
</div>



@endsection --}}

@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="ik ik-layers bg-blue"></i>
                            <div class="d-inline">
                                <h5>{{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}</h5>
                                <span>Registered Users with last updated on top</span>
                            </div>
                        </div>
                    </div>
                    @can('role_create')
                        <div class="col-lg-4">
                            <nav class="breadcrumb-container" aria-label="breadcrumb">
                                <div>
                                    <a class="btn btn-outline-info" href="{{ route("admin.users.create") }}">
                                        <i class="ik ik-plus-square"></i>
                                        {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                                    </a>
                                    {{-- <a class="btn btn-outline-info" href="{{ route("admin.users.create") }}?student">
                                        <i class="ik ik-plus-square"></i>
                                        {{ trans('global.add') }} Add Student
                                    </a>
                                    <a class="btn btn-outline-info" href="{{ route("admin.users.create") }}?teacher">
                                        <i class="ik ik-plus-square"></i>
                                        {{ trans('global.add') }} Add Lecturer
                                    </a> --}}
                                    {{-- <a class="btn btn-outline-info" href="{{ route("admin.users.create") }}?teacher">
                                        <i class="ik ik-plus-square"></i>
                                        {{ trans('global.add') }} New Teacher
                                    </a> --}}
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
                                @include('admin.users.list_table')
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.users.massDestroy') }}",
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
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
