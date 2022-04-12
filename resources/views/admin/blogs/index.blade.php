<x-admin-layout>
    <x-card-layout>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Title</th>
                <th scope="col">Intro</th>
                <th scope="col" colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($blogs as $blog)
              <tr>
                <th scope="row">{{ $blog->title }}</th>
                <td>{{ $blog->intro }}</td>
                <td>
                    <a class="btn btn-warning">Edit</a>
                </td>
                <td>
                    <form action="/admin/blogs/{{ $blog->slug }}/delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
    </x-card-layout>
    {{ $blogs->links() }}
</x-admin-layout>
