@extends('layouts.admin_app')
@section('title', __('Edit Lesson'))
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} {{ trans('cruds.lesson.title_singular') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.lessons.update", [$lesson->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="title">{{ trans('cruds.lesson.fields.title') }}</label>
                                <input class="form-control lesson-timepicker {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $lesson->title) }}" required>
                                @if($errors->has('title'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.title_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="description">{{ trans('cruds.lesson.fields.description') }}</label>
                                <textarea class="form-control lesson-timepicker {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" type="text" name="description" id="description" required>{{ old('description', $lesson->description) }}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.description_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="class_id">{{ trans('cruds.lesson.fields.class') }}</label>
                                <select class="form-control select2 {{ $errors->has('class') ? 'is-invalid' : '' }}" name="class_id" id="class_id" required>
                                    @foreach($classes as $id => $class)
                                        <option value="{{ $id }}" {{ ($lesson->class ? $lesson->class->id : old('class_id')) == $id ? 'selected' : '' }}>{{ $class }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('class'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('class') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.class_helper') }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="teacher_id">{{ trans('cruds.lesson.fields.teacher') }}</label>
                                <select class="form-control select2 {{ $errors->has('teacher') ? 'is-invalid' : '' }}" name="teacher_id" id="teacher_id" required>
                                    @foreach($teachers as $id => $teacher)
                                        <option value="{{ $id }}" {{ ($lesson->teacher ? $lesson->teacher->id : old('teacher_id')) == $id ? 'selected' : '' }}>{{ $teacher }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('teacher'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('teacher') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.teacher_helper') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="required" for="weekday">{{ trans('cruds.lesson.fields.weekday') }}</label>
                                <?php $selected_weekday = old("weekday")? old("weekday"): $weekday;?>
                                <select class="form-control select2 {{ $errors->has('weekday') ? 'is-invalid' : '' }}" name="weekday" id="weekday" required>
                                    @foreach($weekDays as $index => $day)
                                        <option value="{{ $index }}" {{ $selected_weekday == $day ? 'selected' : '' }}>{{ $day }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('weekday'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('weekday') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.weekday_helper') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="required" for="start_time">{{ trans('cruds.lesson.fields.start_time') }}</label>
                                <input class="form-control lesson-timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time', $lesson->start_time) }}" required>
                                @if($errors->has('start_time'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('start_time') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.start_time_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="end_time">{{ trans('cruds.lesson.fields.end_time') }}</label>
                                <input class="form-control lesson-timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time', $lesson->end_time) }}" required>
                                @if($errors->has('end_time'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('end_time') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.end_time_helper') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
