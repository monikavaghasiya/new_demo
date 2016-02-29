@extends('myFile')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h2>Cards</h2>
            <ul class="list-group">
                <li class="list-group-item">id:{{ $a->id}}</li>
                <li class="list-group-item"> tilte:{{ $a->title }}</li>
                <li class="list-group-item"> created At:{{ $a->created_at }}</li>
                <li class="list-group-item"> updated_at:{{ $a->updated_at }}</li></li>
            </ul>

                <h3>Comments</h3>
                <ul class="list-group">
                @foreach($a->comments as $cmt)
                    <li class="list-group-item">{{ $cmt->comment_data }}
                        <a style="float: right" href="edit/{{ $cmt->comment_id }}">Edit Comment</a>
                    </li>
                @endforeach
                </ul>




            <div class="clearfix"></div>


            <h3>Add Comment Data</h3>

            <form action="{{ $a['id'] }}" id="form" method="post" >
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="form-group">
                    <textarea class="form-control" name="comment_data"></textarea>
                </div>
                <div class="form-group">
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-primary form-group" name="addComment">Add Comment</button>
                </div>
            </form>

        </div>

    </div>


    @endsection
