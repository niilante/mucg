@extends('layouts.admin_app')
@section('title', __('Edit Rank'))
@section('content')
<div class="main-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                {{ trans('global.edit') }} {{ trans('cruds.rank.title_singular') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route("admin.ranks.update", [$rank]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="name">{{ trans('cruds.rank.fields.name') }}</label>
                                <input class="form-control rank-timepicker {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $rank->name) }}" required>
                                @if($errors->has('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.rank.fields.name_helper') }}</span>
                            </div>
                            <div class="form-group">
                                <label class="required" for="description">{{ trans('cruds.rank.fields.description') }}</label>
                                <textarea class="form-control rank-timepicker {{ $errors->has('description') ? 'is-invalid' : '' }}" rows="5" type="text" name="description" id="description" required>{{ old('description', $rank->description) }}</textarea>
                                @if($errors->has('description'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('description') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.rank.fields.description_helper') }}</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="required" for="code">{{ trans('cruds.rank.fields.code') }}</label>
                                <input class="form-control rank-timepicker {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', $rank->code) }}" required>
                                @if($errors->has('code'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('code') }}
                                    </div>
                                @endif
                                <span class="help-block">{{ trans('cruds.rank.fields.code_helper') }}</span>
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
