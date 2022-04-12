@props(['name','type'=>'text'])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <input type="{{ $type }}"
           class="form-control"
           id="{{ $name }}"
           name="{{ $name }}"
           value="{{ old($name) }}"
       >
      <x-error :name="$name"/>
</x-form.input-wrapper>


