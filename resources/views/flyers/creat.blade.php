@extends('myFile')



@section('content')


    @if(count($errors)>0)
        @foreach($errors->all() as $er)
            <?php   $error = $error."<br>".$er  ?>
        @endforeach

            {{--<li>{{$er}}</li>--}}
                <script type="text/javascript">
                    $(document).ready(function(){
                        swal({
                            title: "error!",
                           text: "{{ $error }}",
                           type: "error",

                            confirmButtonText: "Cool"
                        });
                    });
                </script>


    @endif


    @if(session()->has('flash_message'))
            <script type="text/javascript">
                $(document).ready(function(){
                    swal({
                        title: "success!",
                        text: "{!! Session::get('flash_message') !!}",
                        type: "success",
                        timer:2000,
                        confirmButtonText: "Cool"
                    });
                });
            </script>
    @endif


    <h1>Good Afternoon</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="flyers" id="form" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}

                @include('flyers.form')
            </form>
        </div>
    </div>



@stop