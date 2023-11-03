<div class="form-group">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <input type="{{$type ?? 'text'}}" {{ isset($required) && $required ? 'required' : '' }} class="form-control" id="{{$name}}" name="{{$name}}" value="{{ isset($model)  ? $model->{$name} : (old($name) ?? '' )}}" placeholder="{{ $placeholder ?? ''}}" {{ isset($disabled) && $disabled == true ? "disabled" : ""}}>
</div>
