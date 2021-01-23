  @if(Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.type') }} alert-dismissable mb-3">
        <button type="button" class="close" data-dismiss="alert">×</button>
      {!!  Session::get('flash_notification.message') !!}
    </div>
  @elseif(Session::has('danger'))
    <div class="alert alert-danger alert-dismissable" >
      {!!  Session::get('danger') !!}
    </div>
  @endif
