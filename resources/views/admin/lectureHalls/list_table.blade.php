
<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-LectureHall">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.lectureHall.fields.code') }}
            </th>
            <th>
                {{ trans('cruds.lectureHall.fields.name') }}
            </th>
            <th class="nosort text-right">
                Action
                {{-- &nbsp; --}}
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($lectureHalls as $key => $lectureHall)
            <tr data-entry-id="{{ $lectureHall->id }}">
                <td>

                </td>
                <td>
                    {{ $lectureHall->code ?? '' }}
                </td>
                <td>
                    {{ $lectureHall->name ?? '' }}
                </td>
                <td>

                    <div class="table-actions">
                        @can('lecture_class_show')
                            <a href="{{ route('admin.lecture-halls.show', $lectureHall) }}"data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('lecture_class_edit')
                        <a href="{{ route('admin.lecture-halls.edit', $lectureHall) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('lecture_class_delete')
                            <form action="{{ route('admin.lecture-classes.destroy', $lectureHall->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

