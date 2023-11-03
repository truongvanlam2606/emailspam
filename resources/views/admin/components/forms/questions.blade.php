<div class="form-group">
    <label for="{{$name}}">{{$label ?? ''}}</label>
    <select {{ isset($disabled) && $disabled == true ? "disabled" : ""}} class="duallistbox" multiple="multiple" style="display: none;" name="{{$name}}">
        @foreach ($questions as $question)
            <option {{$question->selected ? 'selected' : ''}} value="{{$question->id}}"> {{$question->name}}</option>
        @endforeach
    </select>
 </div>

@push('scripts')
    <script>
        jQuery(function ($) {
            //Bootstrap Duallistbox
            $('.duallistbox').bootstrapDualListbox({
                infoText: 'Questions all {0}',
                infoTextFiltered: 'Questions selected {0}',
                infoTextEmpty: 'No Questions selected'
            })
        })
    </script>

@endpush
