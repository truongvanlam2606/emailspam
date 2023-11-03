<div class="form-group">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <select {{ isset($disabled) && $disabled == true ? "disabled" : ""}} class="select2" multiple="multiple"  name="{{$name}}" id="{{$name}}" data-placeholder="{{ $placeholder ?? 'Select a option'}}" style="width: 100%;" required="{{ $required ?? 'false'}}">
        @foreach ($options as $item )
            <option {{ !empty($optionsValue) && $optionsValue->where('id', $item->id)->first() ? "selected" : ""}} value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
</div>
@push('scripts')
    <script>
            $(function () {
                $('.select2').select2()
            })
    </script>
@endpush
