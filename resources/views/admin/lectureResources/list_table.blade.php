
<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-LectureClass">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.lectureClass.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.lectureClass.fields.name') }}
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
        @foreach($lectureClasses as $key => $lectureClass)
            <tr data-entry-id="{{ $lectureClass->id }}">
                <td>

                </td>
                <td>
                    {{ $lectureClass->id ?? '' }}
                </td>
                <td>
                    {{ $lectureClass->name ?? '' }}
                </td>
                <td class="text-center">
                    <a href="{{ route('admin.calendar.index') }}?class_id={{ $lectureClass->id }}">
                        <button type="button" class="btn btn-primary btn-rounded">View Time Table</button>
                    </a>
                </td>
                <td>

                    <div class="table-actions">
                        @can('lecture_class_show')
                            <a href="{{ route('admin.lecture-classes.show', $lectureClass->id) }}"data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('lecture_class_edit')
                        <a href="{{ route('admin.lecture-classes.edit', $lectureClass->id) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('lecture_class_delete')
                            <form action="{{ route('admin.lecture-classes.destroy', $lectureClass->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

