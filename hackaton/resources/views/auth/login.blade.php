@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10 col-lg-6">
			<div class="card">
				<div class="card-body">
					<form method="POST" action="{{ route('login') }}">
						{{ csrf_field() }}
						<!--Header-->
						<div class="form-header">
							<h3 class="h4">Најави се:</h3>
						</div>
						<!--Body-->
						<div class="md-form{{ $errors->has('email') ? ' has-error' : '' }}">
							<i class="fas fa-envelope prefix grey-text"></i>
							<label for="defaultForm-email">E-mail адреса</label for="defaultForm-email">
							<input type="text" id="defaultForm-email" class="form-control" name="email" value="admin@email.com" required autofocus>

							@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
							@endif
						</div>
						<div class="md-form{{ $errors->has('password') ? ' has-error' : '' }}">
							<i class="fas fa-lock prefix grey-text"></i>
							<label for="defaultForm-pass">Лозинка</label>
							<input type="password" id="defaultForm-pass" class="form-control"  name="password" value="admin#2019" required autofocus>

							@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
							@endif
						</div>
						<div class="text-center">
							<button class="btn btn-info my-4 btn-block" type="submit">Најава</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection