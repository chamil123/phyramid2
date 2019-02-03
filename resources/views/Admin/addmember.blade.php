@extends('Admin.layout')

@section('title','Member')

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
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Basic details</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="/member">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member name</label>
                            <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member NIC</label>
                            <input type="text" class="form-control" id="member_nic" name="member_nic" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Member Address</label>
                            <input type="text" class="form-control" id="member_address" name="member_address" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <div>
                                <label for="exampleInputEmail1">Member Gender</label>
                            </div>
                            <div>
                                <label class="radio-inline">
                                    <input type="radio"   name="member_gender" id="member_gender" value="male">male
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="member_gender" id="member_gender" value="female">female
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
                                <input type="text" name="member_dob"  class="form-control pull-right" id="datepicker">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number 1</label>
                            <input type="text" class="form-control" id="member_contact_1" name="member_contact_1" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number 2</label>
                            <input type="text" class="form-control" id="member_contact_2" name="member_contact_2" placeholder="Enter Address">
                        </div>


                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->






        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Horizontal Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info pull-right">Sign in</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>


            <!-- /.box -->
        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
</section>


@endsection