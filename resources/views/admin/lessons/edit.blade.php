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
                <form method="POST" action="{{ route("admin.lessons.update", [$lesson]) }}" enctype="multipart/form-data">
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

                            {{-- <div class="form-group">
                                <label class="required" for="lecture_hall_id">{{ trans('cruds.lesson.fields.lectureHall') }}</label>
                                <select class="form-control select2 {{ $errors->has('lectureHall') ? 'is-invalid' : '' }}" name="lecture_hall_id" id="lecture_hall_id" required>
                                    @foreach($lectureHalls as $id => $lectureHall)
                                        <option value="{{ $id }}" {{ ($lesson->lectureHall ? $lesson->lectureHall->id : old('lectureHall_id')) == $id ? 'selected' : '' }}>{{ $lectureHall }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('class'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('class') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.class_helper') }}</span>
                            </div> --}}
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="lecturer_id">{{ trans('cruds.lesson.fields.lecturer') }}</label>
                                <select class="form-control select2 {{ $errors->has('lecturer') ? 'is-invalid' : '' }}" name="lecturer_id" id="lecturer_id" required>
                                    @foreach($lecturers as $id => $lecturer)
                                        <option value="{{ $id }}" {{ ($lesson->lecturer ? $lesson->lecturer->id : old('lecturer_id')) == $id ? 'selected' : '' }}>{{ $lecturer }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('lecturer'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('lecturer') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.lecturer_helper') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="required" for="duration">{{ trans('cruds.lesson.fields.duration') }} (This is in minutes and <b>NB:</b> Not Less than 30 mins)</label>
                                <input class="form-control lesson-timepicker {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="text" name="duration" id="duration" value="{{ old('duration', $lesson->duration) }}" required>
                                @if($errors->has('duration'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('duration') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.duration_helper') }}</span>
                            </div>
                            {{-- <div class="form-group">
                                <label class="required" for="start_time">{{ trans('cruds.lesson.fields.start_time') }}</label>
                                <input class="form-control lesson-timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="time" name="start_time" id="start_time" value="{{ old('start_time', $lesson->start_time) }}" required>
                                @if($errors->has('start_time'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('start_time') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.start_time_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="end_time">{{ trans('cruds.lesson.fields.end_time') }}</label>
                                <input class="form-control lesson-timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="time" name="end_time" id="end_time" value="{{ old('end_time', $lesson->end_time) }}" required>
                                @if($errors->has('end_time'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('end_time') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lesson.fields.end_time_helper') }}</span>
                            </div> --}}
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
