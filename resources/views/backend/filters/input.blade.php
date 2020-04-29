<div class="{{ isset($filter['class']) ? $filter['class'] : 'col-md-2' }} mb-2">
    @if($filter['input'] == 'select')
        <select name="{{ $name }}" id="{{ $name }}" class="form-control m-input">
            <option value="">Chọn {{ isset($filter['label']) ? $filter['label'] : 'giá trị' }}</option>
            @if(isset($filter['option']) && !empty($filter['option']))
                @foreach($filter['option'] as $val => $option)
                    <option value="{{ $val }}" {{ isset($_GET[$name])? ($val == $_GET[$name]) ? 'selected' : '' : '' }}>{{ $option }}</option>
                @endforeach
            @endif
        </select>
    @else
    <input type="{{ isset($filter['type']) ? $filter['type'] : 'text' }}" name="{{ $name }}"
           value="{{ isset($_GET[$name])?$_GET[$name]:'' }}"
           class="form-control m-input"
           placeholder="{{ isset($filter['label']) ? $filter['label'] : '' }}">
    @endif
</div>
