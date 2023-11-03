<div class="form-group">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <textarea {{ isset($disabled) && $disabled == true ? "disabled" : ""}} type="{{$type ?? 'text'}}"  rows="{{$rows ?? 3}}" {{ isset($required) && $required ? 'required' : '' }} class="form-control" id="{{$name}}" name="{{$name}}" placeholder="{{ $placeholder ?? ''}}">
         {{ isset($model) ? $model->name : (!empty(old($name)) ? old($name) : '')}}
    </textarea>
</div>
