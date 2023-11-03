<div class="form-group">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <select {{ isset($disabled) && $disabled == true ? "disabled" : ""}} class="form-control" name="{{$name}}" id="{{$name}}" required="{{ $required ?? 'false'}}">
        @foreach ($options as $item )
            <option {{ isset($model) && $model[$name] == $item[$name] ? 'seclted' : ''}} value="{{$item[$name]}}">{{$item['name']}}</option>
        @endforeach
    </select>
</div>
