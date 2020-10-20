
<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-Department">
    <thead>
        <tr>
            {{-- <th class="nosort" width="10">

            </th> --}}
            <th>
                {{ trans('cruds.department.fields.name') }}
            </th>
            <th>
                {{ trans('cruds.department.fields.description') }}
            </th>
            <th>
                {{ trans('cruds.department.fields.code') }}
            </th>
            <th class="nosort text-center">{{ trans('cruds.department.fields.actions') }}</th>
            {{-- <th class="nosort">&nbsp;</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($departments as $key => $department)
            <tr data-entry-id="{{ $department->id }}">
                {{-- <td>

                </td> --}}

                <td>
                    {{ $department->name ?? '' }}
                </td>

                <td>
                    {{ $department->description ?? '' }}
                </td>

                <td>
                    {{ $department->code ?? '' }}
                </td>
                <td>

                    <div class="table-actions text-center">
                        @can('department_show')
                            <a href="{{ route('admin.departments.show', ['department' => $department]) }}" data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('department_edit')
                            <a href="{{ route('admin.departments.edit', ['department' => $department]) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('department_delete')
                            <form action="{{ route('admin.departments.destroy', $department->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                        @endcan --}}
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>
</table>

