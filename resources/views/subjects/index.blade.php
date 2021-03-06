@extends('layouts.master')

@section('content')

@include('layouts.navbar')
@include('layouts.drawer')

<div class="subject-page">
    <h3>{{$inst[0]->name}}</h3>
    <h1>{{ $subject[0]->name }}</h1>

    <div class="upload-buttons">
        <a onclick="scrollpage('div.upload');" href="#upload" class="btn-default">Add Files To This Subject</a>
    </div>
    
    <div class="files">
        <h2>Study Material</h2>
        @foreach ($links as $link)
            <div class="file">
                <p>{{$link->name}}</p>
                <a href="{{$link->url}}" target="_blank" role="button">Open Link</a>
                <small>Added by <a href="">{{ $link->username }}</a></small>
            </div>
        @endforeach
        @foreach ($files as $file)
            <div class="file">
                <p>{{$file->name}}</p>
                <a href="{{$file->location}}" role="button" download>Download</a>
                <small>Uploaded by <a href="">{{ $file->username }}</a></small>
            </div>
        @endforeach
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-md-6">
                <div class="upload" id="upload">
                    <h2>Upload Files</h2>
                    @if(!Auth::check())
                    <small>You need to sign in to upload any file.</small>
                    @endif
                    <form class="" action="/institutes/{{$inst[0]->id}}/subject/{{$subject[0]->id}}/upload" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" name="name" placeholder="Enter file name" required>
                        <input type="file" name="newfile" required>
                        <button class="btn-default" type="submit">Upload</button>
                    </form>
                </div>
                <small>Max file size is 50M</small>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="add-link">
                    <h2>Add Files Using Url</h2>
                    @if(!Auth::check())
                    <small>You need to sign in to add any url.</small>
                    @endif
                    <form class="" action="/institutes/{{$inst[0]->id}}/subject/{{$subject[0]->id}}/add-link" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="text" name="name" placeholder="Enter file name" required>
                        <input type="url" name="newurl" placeholder="Enter Url" required>
                        <button class="btn-default" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    


</div>

<script type="text/javascript">
    
    
</script>

@include('layouts.footer')
@endsection
