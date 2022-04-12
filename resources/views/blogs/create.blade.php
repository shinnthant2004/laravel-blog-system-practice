<x-admin-layout>
    <x-card-layout>
        <h3 class="text-center">Blog Form</h3>
        <form action="/admin/blogs/create" enctype="multipart/form-data" method="POST">
            @csrf
           <x-form.input name="title"/>


           <x-form.input name="slug"/>

           <x-form.input name="intro"/>

           <x-form.textarea name="body"/>

           <x-form.input name="thumbnail" type="file"/>

           <x-card-layout>

           <x-form.label name="category"/>

            <select name="category_id" class="form-control">
             @foreach ($categories as $category)
             <option {{ $category->id==old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
             @endforeach
            </select>

              <x-error name="category-id"/>
              
           </x-card-layout>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </x-card-layout>
</x-admin-layout>
