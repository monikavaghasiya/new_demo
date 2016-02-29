@extends('myFile')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

            <div class="clearfix"></div>

            <h3>Edit Comment Data</h3>

            <form action="update/{{  $commentData->comment_id }}" id="form" method="post" >
                <input name="_token" type="hidden" value="{!! csrf_token() !!}" />
                <div class="form-group">
                    <textarea class="form-control" name="comment_data" >{{ $commentData->comment_data }}</textarea>
                </div>
                <div class="form-group">
                    <div class="clearfix"></div>
                    <button type="submit" class="btn btn-primary form-group" name="editComment">Edit Comment</button>
                </div>
            </form>

        </div>

    </div>


@endsection
