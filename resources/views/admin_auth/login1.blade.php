@extends('layouts/login/master')

@section('login')
	
	<div class="cont_login">
		<div class="cont_info_log_sign_up">
			<div class="col_md_login">
				<div class="cont_ba_opcitiy">

	    			<h2>LOGIN</h2>  
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> 
					<button class="btn_login" onclick="cambiar_login()">LOGIN</button>
				</div>
			</div>
			<div class="col_md_sign_up">
				<div class="cont_ba_opcitiy">
					<h2>REGISTER</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					<button class="btn_sign_up" onclick="cambiar_sign_up()">REGISTER</a></button>
				</div>
			</div>
		</div>


		<div class="cont_back_info">
	   		<div class="cont_img_back_grey">
	   			<img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
	   		</div>
	   
		</div>
		<div class="cont_forms" >
			<div class="cont_img_back_">
	   			<img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
	   		</div>
	   		<form method="POST" action="{{ route('admin.login') }}" aria-label="{{ __('Login') }}">
	            @csrf
	 			<div class="cont_form_login">
					<a href="#" onclick="ocultar_login_sign_up()" ><i class="material-icons">&#xE5C4;</i></a>
	   				<h2>LOGIN</h2>
					<input id="username" type="text" placeholder="Username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

				    @if ($errors->has('username'))
				        <span class="invalid-feedback" role="alert">
				            <strong>{{ $errors->first('username') }}</strong>
				        </span>
				    @endif

					<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password" name="password" required>

					@if ($errors->has('password'))
	                    <span class="invalid-feedback" role="alert">
	                        <strong>{{ $errors->first('password') }}</strong>
	                    </span>
	                @endif

					<button class="btn_login" type="submit">LOGIN</button>
				</div>
			</form>
				
			<form method="POST" action="{{ route('admin.register') }}" aria-label="{{ __('Register') }}">
	            @csrf
	   			<div class="cont_form_sign_up">
					<a href="#" onclick="ocultar_login_sign_up()"><i class="material-icons">&#xE5C4;</i></a>
	     			<h2>REGISTER</h2>
				     <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Name">

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
					<input id="username1" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus placeholder="Username">

                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    <input id="password1" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
					<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm password">

				    {{-- <input id="status" type="text" name="status" placeholder="Status" class="form-control" value="{{ old('status') }}" required> --}}

				    <button class="btn_sign_up" type="submit">REGISTER</button>
				    
	    		</div>
			</form>
		</div>

	</div>

@endsection