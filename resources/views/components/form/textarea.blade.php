@props(['name'])
<x-form.input-wrapper>
    <x-form.label :name="$name"/>
    <textarea
     name="{{ $name }}"
     id="{{ $name }}"
     placeholder="what do u want to text today?"
     class="form-control editor"
     rows="5"
     cols="10"
     value="{{ old($name) }}"
    ></textarea>
      <x-error :name="$name"/>
</x-form.input-wrapper>
