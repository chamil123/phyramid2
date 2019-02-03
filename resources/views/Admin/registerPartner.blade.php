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
    <form role="form" method="post" action="/partner"> 
        {{csrf_field()}}
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

                                <img src="{{asset('storage/images/'.$member->image)}}" alt="awaweaaw" width="110px">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">NIC </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="inputPassword3" value="{{$member->member_nic}}" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Member name </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$member->member_name}}" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Mobile Number </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$member->member_contact_1}}" id="inputPassword3" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-4 control-label">Address </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" value="{{$member->member_address}}" id="inputPassword3" placeholder="Password">
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
            <div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Partner details</h3>
                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tracking Center</label>
                            <select class="form-control" id="sel1" name="nic_dummey">
                                <option>876073829_A</option>
                                <option>876073829_B</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Side</label>
                            <select class="form-control" id="sel1" name="side">
                                <option>Left</option>
                                <option>Right</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Partner NIC</label>
                            <input type="text" class="form-control" id="member_nic" name="member_nic" placeholder="Enter NIC number">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" id="member_name" name="member_name" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mobile Number</label>
                            <input type="text" class="form-control" id="member_contact_1" name="member_contact_1" placeholder="Enter Address">
                        </div>
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1"> Address</label>
                            <input type="text" class="form-control" id="member_address" name="member_address" placeholder="Enter Address">
                        </div> -->
                    </div>
                </div>

            </div>




            <!--/.col (right) -->
        </div>


        <button type="submit" class="btn btn-success">Add Member</button>
        <!-- <button type="submit" name="submit" class="btn btn-info">
             <i class="glyphicon glyphicon-save"></i>
             Submit</button>-->
        <button type="reset" name="reset" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Clear</button>
    </form> 

    <!-- /.row -->
</section>


@endsection