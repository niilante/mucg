<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-User">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.user.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.user.fields.name') }}
            </th>
            <th>
                {{ trans('cruds.user.fields.email') }}
            </th>
            <th>
                {{ trans('cruds.user.fields.email_verified_at') }}
            </th>
            <th>
                {{ trans('cruds.user.fields.roles') }}
            </th>
            <th>
                {{ trans('cruds.user.fields.class') }}
            </th>
            <th class="nosort" >
                &nbsp;
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $key => $user)
            <tr data-entry-id="{{ $user->id }}">
                <td>

                </td>
                <td>
                    {{ $user->id ?? '' }}
                </td>
                <td>
                    {{ $user->name ?? '' }}
                </td>
                <td>
                    {{ $user->email ?? '' }}
                </td>
                <td>
                    {{ $user->email_verified_at ?? '' }}
                </td>
                <td>
                    @foreach($user->roles as $key => $item)
                        <label class="badge badge-info">{{ $item->title }}</label>
                    @endforeach
                </td>
                <td>
                    {{ $user->class->name ?? '' }}
                </td>
                <td>
                    @can('user_show')
                            <a href="{{ route('admin.users.show', $user->id) }}" data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('user_edit')
                            <a href="{{ route('admin.users.edit', $user->id) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan

                    {{-- @can('user_delete')
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                        </form>
                    @endcan --}}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>