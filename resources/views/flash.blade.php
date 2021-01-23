  @if(Session::has('flash_notification.message'))
    <div class="alert alert-{{ Session::get('flash_notification.type') }} alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" style="margin-top: -10px;margin-right: -8px;">×</button>
      {!!  Session::get('flash_notification.message') !!}
    </div>
  @elseif(Session::has('danger'))
    <div class="alert alert-danger alert-dismissable" >
      {!!  Session::get('danger') !!}
    </div>
  @endif
