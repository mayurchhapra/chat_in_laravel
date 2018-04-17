@extends('layouts.app')

@section('content')

    <script>
         function getMessage(){
             var content = document.getElementById('content').value;
            
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:'POST',
                url:'/chat/save/',
                data:{'token':'_token = <?php echo csrf_token() ?>','value': content, 'user': '{{ Auth::user()->name }}' },
                success:function(data){
                   $('#msg').html(data.msg);
                   document.getElementById('content').value = '';
                }
            });
         }

            var auto_refresh = setInterval(
            function ()
            {
                $('#refresh').load('{{ route ("getChat") }}').fadeIn("slow");
            }, 5); // refresh every 10000 milliseconds

      </script>

    <div>
            
            @foreach ($user as $user)
                @if ($user->name == Auth::User()->name)

                @else
                Available users: <strong>{{ $user->name }}</strong>
                @endif
            @endforeach
            
                
    </div>

        
            <input type='hidden' name="_token" value='<?php echo csrf_token(); ?>' >
            <div class='row'>
                <div class='col-md-8'> <textarea class='form-control' name='content' id='content'></textarea> </div>
                <div class='col-md-4'><input type='button' class='btn btn-success' value="Submit" onClick='getMessage()'></div>
            </div>
         
        <div id='refresh'>
            
        </div>
       
   
@endsection