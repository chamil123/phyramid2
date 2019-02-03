@extends('Admin.layout')

@section('title','Member')

@section('body')
<section class="content-header">
    <h1>
        Member
        <small>Member profile</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <form role="form" method="post" action="/member/" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">

            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Personal details</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member image</label>
                            <input type="file"  id="image" value="" name="image" >
                            <img src="" width="130px">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member name</label>
                            <input type="text" class="form-control" id="member_name" value="{{ Auth::user()->name }}" name="member_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member NIC</label>
                            <input type="text" class="form-control" id="member_nic" value="{{ Auth::user()->user_nic }}"  name="member_nic" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member Address</label>
                            <textarea id="member_address" class="form-control" rows="3" name="member_address">{{ Auth::user()->user_address }}</textarea>
                            <!--<input type="text" class="form-control" id="member_address" name="member_address" placeholder="Enter Address">-->
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="exampleInputEmail1">Member Gender</label>
                            </div>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio"   name="member_gender" id="member_gender" value="male" >
                                    
                                    
                                    
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="member_gender" id="member_gender" value="female" >
                                </label>
                                <span id="genderInfo"  class="col-sm-12" style="padding-left: 30px;color: #ff0033" ></span>                 
                            </div>
                            
                            




                        </div> 

                        <div class="form-group">
                            <label for="exampleInputEmail1">Date Of Birth</label>

                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="member_dob"  value="" class="form-control pull-right" id="datepicker">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number 1</label>
                            <input type="text" class="form-control" id="member_contact_1"  value="{{ Auth::user()->user_contact_1 }}" name="member_contact_1" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number 2</label>
                            <input type="text" class="form-control" id="member_contact_2"  value="" name="member_contact_2" placeholder="Enter Address">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bank Details </h3>
                    </div>


                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bank name</label>
                            <input type="text" class="form-control" id="member_bank_name" value="" name="member_bank_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Branch</label>
                            <input type="text" class="form-control" id="member_bank_branch" value=""  name="member_bank_branch" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Account number</label>
                            <input type="text" class="form-control" id="member_account_no" value=""  name="member_account_no" placeholder="Enter NIC number">
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <!-- Horizontal Form -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Beneficiary Details </h3>
                    </div>



                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Beneficiary Name</label>
                            <input type="text" class="form-control" id="member_benifit_name" value="" name="member_benifit_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Beneficiary Address</label>
                            <textarea id="member_benifit_address" class="form-control" rows="3" name="member_benifit_address"></textarea>
                        </div>

                    </div>

                </div>
            </div>

            <!--/.col (right) -->
        </div>
        <button type="submit" class="btn btn-warning">Save changes</button>
        <button type="reset" name="reset" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Clear</button>
    </form>
    <!-- /.row -->
</section>


@endsection