@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">WelCome To Test Project, 28 Jan 2020</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }} 
                        </div>
		   @endif
		<b>	{{ Auth::user()->name }} as {{ Auth::user()->jabatan }} </b>
                    			You have been logged in!
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
