
<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-Lesson">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.lesson.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.lesson.fields.class') }}
            </th>
            <th>
                {{ trans('cruds.lesson.fields.teacher') }}
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
            <th class="nosort">&nbsp;</th>
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
                    {{ $lesson->teacher->name ?? '' }}
                </td>
                <td>
                    {{ $lesson->weekday ?? '' }}
                </td>
                <td>
                    {{ $lesson->start_time ?? '' }}
                </td>
                <td>
                    {{ $lesson->end_time ?? '' }}
                </td>
                <td>

                    <div class="table-actions">
                        @can('lesson_show')
                            <a href="{{ route('admin.lessons.show', $lesson->id) }}">
                                <i class="ik ik-eye"></i>
                            </a>
                        @endcan
                        @can('lesson_edit')
                            <a href="{{ route('admin.lessons.edit', $lesson->id) }}">
                                <i class="ik ik-edit-2"></i>
                            </a>
                        @endcan

                        {{-- @can('lesson_delete')
                            <a href="#">
                                <i class="ik ik-trash-2"></i>
                            </a>
                        @endcan --}}

                        {{-- @can('lesson_delete')
                            <form action="{{ route('admin.lessons.destroy', $lesson->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

