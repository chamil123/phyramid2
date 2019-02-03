@extends('Web.layout')

@section('body')
<script src="{{ asset('bower_components/jquery/dist/jQuery-2.1.4.min.js')}}"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script>
       $('#cartMsg').fadeIn(700).delay(1500).fadeOut(200);
    $(document).ready(function () {
        $("#cartMsg").hide();
                @foreach($carts as $cart)
                $('#upCart{{$cart->id}}').on('change keyup', function () {
            var newQty = $('#upCart{{$cart->id}}').val();
            var rowID = $('#rowID{{$cart->id}}').val();
      // alert(rowId);
            $.ajax({
            url: '{{url('/cart/update')}}',
                    data: 'rowID=' + rowID + '&newQty=' + newQty,
                    type: 'get',
                    success: function (response) {
                    $("#cartMsg").show();
                     console.log("cc : "+response);
                    $("#cartMsg").html(response);
                    }
        });
        // alert(newQty);
    });
            @endforeach
    });
  
</script>

<style>

    .dropdown-menu {
        width: 300px !important;
        height: 400px !important;
    }
</style>
<!-- breadcrumb area start -->
<div class="breadcrumb-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item"><a href="shop-grid-left-sidebar.html">shop</a></li>
                            <li class="breadcrumb-item active" aria-current="page">cart</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- breadcrumb area end -->

<!-- page main wrapper start -->
<main>
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper pt-100 pb-100 pt-sm-58 pb-sm-58">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <!--@if(isset($msg))-->

                        <!--@endif-->
                        <div id="cartMsg" class="alert alert-success" ></div>
                        <table class="table table-bordered">

                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-price">PV value</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($carts as $cart)
                                <tr>
                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="{{asset('storage/images/'.$cart->options->img)}}"alt="Product"/></a></td>

                                    <td class="pro-title"><a href="#"></a>{{$cart->name}}</td>
                                    <td class="pro-price"><span>Rs {{$cart->price}}</span></td>
                                    <td class="pro-price"><span> {{$cart->options->pv*$cart->qty}}</span> <button  class="btn btn-dark btn-sm"  data-toggle="modal" onclick="addPv({{$cart->options->pv*$cart->qty}},{{$cart->id}});" data-target="#exampleModal">advance</button></td>
                                    <td class="pro-quantity" >
                                        <input type="hidden" value="{{$cart->rowId}}" id="rowID{{$cart->id}}">
                                        <!--<div class="row">-->
                                        <div class="pro-price">
                                            <input class="form-controll" style="padding-left: 15px;width: 55px"type="number" id="upCart{{$cart->id}}" value="{{$cart->qty}}">
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><span>Rs {{$cart->price*$cart->qty}}</span></td>
                                    <td class="pro-remove"><a href="{{url('cart/remove')}}/{{$cart->rowId}}"><i class="fas fa-trash-alt"></i></a></td>
                                </tr> 
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <form role="form" method="post" action="/checkout" >
                        {{csrf_field()}}
                        <!-- Cart Update Option -->
                        <div class="cart-update-option d-block d-md-flex justify-content-between">
                            <div class="apply-coupon-wrapper">
                                <!--<form action="#" method="post" class="  ">-->
                                    <!--<input type="text" placeholder="Enter Your Coupon Code" required />-->
                                <label for="staticEmail2" style="width: 100px" class="sr-only">Email</label>
                                <select class="form-control form-control-sm " style="width: 100px" id="dummey_id" name="dummey_id">
                                    <!--<option  >Select dummry </option>-->
                                  @foreach($dummeys as $dummey)
                                    <option value="{{$dummey->id}}">{{$dummey->dummey_name}}</option>
                                    @endforeach
                                </select>
                                <!--<button class="sqr-btn">Apply Coupon</button>-->
                                <!--</form>-->
                            </div>
                            <div class="cart-update mt-sm-16">

                                <!--<a href="#" class="sqr-btn">Update Cart</a>-->
                            </div>
                        </div> 
                        @if(Cart::count()!="0")
                        @else
                        <div style="margin-top:10px"><h4>Cart is empty</h4></div>
                        @endif
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">

                        <div class="cart-calculate-items">
                            <h3>Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td>Rs {{Cart::subtotal()}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tax</td>
                                        <td>Rs0</td>
                                    </tr>
                                    <tr class="total">
                                        <td>Total</td>
                                    <input type="hidden" name="total" value="{{Cart::subtotal()}}"/>
                                        <td class="total-amount">Rs {{Cart::subtotal()}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <button type="sybmit" class="sqr-btn d-block btn-block">Proceed To Checkout</button>
                        <!--<a href="" class="sqr-btn d-block">Proceed To Checkout</a>-->
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- cart main wrapper end -->
</main>

<!-- Button trigger modal -->

<div class="modal fade"  id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" style="width: 100%" role="document" >
        <div class="modal-content" style="border-radius: 4px;" >

            <div class="modal-body" style="padding-top: 10px">
                <div class="row" style="margin-top: 20px">

                    <div class="col-md-12">

                        <div class="box box-primary">
                            <div class="alert alert-danger " role="alert" id="alertDiv"> 
                                This is a warning alert—check it out!
                            </div>
                            <div class="box-body">
                                <div class="row form-inline" style="padding-bottom: 10px">
                                    <div class=" col-md-3">PV value : <span > </span></div>
                                    <div class=" col-md-1 " ><input id="currentPv" type="text" class="form-control-sm" style="border: hidden;margin-left: -50px;font-weight: bold" /> </div>
                                    <input type="hidden" id="currentPv_1" />

                                </div>

                                <form class="form-inline" id="addform">

                                    @csrf


                                    <div class="form-group " >
                                        <label for="staticEmail2" style="width: 300px" class="sr-only">Email</label>
                                        <select class="form-control form-control-sm " style="width: 300px" id="dummey_id" name="dummey_id">
                                             @foreach($dummeys as $dummey)
                                            <option value="{{$dummey->id}}">{{$dummey->dummey_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="product_id" name="product_id" />
                                    <div class="form-group mx-sm-2 ">
                                        <label for="inputPassword2" class="sr-only">Password</label>
                                        <input type="text" class="form-control " width="100px" id="pv_value" name="pv_value" placeholder="pv value">
                                    </div>
                                    <button   type="submit" class="btn btn-primary "  > Add </button>
                                </form>
                                <div id="controlid">

                                </div>



                            </div>
                        </div>
                    </div>
                </div> 

            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary btn-sm  mx-sm-6" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script >
    $('#alertDiv').hide()
    function addPv(currentPv, product_id) {
        document.getElementById('currentPv').value = currentPv;
        document.getElementById('currentPv_1').value = currentPv;
        document.getElementById('product_id').value = product_id;
    }
    $(document).ready(function () {
        $('#addform').on('submit', function (e) {

            var current = parseFloat(document.getElementById('currentPv').value);
            var input_val = parseFloat(document.getElementById('pv_value').value);
              var product_id = parseFloat(document.getElementById('product_id').value);



            if (current >= input_val) {
                e.preventDefault();
                $.ajax({
                    url: "/dummey_pv", //this is your uri
                    type: 'POST', //this is your method
                    data: $('#addform').serialize(),
                    success: function (data) {
                        // console.log(data)

//          
                    }
                });
            } else {
                e.preventDefault();


//                $('#alertDiv').html(table);
                $('#alertDiv').fadeIn(700).delay(1500).fadeOut(200);
                $('#alertDiv').html('Cannot complete the request');
//                alert("cannot complete the request");
            }
            loadData(product_id);
            document.getElementById('pv_value').value = '';
        });


    });


    function loadData(product_id) {
        console.log("aaa: "+product_id);
        var total = 0;

        $.ajax({
            url: "viewdummey_pv/"+product_id, //this is your uri
            type: 'get', //this is your method
            success: function (data) {
                console.log("BB : "+data);
                var table = '<div class="row">'
                table = '<div class="col-md-12">'
                table = ' <div class="box">'

                table = '<div class="box-body">';
                table = '<table class="table  table-dark " style="width:100%;margin-top:10px">';
                table += '<thead style="width:100%">'

                table += '<tr>'
                table += '<td>Dummey Id</td>'
                table += '<td>Pv value</td>'
                table += '<td>Action</td>'
                table += '</tr>'
                table += '</thead>'
                table += '<tbody>'
                for (var i in data) {

//alert(data[i].id);
                    id = data[i].id;
                    dummey_id = data[i].dummey_id;
                    pv_value = data[i].pv_value;
                    table += '<tr hight="10">'
                    table += '<td>'
                    table += dummey_id;
                    table += '</td>'
                    table += '<td>'
                    table += pv_value;
                    table += '</td>'

                    table += '<td>'
                    table += '<button onclick="deleteData(' + id + ');" type="button" class="btn btn-danger btn-sm "> <i class="fas fa-trash-alt"></i> Delete</button>';
                    table += '</td>'

                    table += '</tr>'

                    total += parseFloat(pv_value);
                }
                table += '</tbody>'
                table += '</div>';
                table += '</div>';
                table += '</div>';
                table += '</div>';

                $('#controlid').html(table);

                var current = document.getElementById('currentPv_1').value;
//                alert("total : " + total + " current : " + current);
                var minus_val = current - total;
                document.getElementById('currentPv').value = minus_val;

//                $('#alertDiv').fadeIn(700).delay(1500).fadeOut(200);
//                $('#alertDiv').html('Cannot complete the request');
            }



        });
    }
    function  deleteData(id) {
       var product_id = parseFloat(document.getElementById('product_id').value);
        $.ajax({
            url: "dummey_pv_delete/" + id, //this is your uri

            type: 'get', //this is your method
            //data: $('#addform').serialize(),
            success: function (data) {
                // console.log(data)
                loadData(product_id);
//          
            }
        });
        //  alert(id);
    }

</script>
@endsection
