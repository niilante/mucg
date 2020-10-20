@extends('layouts.admin')

@section('content')

{{-- <div class="main-content">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row align-items-end">
                <div class="col-lg-8">
                    <div class="page-header-title">
                        <i class="ik ik-layers bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ trans('global.show') }} {{ trans('cruds.user.title') }}</h5>
                        </div>
                    </div>
                </div>
                @can('lesson_edit')
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <div>
                                <a href="{{route('admin.users.edit', $user->id)}}" class="btn btn-outline-secondary">
                                    <i class="ik ik-edit-2"></i>
                                    {{ trans('global.edit') }} User
                                </a>
                                <a href="{{ route('admin.users.index') }}" class="btn btn-outline-info">
                                    <i class="ik ik-list"></i>
                                    {{ trans('global.back_to_list') }}
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
                            <table class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.id') }}
                                        </th>
                                        <td>
                                            {{ $user->id }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.name') }}
                                        </th>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.email') }}
                                        </th>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.email_verified_at') }}
                                        </th>
                                        <td>
                                            {{ $user->email_verified_at }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.roles') }}
                                        </th>
                                        <td>
                                            @foreach($user->roles as $key => $roles)
                                                <span class="label label-info">{{ $roles->title }}</span>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            {{ trans('cruds.user.fields.class') }}
                                        </th>
                                        <td>
                                            {{ $user->class->name ?? '' }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            {{ trans('global.relatedData') }}
                        </div>
                        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="#lecturer_lessons" role="tab" data-toggle="tab">
                                    {{ trans('cruds.lesson.title') }}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane" role="tabpanel" id="lecturer_lessons">
                                @includeIf('admin.users.relationships.lecturerLessons', ['lessons' => $user->lecturerLessons])
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="main-content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                {{ trans('cruds.lesson.title_singular') }} {{ trans('global.list') }}


                @can('lesson_create')
                    <div class="">
                        <div class="col-lg-12">
                            <a class="btn btn-success" href="{{ route("admin.lessons.create") }}">
                                {{ trans('global.add') }} {{ trans('cruds.lesson.title_singular') }}
                            </a>
                        </div>
                    </div>
                @endcan
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover datatable datatable-Lesson">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.lesson.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.lesson.fields.class') }}
                                </th>
                                <th>
                                    {{ trans('cruds.lesson.fields.lecturer') }}
                                </th>
                                <th>
                                    {{ trans('cruds.lesson.fields.weekday') }}
                                </th>
                                <th>
                                    {{ trans('cruds.lesson.fields.start_time') }}
                                </th>
                                <th>
                                    {{ trans('cruds.lesson.fields.end_time') }}
                                </th>
                                <th>
                                    Action{{-- &nbsp; --}}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lessons as $key => $lesson)
                                <tr data-entry-id="{{ $lesson->id }}">
                                    <td>

                                    </td>
                                    <td>
                                        {{ $lesson->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->class->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->lecturer->fname ?? '' }}
                                    </td>
                                    <td>
                                        {{ $lesson->weekname ?? '' }}
                                    </td>
                                    <td>
                                        {{ date('h:i A', strtotime($lesson->start_time)) ?? '' }}
                                    </td>
                                    <td>
                                        {{ date('h:i A', strtotime($lesson->end_time)) ?? '' }}
                                    </td>
                                    <td>
                                        @can('lesson_show')
                                            <a class="btn btn-xs btn-primary" href="{{ route('admin.lessons.show', $lesson->id) }}">
                                                {{ trans('global.view') }}
                                            </a>
                                        @endcan

                                        @can('lesson_edit')
                                            <a class="btn btn-xs btn-info" href="{{ route('admin.lessons.edit', $lesson->id) }}">
                                                {{ trans('global.edit') }}
                                            </a>
                                        @endcan

                                        @can('lesson_delete')
                                            <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                            </form>
                                        @endcan

                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
@section('scripts')
 @parent
    <script>
            $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        @can('lesson_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.lessons.massDestroy') }}",
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
        $('.datatable-Lesson:not(.ajaxTable)').DataTable({ buttons: dtButtons })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection

@endsection
