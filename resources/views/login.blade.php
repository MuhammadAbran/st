@extends('layouts.form')

@section('field')
<form action="{{url('/')}}" method="POST">
                {{ csrf_field() }}
					<span class="login100-form-title p-b-51">
						Login
					</span>

					@component('component.input', ['type' => 'text', 'name' => 'Username'])
					
					@endcomponent
					@component('component.input', ['type' => 'password', 'name' => 'Password'])
					
					@endcomponent
					
					<div class="flex-sb-m w-full p-t-3 p-b-24">
						<div class="contact100-form-checkbox">
							<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
							<label class="label-checkbox100" for="ckb1">
								Remember me
							</label>
						</div>

						<div>
							<a href="#" class="txt1">
								Forgot?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn m-t-17">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
				@component('component.js')

				@endcomponent
@endsection