
<table id="data_table" class=" table table-bordered table-striped table-hover datatable datatable-Lesson">
    <thead>
        <tr>
            {{-- <th class="nosort" width="10">

            </th> --}}
            <th>
                {{ trans('cruds.lesson.fields.title') }}
            </th>
            <th>
                {{ trans('cruds.lesson.fields.class') }}
            </th>
            <th>
                {{ trans('cruds.lesson.fields.lectureHall') }}
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
            <th class="nosort text-center">{{ trans('cruds.lesson.fields.actions') }}</th>
            {{-- <th class="nosort">&nbsp;</th> --}}
        </tr>
    </thead>
    <tbody>
        @foreach($lessons as $key => $lesson)
            <tr data-entry-id="{{ $lesson->id }}">
                {{-- <td>

                </td> --}}

                <td>
                    {{ $lesson->title ?? '' }}
                </td>
                <td>
                    {{ $lesson->class->name ?? '' }}
                </td>
                <td>
                    {{ $lesson->lectureHall->name ?? '' }}
                </td>
                <td>
                    {{ $lesson->lecturer->fname ?? '' }}
                </td>
                <td>
                    {{ $lesson->weekname ?? '' }}
                </td>
                <td>
                    @if($lesson->start_time == null)    
                    @else
                        {{ date('h:i A', strtotime($lesson->start_time)) ?? '' }}
                    @endif
                </td>
                <td>
                    @if($lesson->end_time == null)    
                    @else
                        {{ date('h:i A', strtotime($lesson->end_time)) ?? '' }}
                    @endif
                </td>
                <td>

                    <div class="table-actions text-center">
                        @can('lesson_schedule')
                            <a href="#lesson-{{ $lesson->code ?? '' }}" data-toggle="modal" data-toggle="tooltip" title="Schedule">
                                <i class="ik ik-refresh-cw f-16 mr-15 text-blue"></i>
                            </a>
                        @endcan
                    </div>
                </td>

            </tr>
        @endforeach
    </tbody>

</table>


@foreach($lessons as $key => $lesson)
    <div class="modal fade" id="lesson-{{ $lesson->code ?? '' }}" tabindex="-1" role="dialog" aria-labelledby="lesson-{{ $lesson->code ?? '' }}Label" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lesson-{{ $lesson->code ?? '' }}Label">Lesson Scheduler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to schedule <b>{{ $lesson->title ?? '' }}</b>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <form method="POST" action="{{ route("admin.lessons.post_lesson_scheduler", ['lesson' => $lesson]) }}" >
                        @csrf
                        <button type="submit" class="btn btn-primary">Yes, Schedule</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach