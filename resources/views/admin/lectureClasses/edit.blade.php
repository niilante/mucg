@extends('layouts.admin')
@section('content')

<div class="main-content">
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} {{ trans('cruds.lectureClass.title_singular') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.lecture-classes.update", [$lectureClass->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label class="required" for="name">{{ trans('cruds.lectureClass.fields.name') }}</label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $lectureClass->name) }}" required>
                        @if($errors->has('name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.lectureClass.fields.name_helper') }}</span>
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
