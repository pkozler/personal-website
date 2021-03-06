<div class="form-group row text-right">
    {{ Form::label($name, $label, ['class' => 'col-sm-3 col-form-label']) }}

    <div class="col-sm-9">
        {{ Form::textarea($name, $value, array_merge(['class' => 'form-control limited-size', 'rows' => 3], $attributes)) }}
    </div>

    @if ($errors->has($name))
        <small class="invalid-feedback" class="text-danger">
            <strong>{{ $errors->first($name) }}</strong>
        </small>
    @endif
</div>
