<x-layout>
    <x-slot name='title'>
        <title>{{ $blog->title }}</title>
    </x-slot>
    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="/storage/{{ $blog->thumbnail }}"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{ $blog->title }}</h3>
          <p>{{ $blog->author->name }} : {{ $blog->created_at->format('l jS \of F Y h:i:s A') }}</p>

          <form method="POST" action="/blogs/{{ $blog->slug }}/subscription">
          @csrf
          @auth
          @if (auth()->user()->isSubscribed($blog))
          <button class="btn btn-danger">Unsubscribe</button>
          @else
          <button class="btn btn-warning">Subscribe</button>
          @endif
          @endauth
          </form>

          <p class="lh-md mt-2">
            {!!$blog->body!!}
          </p>
        </div>
      </div>
    </div>

    <section class="container">
        <div class="col-md-8  mx-auto">
            @auth
                <x-comment-form :blog='$blog'></x-comment-form>
            @else
              <p class="text-danger">Please <a href="/login">login</a>to particate in comment section</p>
            @endauth
        </div>
    </section>

    @if ($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
    @endif

    <x-blogs_you_may_like_section :randomBlogs='$randomBlogs'></x-blogs_you_may_like_section>
</x-layout>
