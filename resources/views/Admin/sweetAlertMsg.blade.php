@section('sweet_alrt_msg')

<script>

    @if($msg = session('msg'))

    // swal("{{ $msg }}");

    setTimeout(function() {

        swal({

            title: "Success!",

            text: "{{ $msg }}",

            type: "success"

        }, function() {

            location.reload

        });

    }, 1000);

    @endif

</script>

@endsection