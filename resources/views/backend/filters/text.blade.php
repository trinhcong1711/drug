<div class="{{ isset($filter['class']) ? $filter['class'] : 'col-md-2' }} mb-2">
    <input type="{{ isset($filter['type']) ? $filter['type'] : 'text' }}" name="{{ $name }}"
           value="{{ isset($_GET[$name])?$_GET[$name]:'' }}"
           class="form-control m-input"
           placeholder="{{ isset($filter['label']) ? $filter['label'] : '' }}">
</div>
