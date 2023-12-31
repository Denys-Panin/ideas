@include('shared.message_success')
@error('content')
    @include('shared.message_error')
@enderror
<div class="mt-3">
    <div class="card">
        <div class="px-3 pt-4 pb-2">
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Mario" alt="Mario Avatar">
                    <div>
                        <h5 class="card-title mb-0"><a href="#"> User-1
                            </a></h5>
                    </div>
                </div>
                <div>
                    <form action="{{ route('ideas.destroy', $idea->id) }}" method="POST">
                        @csrf
                        <a href="{{ route('ideas.edit', $idea->id) }}">Edit</a>
                        @method('delete')
                        <a href="{{ route('ideas.show', $idea->id) }}">View</a>
                        <button class="btn btn-danger btn-sm">X</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if ($editing ?? false)
                <form action="{{ route('ideas.update', $idea->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3">{{ $idea->content }}</textarea>
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-dark mb-2 btn-sm"> Update </button>
                    </div>
                </form>
            @else
                <p class="fs-6 fw-light text-muted">
                    {{ $idea->content }}
                </p>
            @endif
            <div class="d-flex justify-content-between">
                <div>
                    <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                        </span> {{ $idea->likes }} </a>
                </div>
                <div>
                    <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                        {{ $idea->created_at }} </span>
                </div>
            </div>
            <div>
                <div class="mb-3">
                    <textarea class="fs-6 form-control" rows="1"></textarea>
                </div>
                <div>
                    <button class="btn btn-primary btn-sm"> Post Comment </button>
                </div>

                <hr>
                <div class="d-flex align-items-start">
                    <img style="width:35px" class="me-2 avatar-sm rounded-circle"
                        src="https://api.dicebear.com/6.x/fun-emoji/svg?seed=Luigi" alt="Luigi Avatar">
                    <div class="w-100">
                        <div class="d-flex justify-content-between">
                            <h6 class="">User-2
                            </h6>
                            <small class="fs-6 fw-light text-muted"> 3 hour
                                ago</small>
                        </div>
                        <p class="fs-6 mt-3 fw-light">
                            Comment from User
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
