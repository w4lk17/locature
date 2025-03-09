@extends('layouts.master')

@section('content')
<!-- Page Content -->
<div class="content">

	<!-- Page Header -->
	<div class="page-header">
		<div class="row">
			<div class="col-sm-12">
				<h3 class="page-title">Notifications</h3>
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="#">Dashboard</a></li>
					<li class="breadcrumb-item active">notifications</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /Page Header -->

	<div class="row">
		<div class="col-md-9">
			<div class="activity">
				<div class="activity-box">
					<ul class="activity-list">
						@forelse ($notifications as $notification)
						<li>
							<div class="activity-user">
								<a href="profile.html" title="Lesley Grauer" class="avatar">
									<img class="avatar" src="{{ asset('assets/media/avatars/avatar13.jpg') }}" alt="">
								</a>
							</div>
							<div class="activity-content">
								<div class="timeline-content font-w600" role="alert">
									
										L'utilisateur <a href="javascript:void(0)" class="name">{{ $notification->data['name'] }}</a>
										({{ $notification->data['email'] }}) a reservé une voiture!
										<div class="text-right">
											<a class="proced btn btn-sm btn-outline-primary mr-2"
												href="/manager/reservations/{{ $notification->data['reservation'] }}"
												data-id="{{ $notification->id }}">
												Proceder
											</a>
											<a href="javascript:void(0)" class="mark-as-read text-danger mr-2"
												data-id="{{ $notification->id }}">Marquer comme lu</a>
									
										</div>
											

									<span class="time">{{ $notification->created_at->diffForHumans() }}</span>
								</div>
							</div>
						</li>
						@if($loop->last)
						<a href="javascript:void(0)" id="mark-all">
							Tout marquer comme lu
						</a>
						@endif
						@empty
						Pas de nouvelles notifications
						@endforelse
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Page Content -->
@endsection
@section('script')
<script>
	token = $("meta[name='csrf-token']").attr("content");
		function sendMarkRequest(id = null) {
	        return $.ajax("{{ route('markNotification') }}", {
	            method: 'POST',
	            data: {
	                _token : token,
	                id
	            }
	        });
	    }
	    $(function() {
	        $('.mark-as-read').click(function() {
	            let request = sendMarkRequest($(this).data('id'));
	            request.done(() => {
								$(this).parents('div.alert').remove();
								location.reload(); // = "/activities";
	            });
	        });
	        $('.proced').click(function() {
	            let request = sendMarkRequest($(this).data('id'));
	            request.done(() => {
								$(this).parents('div.alert').remove();
								// location.reload(); // = "/activities";
	            });
	        });
	        $('#mark-all').click(function() {
	            let request = sendMarkRequest();
	            request.done(() => {
								$('div.alert').remove();
								location.reload();
	            })
	        });
	    });
</script>
@endsection