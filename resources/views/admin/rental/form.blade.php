@row
    <div>
        {{ Form::label('short_name', 'Short Name', ['class' => 'required']) }}
        {{ Form::text('short_name', $department->short_name, ['class' => 'form-control' . ($errors->has('short_name') ? ' is-invalid' : '')]) }}
        {!! $errors->first('short_name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div>
        {{ Form::label('name', null, ['class' => 'required']) }}
        {{ Form::text('name', $department->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : '')]) }}
        {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div>
        {{ Form::label('name_bn', 'Name(Bangla)', ['class' => 'required']) }}
        {{ Form::text('name_bn', $department->name_bn, ['class' => 'form-control' . ($errors->has('name_bn') ? ' is-invalid' : '')]) }}
        {!! $errors->first('name_bn', '<div class="invalid-feedback">:message</div>') !!}
    </div>
@endrow
<div class="box-footer mt-3">
    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
</div>
