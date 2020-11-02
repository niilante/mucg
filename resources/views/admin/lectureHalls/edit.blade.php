@extends('layouts.admin')
@section('title', __('Edit Lecture Hall'))
@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} {{ trans('cruds.lectureHall.title_singular') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.lecture-halls.update", [$lectureHall]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="name">{{ trans('cruds.lectureHall.fields.name') }}</label>
                                <input class="form-control lectureHall-timepicker {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $lectureHall->name) }}" required>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lectureHall.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="description">{{ trans('cruds.lectureHall.fields.description') }}</label>
                                <textarea class="form-control lectureHall-timepicker {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" type="text" name="description" id="description" required>{{ old('description', $lectureHall->description) }}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lectureHall.fields.description_helper') }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="code">{{ trans('cruds.lectureHall.fields.code') }}</label>
                                <input class="form-control lectureHall-timepicker {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $lectureHall->code) }}" required>
                                @if($errors->has('code'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('code') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lectureHall.fields.code_helper') }}</span>
                            </div>

                            <div class="form-group">
                                <label class="required" for="capacity">{{ trans('cruds.lectureHall.fields.capacity') }}</label>
                                <input class="form-control lectureHall-timepicker {{ $errors->has('capacity') ? 'is-invalid' : '' }}" type="text" name="capacity" id="capacity" value="{{ old('capacity', $lectureHall->capacity) }}" required>
                                @if($errors->has('capacity'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('capacity') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.lectureHall.fields.capacity_helper') }}</span>
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
