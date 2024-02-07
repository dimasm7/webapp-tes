<form action="{{ route('jobs.destroy', $job->id) }}" method="post">
    @csrf
    @method('delete')
    <a class="btn btn-sm btn-outline-secondary btn-uppercase" href="{{route('jobs.show', $job->id)}}">
        show
    </a>
    <a class="btn btn-sm btn-outline-primary btn-uppercase" href="{{route('jobs.edit', $job->id)}}">
        edit
    </a>
    <button class="btn btn-sm btn-outline-danger btn-uppercase" type="submit" onclick="return confirm('Are you sure?')">
        delete
    </button>
</form>