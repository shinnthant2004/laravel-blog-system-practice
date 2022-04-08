@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
    <x-category-dropdown></x-category-dropdown>
    <form action="" class="my-3">
      <div class="input-group mb-3">
        @if (request('category'))
        <input
        type="hidden"
        name="category"
        value='{{ request('category') }}'
      />
        @endif

        @if (request('user'))
        <input
        type="hidden"
        name="user"
        value='{{ request('user') }}'
      />
        @endif
        <input
          type="text"
          name="search"
          autocomplete="false"
          class="form-control"
          placeholder="Search Blogs..."
        />
        <button
          class="input-group-text bg-primary text-light"
          id="basic-addon2"
          type="submit"
        >
          Search
        </button>
      </div>
    </form>
    <div class="row">
     @foreach ($blogs as $blog)

     <div class="col-md-4 mb-4">
         <x-blog-card :blog='$blog'></x-blog-card>
     </div>

     @endforeach
      </div>
    </div>
    {{ $blogs->links() }}
  </section>
