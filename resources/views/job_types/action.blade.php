<form action="{{ route('job-types.destroy', $jobType->id) }}" method="post">
    @csrf
    @method('delete')
    <a class="btn btn-sm btn-outline-secondary btn-uppercase" href="{{route('job-types.show', $jobType->id)}}">
        show
    </a>
    <a class="btn btn-sm btn-outline-primary btn-uppercase" href="{{route('job-types.edit', $jobType->id)}}">
        edit
    </a>
    <button class="btn btn-sm btn-outline-danger btn-uppercase" type="submit" onclick="return confirm('Are you sure?')">
        delete
    </button>
</form>