<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-Role">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.role.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.role.fields.title') }}
            </th>
            <th>
                {{ trans('cruds.role.fields.permissions') }}
            </th>
            <th class="nosort" >
                &nbsp;
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($roles as $key => $role)
            <tr data-entry-id="{{ $role->id }}">
                <td>

                </td>
                <td>
                    {{ $role->id ?? '' }}
                </td>
                <td>
                    {{ $role->title ?? '' }}
                </td>
                <td>
                    @foreach($role->permissions as $key => $item)
                        <label class="badge badge-info">{{ $item->title }}</label>
                    @endforeach
                </td>

                <td>
                    <div class="table-actions">
                        @can('role_show')
                            <a href="{{ route('admin.roles.show', $role->id) }}" data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('role_edit')
                            <a href="{{ route('admin.roles.edit', $role->id) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('role_delete')
                            <form action="{{ route('admin.roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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