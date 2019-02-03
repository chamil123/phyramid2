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
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th style="width: 200px">Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>PV value</th>
                                <th>Category</th>
                                <th style="width: 230px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td> <img src="{{asset('storage/images/'.$product->product_image)}}" width="90px"></td>
                                <td> {{$product->product_name}}</td>
                                <td>{{$product->product_description}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_pv_value}}</td>
                                <td>{{$product->cat_name}}</td>
                                <td style="width: 230px">
                                    <button id="viewbtn" onclick="abc({{$product->id}});"type="button" class="  btn btn-default btn-sm " >
                                        <i class="glyphicon glyphicon-edit"></i> view</button>

                                    <a href="{{'/product/'.$product->id.'/edit'}}"  style="color: white">  <button type="button" class="btn btn-warning btn-sm ">
                                            <i class="glyphicon glyphicon-edit"></i> update</button>
                                    </a>
                                    <a href=""  style="color: white">  <button type="button" class="btn btn-danger btn-sm ">
                                            <i class="glyphicon glyphicon-trash"></i> delete </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                        {{$products->links()}}
                </div>
            </div>
        </div>
    </div> 
</section>



<!-- Button trigger modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document" style="width: 62%">
        <div class="modal-content" style="border-radius: 4px;" >
            <!--            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal titlessss</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>-->
            <div class="modal-body" style="padding-top: 10px">
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-5" style="margin-top: 25px">
                        <img id="myimg" class="img-thumbnail" src="" width="315px">
                    </div>
                    <div class="col-md-7">


                        <form action="/action_page.php">
                            <div class="form-group">
                                <label for="email">Product Name:</label>
                                <input type="text" class="form-control"id="product_title">
                            </div>
                            <div class="form-group">
                                <label for="email">PV value:</label>
                                <input type="text" class="form-control" id="product_PV">
                            </div>
                            <div class="form-group">
                                <label for="email">Product Price:</label>
                                <input type="text" class="form-control" id="product_price">
                            </div>
                            <div class="form-group">
                                <label for="email">Product Price:</label>
                                <textarea class="form-control" id="product_dis" rows="4"></textarea>
                            </div>
                            <!--                            <div class="form-group">
                                                            <label id="product_PV" style="font-size: 15px;color: #22dd77"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="product_price" style="font-size: 20px;"></label>
                                                        </div>
                                                        <div class="form-group">
                                                            <label id="product_dis" style="font-weight: normal" for="pwd"></label>
                                                        </div>-->
                        </form>


                    </div>
                </div> 
               
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('script')

<script type="text/javascript">
//    $('#read-data').on('click',function (){
//       alert("sdsdsds"); 
//    });

//    $(document).ready(function () {
//        $(document).on('click', '#viewbtn', function () {
    function abc(id) {
    $.ajax({
    url: "{{url('product')}}" + "/" + id, //this is your uri
            type: 'get', //this is your method
            success: function (data) {
            var img = data.product_image;
            $('#exampleModal').modal("show");
            $('#product_title').val(data.product_name);
            $('#product_dis').val(data.product_description);
            $('#product_price').val("Rs " + data.product_price + ".00");
            $('#product_PV').val("PV value : " + data.product_pv_value);
            $("#myimg").attr('src', "{{asset('storage/images/')}}/" + img);
            }
    });
    }
</script>

<script>
$(document).ready( function () {
    $('#example1').DataTable();
} );
</script>

@endsection




