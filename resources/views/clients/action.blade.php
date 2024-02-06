<form action="{{ route('clients.destroy', $client->id) }}" method="post">
    @csrf
    @method('delete')
    <a class="btn btn-sm btn-outline-secondary btn-uppercase" href="{{route('clients.show', $client->id)}}">
        show
    </a>
    <a class="btn btn-sm btn-outline-primary btn-uppercase" href="{{route('clients.edit', $client->id)}}">
        edit
    </a>
    <button class="btn btn-sm btn-outline-danger btn-uppercase" type="submit" onclick="return confirm('Are you sure?')">
        delete
    </button>
</form>