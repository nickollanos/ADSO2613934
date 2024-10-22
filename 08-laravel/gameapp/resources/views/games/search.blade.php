@forelse ($games as $game)
<div class="user">
    <img class="users" src="{{ asset('images') . '/' . $game->image }}" alt="Photo">
    {{-- <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border"> --}}
    <h1> {{ $game->title }} </h1>
    <p> {{ $game->category->name }} </p>
    <div class="btn-function">
        <a href="{{ url('games/' . $game->id) }}" class="btn-search">
        </a>
        <a href="{{ url('games/' . $game->id . '/edit') }}" class="btn-edit">
        </a>
        <a href="javascript:;" class="btn-delete" data-fullname="{{ $game->title }}">
        </a>
        <form action="{{ url('games/' . $game->id) }}" method="POST" style="display: none">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
@empty
    No found 🤒
@endforelse
