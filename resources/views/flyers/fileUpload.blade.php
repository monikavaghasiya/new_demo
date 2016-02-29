<html>
<head>
    <title>MY PAGE</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/css/sweetalert.css') }}">
    <script type="text/javascript" src="{{ asset('/js/sweetalert-dev.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.css">

    <link rel="stylesheet" href="{{asset('css/lity.css')}}" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js">    </script>
    <script type="text/javascript" src="{{asset('js/lity.js')}}" >    </script>

</head>
<div align="center">
    <h1>Welcome....</h1>
</div>
<body>

    @if(isset($photo))

        @foreach($photo as $key)
            <a href="http://localhost-monika/laravel/new_demo/public/uploads/{{ $key->photo }}" data-lity>
                <img src="http://localhost-monika/laravel/new_demo/public/uploads/th{{ $key->photo }}">
            </a>
        @endforeach
    @endif

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
            <form action="{!! url('show/'.$zip."/".$street) !!}" id="addPhotos" method="post" class="dropzone" enctype="multipart/form-data">
                {{ csrf_field() }}
            </form>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    <script>
        DropZone.options.addPhotos ={
            paramName = 'photo',
                maxFileSize = 3,
                acceptedFile = '.jpg , .jpeg, .png,'
        }
    </script>


</body>
</html>