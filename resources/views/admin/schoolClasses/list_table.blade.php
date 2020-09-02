
<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-SchoolClass">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.schoolClass.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.schoolClass.fields.name') }}
            </th>
            <th class="text-center">
                Time Table
            </th>
            <th class="nosort text-right">
                Action
                {{-- &nbsp; --}}
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($schoolClasses as $key => $schoolClass)
            <tr data-entry-id="{{ $schoolClass->id }}">
                <td>

                </td>
                <td>
                    {{ $schoolClass->id ?? '' }}
                </td>
                <td>
                    {{ $schoolClass->name ?? '' }}
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.calendar.index') }}?class_id={{ $schoolClass->id }}">
                        <button type="button" class="btn btn-primary btn-rounded">View Time Table</button>
                    </a>
                </td>
                <td>

                    <div class="table-actions">
                        @can('school_class_show')
                            <a href="{{ route('admin.school-classes.show', $schoolClass->id) }}"data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('school_class_edit')
                        <a href="{{ route('admin.school-classes.edit', $schoolClass->id) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('school_class_delete')
                            <form action="{{ route('admin.school-classes.destroy', $schoolClass->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

