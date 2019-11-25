@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<div class="card shadow mb-4">
		<form action="{{ route('clients.update', $client->id) }}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT')}}
			<div class="card-header d-flex justify-content-between py-3 py-lg-4 w-100 align-items-end">
				<h6 class="h4 m-0 font-weight-bold text-primary">Изменување на купон:</h6>
				<div>
					<button type="submit" class="btn btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Зачувај</button>
					<a href="{{ route('clients.index') }}" class="btn btn-danger shadow-sm"><i class="fas fa-close fa-sm text-white-50"></i> Откажи</a>
				</div>
			</div>
			<div class="card-body">
				<!-- Card Body -->
				<div class="card-body">
					<div class="form">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>E-mail</label>
									<input class="form-control" name="mail" value="{{ $client->mail }}">
									<span class="text-danger">{{ $errors->first('mail') }}</span>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Код на купон</label>
									<input class="form-control" name="code" value="{{ $client->code }}">
									<span class="text-danger">{{ $errors->first('code') }}</span>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Статус на купон</label>
									<select name="status" class="custom-select" value={{ $client->status }}>
										<option {{ $client->status == 1 ? ' selected' : '' }} value="1">Нов купон</option>
										<option {{ $client->status == 2 ? ' selected' : '' }} value="2">Искористен купон</option>
									</select>
									<span class="text-danger">{{ $errors->first('status') }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection