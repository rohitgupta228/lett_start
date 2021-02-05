@if($errors->has($type))
<span class="help-block" style="color:red">
    {{ $errors->first($type) }}
</span>
@endif
