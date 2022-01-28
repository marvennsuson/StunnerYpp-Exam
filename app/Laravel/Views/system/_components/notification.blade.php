@if(session()->has('notification-message'))
<div class="alert alert-dark-{{in_array(session()->get('notification-status'),['danger','error']) ? "danger" : session()->get('notification-status')}} alert-dismissible fade show">
    <button class="close" type="button" data-dismiss="alert">x</button>
    {{session()->get('notification-message')}}
</div>
@endif