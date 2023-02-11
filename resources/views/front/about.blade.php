@extends('front/master')

@section('title')
About Us
@endsection
@section('body_section')
<main>

<section class="about-sec">
	<div class="container">
		<div class="row">
			<div class="col-lg-11">
				<div class="row gy-4">
			        <div class="col-lg-5">
			        	<div class="about-img"> 
			        		<img class="img-fluid" src='{{asset("documents/image/$data->image??null")}}'>
			        	</div>
			        </div>
			        <div class="col-lg-6">
			        	<div class="about-content">
			        		<h2>{{$data->title??null}}</h2>
			        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			        		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse
			        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			        	</div>
			        </div>
			          <div class="col-lg-12">
			        	<div class="about-content">
			        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			        		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			        		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			        		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			        		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			        		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			        		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			        	</div>
			        </div>

		        </div>
			</div>
		</div>
	</div>
</section>

</main>
@endsection

@section('script_section')

@endsection