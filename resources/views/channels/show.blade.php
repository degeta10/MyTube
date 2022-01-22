@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $channel->title }}</div>

                    <div class="card-body">

                        @if ($channel->editable())

                            <form id="update-channel-form" action="{{ route('channels.update', [$channel->id]) }}"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                        @endif

                        <div class="mb-3 row justify-content-center">
                            <div class="channel-avatar p-0">
                                @if ($channel->editable())
                                    <div class="channel-avatar-overlay" onclick="document.getElementById('image').click()">
                                    </div>
                                @endif
                                <img src="{{ $channel->image() }}" alt="thumbnail" height="100" width="100">
                            </div>
                        </div>

                        @if ($channel->editable())
                            <input onchange="document.getElementById('update-channel-form').submit()" type="file"
                                class="d-none" id="image" name="image">

                            <div class="mb-3">
                                <label for="title" class="form-label">Name</label>
                                <input type="title" class="form-control" id="title" name="title"
                                    value="{{ $channel->title }}">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea cols="3" rows="3" class="form-control" id="description"
                                    name="description">{{ $channel->description }}</textarea>
                            </div>

                            @if ($errors->any())
                                <ul class="list-group mb-5">
                                    @foreach ($errors->all() as $error)
                                        <li class="list-group-item text-danger">
                                            {{ $error }}
                                        </li>
                                    @endforeach
                                </ul>
                            @endif

                            <button class="btn btn-info" type="submit">Update Channel</button>
                        @else
                            <div class="form-group">
                                <h4 class="text-center">{{ $channel->title }}</h4>
                                <p class="text-center">{{ $channel->description }}</p>
                                @auth
                                    <div class="text-center">
                                        <button class="btn btn-danger" type="submit">Subscribe</button>
                                    </div>
                                @endauth
                            </div>
                        @endif

                        @if ($channel->editable())
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
