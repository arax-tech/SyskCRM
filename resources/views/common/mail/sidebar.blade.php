<div class="email-left-box px-0 mb-3">
    <div class="p-0">
        <a href="{{ url('compose') }}" class="btn btn-primary btn-block">Compose</a>
    </div>
    <div class="mail-list rounded mt-4">
        <a href="{{ url('/inbox') }}" class="list-group-item {{ (strpos(url()->full() , '/inbox')) ? 'active' : ''  }}"><i class="fa fa-inbox font-18 align-middle me-2"></i> Inbox </a>
        <a href="{{ url('/send') }}" class="list-group-item {{ (strpos(url()->full() , '/send')) ? 'active' : ''  }}"><i class="fa fa-paper-plane font-18 align-middle me-2"></i>Sent</a> 
    </div>
    
</div>