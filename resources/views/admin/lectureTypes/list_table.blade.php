
<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-LectureType">
    <thead>
        <tr>
            <th class="nosort" width="10">

            </th>
            <th>
                {{ trans('cruds.lectureType.fields.id') }}
            </th>
            <th>
                {{ trans('cruds.lectureType.fields.name') }}
            </th>
            <th class="nosort text-right">
                Action
                {{-- &nbsp; --}}
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach($lectureTypes as $key => $lectureType)
            <tr data-entry-id="{{ $lectureType->id }}">
                <td>

                </td>
                <td>
                    {{ $lectureType->id ?? '' }}
                </td>
                <td>
                    {{ $lectureType->name ?? '' }}
                </td>
                <td>

                    <div class="table-actions">
                        @can('lecture_class_show')
                            <a href="{{ route('admin.lecture-types.show', $lectureType) }}"data-toggle="tooltip" title="Show">
                                <i class="ik ik-eye f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                        @can('lecture_class_edit')
                        <a href="{{ route('admin.lecture-types.edit', $lectureType) }}" data-toggle="tooltip" title="Edit">
                                <i class="ik ik-edit-2 f-16 mr-15 text-green"></i>
                            </a>
                        @endcan
                        {{-- @can('lecture_class_delete')
                            <form action="{{ route('admin.lecture-types.destroy', $lectureType->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

