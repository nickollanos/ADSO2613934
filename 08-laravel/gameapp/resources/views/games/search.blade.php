@forelse ($users as $user)
<div class="user">
    <img class="users" src="{{ asset('images') . '/' . $user->photo }}" alt="Photo">
    {{-- <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border"> --}}
    <h1> {{ $user->fullname }} </h1>
    <p> {{ $user->role }} </p>
    <div class="btn-function">
        <a href="{{ url('users/' . $user->id) }}" class="btn-search">
        </a>
        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn-edit">
        </a>
        <a href="javascript:;" class="btn-delete" data-fullname="{{ $user->fullname }}">
        </a>
        <form action="{{ url('users/' . $user->id) }}" method="POST" style="display: none">
            @csrf
            @method('delete')
        </form>
    </div>
</div>
@empty
    No found 🤒
@endforelse
