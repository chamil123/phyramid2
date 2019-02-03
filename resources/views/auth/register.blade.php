
@extends('Admin.layout')

@section('body')
<section class="content-header">
    <h1>
        Member
        <small>Add member</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <form  method="POST" action="{{ route('register') }}">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Horizontal Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->

                    <div class="box-body form-horizontal">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-4 control-label">Member Image</label>

                            <div class="col-sm-8">
                                <input type="hidden" class="form-control" id="user_id" name="user_id"  value="{{ Auth::user()->id }}" >
                                <img src="{{asset('storage/images/'.Auth::user()->image)}}" alt="awaweaaw" width="110px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">NIC </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputPassword3"  value="{{ Auth::user()->user_nic }}" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Member name </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ Auth::user()->name }}" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Mobile Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{ Auth::user()->user_contact_1 }} " id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Address </label>
                            <div class="col-sm-8">
                                <textarea type="text" class="form-control" rows="5" placeholder="Enter user address"></textarea>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Purchasing Value </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>

                    </div>

                </div>

            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Partner details</h3>
                    </div>

                    <div class="box-body">


                        <div class="form-group">
                            <label for="nic_dummey" class="col-md-4 col-form-label text-md-right">{{ __('Dummey NIC') }}</label>
                            <select class="form-control" id="nic_dummey" name="nic_dummey"  required autofocus>
                                @foreach($dummeys as $dummey)
                                <option value="{{$dummey->id}}">{{$dummey->dummey_name}}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('nic_dummey'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('nic_dummey') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="side" class="col-md-4 col-form-label text-md-right">{{ __('Side') }}</label>
                            <select class="form-control" id="side" name="side"  required autofocus>
                                @foreach($sides as $side)

                                @if($side->side=='Left')
                                <option> Right</option>
                                @elseif($side->side=='Right')
                                <option> Left</option>
                                @endif
                                @endforeach
                                @if($sides=='[]')
                                <option>Left</option>
                                <option>Right</option>
                                @endif
                            </select>
                            @if ($errors->has('side'))
                            <span class="help-block">
                                <strong>{{ $errors->first('side') }}</strong>
                            </span>
                            @endif
                            @if ($errors->has('side'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('side') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="user_nic" class="col-md-4 col-form-label text-md-right">{{ __('Partner NIC') }}</label>

                            <input type="text" class="form-control{{ $errors->has('user_nic') ? ' is-invalid' : '' }}" id="user_nic" name="user_nic" placeholder="Enter NIC number"  value="{{ old('user_nic') }}" required autofocus>
                            @if ($errors->has('user_nic'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user_nic') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="user_nic" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                            <input type="text" class="form-control{{ $errors->has('user_nic') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="Enter Name"value="{{ old('name') }}" required autofocus>
                            @if ($errors->has('name'))
                            <span class="help-block" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="user_contact_1" class="col-md-4 col-form-label text-md-right">{{ __('user_contact_1') }}</label>
                            <input type="user_contact_1" class="form-control{{ $errors->has('user_contact_1') ? ' is-invalid' : '' }}" id="user_contact_1" name="user_contact_1" placeholder="Enter password"  required autofocus>
                            @if ($errors->has('user_contact_1'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('user_contact_1') }}</strong>
                            </span>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                            <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Enter password"  required autofocus>
                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <input type="password-confirm" class="form-control" id="password_confirmation" placeholder="Enter Confirm Password"  name="password_confirmation" required>

                        </div>
                    </div>
                </div>

            </div>
        </div>
        <button type="submit" class="btn btn-success">Add Member</button>
        <button type="reset" name="reset" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Clear</button>
    </form> 
    <!-- /.row -->
</section>
<!--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group row">
                            <label for="user_nic" class="col-md-4 col-form-label text-md-right">{{ __('user_nic') }}</label>

                            <div class="col-md-6">
                                <input id="user_nic" type="text" class="form-control{{ $errors->has('user_nic') ? ' is-invalid' : '' }}" name="user_nic" value="{{ old('user_nic') }}" required autofocus>

                              
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->
@endsection
