@extends('Admin.layout')

@section('title','Member')

@section('body')
<section class="content-header">
    <h1>
        Orders
        <small>View Orders</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fas fa-tachometer-alt"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">

        <div class="col-md-12">

            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Date</th>

                                <th>Total</th>
                                <th>PV value</th>
                                <th style="width:200px">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td> {{$order->created_at}}</td>
                                <td>{{$order->total}}</td>

                                <td>{{$order->PV_value}}</td>
                                <td>
                                    <button id="viewbtn" onclick="abc({{$order->id}});"type="button" class="  btn btn-warning btn-sm " >
                                        <i class="glyphicon glyphicon-edit"></i> view</button>


                                    <a href=""  style="color: white">  <button type="button" class="btn btn-danger btn-sm ">
                                            <i class="glyphicon glyphicon-trash"></i> delete </button>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.box-body -->
            </div>


        </div>


    </div>

</section>
<!-- Button trigger modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" style="width: 62%;">
        <div class="modal-content" style="border-radius: 4px; background-color: #ecf0f5" >
            <div class="modal-body" style="padding-top: 10px">

                <div class="row" style="margin-top: -12px">

                    <!--<div class="cart-table table-responsive">-->
                    <div style="padding: 16px;margin-bottom: -15px">    
                        <span style="padding-bottom: 30px">View Order</span>
                        <div class="card" style="padding: 12px;margin-top: 5px">

                            <div class="card-body">
                                <h5 class="card-title" style="font-size: 18px">Order #<span id="order_id"></span> detils</h5>
                                <h6 class="card-subtitle mb-2 text-muted">General details</h6>
                                <p class="card-text">Date created  : <span style="color: #999999" id="dates"> </span></p>
                                <!--                                <a href="#" class="card-link">Card link</a>
                                                                <a href="#" class="card-link">Another link</a>-->
                            </div>
                        </div>
                    </div>
                    <section class="content">

                        <div class="row">

                            <div class="col-md-12">
                                <div class="box">

                                    <div class="form-group" id="controlid">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="row">
                        <div class="col-lg-5 col-md-offset-8" style="margin-top: -30px">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">

                                    <!--<div class="table-responsive">-->
                                    <table border="0" height="90">
                                        <tr height="30" > <td width="110">Sub total</td> <td  width="100"><spam id="subtotal"></spam></td> </tr>
                                        <tr height="30"> <td width="110">Tax</td> <td  width="100">0</td> </tr>
                                        <tr height="30" style="border-top: 1px solid;border-bottom: 2px solid"> <td width="110" style="font-weight: bold;">Total</td> <td  width="100"><spam style="font-weight: bold" id="total"></spam></td > </tr>
                                    </table>
                                </div>
                                <!--</div>-->

                            </div>
                        </div>
                    </div>
                </div>
            </div> 
            <!--</div>-->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script type="text/javascript">

            function abc(id) {

            $.ajax({
            url: "{{url('orders')}}" + "/" + id, //this is your uri
                    type: 'get', //this is your method
                    success: function (data) {
                        
                       // console.log(data);

                    $('#exampleModal').modal("show");
                            var table = '<table class="table table-striped table-responsive">';
                            table += '<tr>'
                            table += '<td>Image</td>'
                            table += '<td>Product Name</td>'
                            table += '<td>Price</td>'
                            table += '<td>PV value</td>'
                            table += '<td>Quantity</td>'

                            table += '</tr>'
                            for (var i in data) {
                    $('#order_id').html(data[i].id);
                            $('#dates').html(data[i].created_at);
                            $('#total').html(data[i].total);
                            $('#subtotal').html(data[i].total);
                            name = data[i].product_name;
                            image = data[i].image;
                            total = data[i].total;
                            pv_value = data[i].pv_value;
                            qty = data[i].qty;
                            //                            alert(member_id);
                            table += '<tr>'
                            table += '<td>'
                            table += '<img class="img-fluid" src="{{asset("storage/images/")}}/' + image + '" width="60 alt="Product"/>';
                            table += '</td>'
                            table += '<td>'
                            table += name;
                            table += '</td>'
                            table += '<td>'
                            table += total;
                            table += '</td>'
                            table += '<td>'
                            table += pv_value;
                            table += '</td>'
                            table += '<td>'
                            table += qty;
                            table += '</td>'
                            table += '</tr>'
                    }
                    $('#controlid').html(table);
                    }
            });
            }
</script>