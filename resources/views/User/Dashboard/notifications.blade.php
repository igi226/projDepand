@extends('User.Dashboard.main')

@section('contentt')



<div class="panel-body">
    <div >
        <span class="d-block bg-secondary px-3 py-1 text-white text-uppercase h5 rounded mb-3"> <b>Notification</b></span>
    </div>
    {{-- <form action="" method="post">
        @csrf --}}
    <div class="notification-btn">
        {{-- <button type="submit" class="delete-btn" id="deleteNotification">Delete Selected</button> 
        <label lass="select-btn">Select All</label>
        <input type="checkbox" class="selectall">--}}
    </div>
    <div class="notification-msg">
        @foreach ($notifications as $item)
        <div id="noti{{ $item->id }}" class="notifiyborder">

       
        <label for="">{{  Carbon\Carbon::parse($item->updated_at)->format('D, d M Y H:i') }}</label>
        <div class="notification-msg-content">
            <a href="{{ route('employer.viewJobn',$item->job_id) }}" class="text-white"><p>{{ $item->msg }}</p></a>
            <div class="noti-box">
                {{-- <input type="checkbox" class="individual" name="notification_ids" value="{{ $item->id }}" id="{{ $item->id }}"> --}}
               <button class="btn" onclick="deleteNotification({{ $item->id }})"> <i class="fa fa-trash-o"></i></button>
            </div>
            
        </div>
        </div>
        @endforeach
    </div>
{{-- </form> --}}
</div>

@endsection
@section('selectall')
    <script>
        $(".selectall").click(function(){
$(".individual").prop("checked",$(this).prop("checked"));
});
        </script>
@endsection
@section('deleteNotification')

<script>
    function deleteNotification(notification_id) {
        alert("Are You Sure to Delete The Notification? ");
        function ajaxCall() {
                        $.ajax({
            
                            url: "{{ url('delete-notification')}}" + '/' + notification_id,
                            type: "POST",
                            data: {
                               
                                '_token': '{{ csrf_token() }}',
                                '_method': 'DELETE'

                                    },

                            dataType: "JSON",
                            success: function (data) {
                                swal(data.msg);
                                // $("#noti"+id+"").remove();
                                location.reload();
                           
                            },
                            
                            
                        });
                    }
                    ajaxCall();
               
    }

    $("#deleteNotification").click(function(e) {
        e.preventDefault();
        var allIds = [];
        $("input:checkbox[name=notification_ids]:checked").each(function(){
            allIds.push($(this).val());
        });
        alert(allIds);
    })
</script>
@endsection
@include('Admin.sweetAlertMsg')



