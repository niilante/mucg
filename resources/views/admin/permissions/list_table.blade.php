<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-Permission">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.permission.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.permission.fields.title') }}
            </th>
            <th class="nosort">
                &nbsp;
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $key => $permission)
            <tr data-entry-id="{{ $permission->id }}">
                <td>

                </td>
                <td>
                    {{ $permission->id ?? '' }}
                </td>
                <td>
                    {{ $permission->title ?? '' }}
                </td>
                <td>
                    <div class="table-actions">
                        @can('permission_show')
                            <a href="{{ route('admin.permissions.show', $permission->id) }}" data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('permission_edit')
                            <a href="{{ route('admin.permissions.edit', $permission->id) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('permission_delete')
                            <form action="{{ route('admin.permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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