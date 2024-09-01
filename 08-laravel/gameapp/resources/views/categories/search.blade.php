@forelse ($categories as $category)
<div class="user">
    <img class="users" src="{{ asset('images') . '/' . $category->image }}" alt="Photo">
    {{-- <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border"> --}}
    <h1> {{ $category->name }} </h1>
    <p> {{ $category->manufacturer }} </p>
    <div class="btn-function">
        <a href="{{ url('categories/' . $category->id) }}" class="btn-search">
        </a>
        <a href="{{ url('categories/' . $category->id . '/edit') }}" class="btn-edit">
        </a>
        <a href="javascript:;" class="btn-delete" data-fullname="{{ $category->name }}">
        </a>
        <form action="{{ url('categories/' . $category->id) }}" method="POST" style="display: none">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
@empty
    No found 🤒
@endforelse