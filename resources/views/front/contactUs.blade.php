
@extends('front.footer')   
@extends('front.nav')

@section('title')
Contact 
@endsection

  

@section('content')
<div id="colorlib-contact">
			<div class="container">
				
				<div class="row">
					<div class="col-md-6">
						<div class="contact-wrap">
							<h3>Get In Touch</h3>
							<form action="{{route('send.email')}}" method="POST" class="contact-form">
								@csrf
								@if(Session::has('error'))
								<div class="alert alert-danger">
									{{Session::get('error')}}
									</div>

								@endif
								@if(Session::has('success'))
								<div class="alert alert-danger">
									{{Session::get('success')}}
									</div>

								@endif

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="name">Full Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder='enter your name' value="{{ old('name') }}">
											@error('name') <span class="text-danger">{{$message}} </span>@enderror
										</div>
									</div>
									
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<label for="email">Email</label>
											<input type="text" name="email" id="email" class="form-control" placeholder="Your email address" value="{{ old('email') }}">
											@error('name') <span class="text-danger">{{$message}} </span>@enderror
										</div>
									</div>
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<label for="subject">Subject</label>
											<input type="text" name="subject" id="subject" class="form-control" placeholder="Your subject of this message" value="{{ old('subject') }}">
											@error('name') <span class="text-danger">{{$message}} </span>@enderror
										</div>
									</div>
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<label for="message">Message</label>
											<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us" value="{{ old('message') }}"></textarea>
											
										</div>
									</div>
									<div class="w-100"></div>
									<div class="col-sm-12">
										<div class="form-group">
											<input type="submit" value="Send Message" class="btn btn-primary">
										</div>
									</div>
								</div>
							</form>		
						</div>
					</div>
					<div class="col-md-6">
						<div id="map" class="colorlib-map"></div>		
					</div>
				</div>
			</div>
		</div>
@endsection
    	


   
   