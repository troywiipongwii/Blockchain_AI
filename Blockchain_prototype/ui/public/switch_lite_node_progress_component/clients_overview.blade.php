@extends('agent.layout.app')

@section('css')

<link rel="stylesheet" href="{{URL::asset('theme/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">



<style>

.agent-breadcrumb .breadcrumb .breadcrumb-item1:before{

    content:none;



}
.dataTables_wrapper .row:nth-child(2) .col-sm-12 {

    overflow-x: unset !important;
    padding: 0;
    margin: 0px;
    border: unset;
    width: 100%;


    }

</style>

@endsection

@section('content')   

     <div class="center-wrapper">

            <div class="center-inner clearfix">

                <nav class="agent-breadcrumb">

                    <ol class="breadcrumb">

                        <li class="breadcrumb-item">

                            <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>

                                <path d="M0 0h24v24H0z" fill="none"/>

                            </svg> Clients</a>

                        </li>

                        <li class="breadcrumb-item current" aria-current="page">

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                                    <path d="M0 0h24v24H0z" fill="none"/>

                                    <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>

                                </svg> View {{ucfirst($data->name)}} {{ucfirst($data->middlename)}} {{ucfirst($data->lastname)}} {{ucfirst($data->suffix)}}</li>

                        <li class="breadcrumb-item"><a href="javascript:history.go(-1)" class="back"><i class="fa fa-angle-left" aria-hidden="true"></i> Back</a></li>

                        <li  class="breadcrumb-item1" style="float: right;content: none !important;font-size: 24px;font-weight: 600;margin: 0 25px 0 0;position: relative;padding: 0 0 0 35px;"><a href="{{route('agent.add_clientsale',$data->id)}}"><button class="btn custom-btn pull-right fill editsale mob-tpmarg">Add New Sale</button></a></li>

                    </ol>

                </nav>



                <div class="agent-sales-view-tab clearfix">

                    <ul class="sales-view-tab-navi clearfix">

                        <li><a href="#clientinfo" class="active">Client information</a></li>

                        <li><a href="#uploaddoc">Uploaded Documents</a></li>

                    </ul>

                    <div class="sales-view-tab-container" id="clientinfo" style="display:block;">

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">

                                <div class="details-heads clearfix">

                                    <span class="name">{{ucfirst($data->name)}} {{ucfirst($data->middlename)}} {{ucfirst($data->lastname)}} {{ucfirst($data->suffix)}}</span>

                                    

                                </div>

                                <div class="row sales-view-details">

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <label>Social Security Number: </label>

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">XXX-XX-{{substr("$data->social",-4)}}</span>

                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <label>Phone:  </label>

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->phone}}</span>

                                    </div>

                                    @if($data->phone1 != '')

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <label>Alternate Phone:</label>

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->phone1}}</span>

                                    </div>

                                    @endif

                                    @if($data->email != '')

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <label>Email:</label>

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->email}}</span>

                                    </div>

                                    @endif

                                    @if($data->email1 != '')

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <label>Alternate Email:</label>

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->email1}}</span>

                                    </div>

                                    @endif

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <label>Date of Birth:</label>

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->birthday}}</span>

                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                        <label>Address:</label>

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->address}} </span>

                                    </div>

                                   @if($data->address2 != '')

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->address2}} </span>

                                    </div>

                                    @endif

                                    @if($data->city != '' || $data->state != '' || $data->pincode != '' )

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->city}}, {{$data->state}} {{$data->pincode}} </span>

                                    </div>

                                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">

                                    </div>

                                    <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">

                                        <span class="text">{{$data->country}}</span>

                                    </div>
                                    @endif

                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <hr class="fline">

                                    </div>
                    </div>

                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <div class="notification-table-wrap">

                    <div class="stickyTable" style="overflow-x: unset!important;min-width: auto !important;">

                        <table id="example1" style="min-width: auto !important;" class="table outlet-table shortingTable sticky-enabled notifications-table table-responsive no-padding video-list1">

                            <thead>

                                <tr>

                                    <th>

                                        <span class="shortingLabel">Sales ID </span>

                                    </th>

                                    <th >

                                        <span class="shortingLabel">Sale Amount</span>

                                    </th>

                                    <th >

                                        <span class="shortingLabel">Sale Type</span>

                                    </th>

                                    

                                </tr>

                            </thead>

                            <tbody>

                                @foreach($data->sales as $d)

                                <tr>

                                    
                                    <td><a href="{{route('agent.sales_detail',$d->id)}}" class="cname">{{($d->id)}}</a></td>

                                    <td >{{$d->amount}}</td>

                                    <td>{{$d->type}}</td>

                                    

                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

                                    

                            </div>

                        </div>

                    </div>


                <div class="sales-view-tab-container" id="uploaddoc">

                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-10">

                                 <div class="sed-heading">Uploaded Documents</div>

                                <!-- <a href="{{route('agent.client_file', $data->id)}}"><button type="button" class="btn custom-btn pull-right editsale">Upload Files</button></a> -->

                                <ul class="sale-pdf-list">

                                    @if($data->clientdocument != '')

                                    @foreach($data->clientdocument as $filedata)

                                    <li>

                                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#deletesalefile"  class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn normal">

                                            <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>

                                            <path d="M0 0h24v24H0z" fill="none"/>

                                        </svg>                                        

                                         Delete</a>



<!-- for delete bank detail -->

<div class="modal fade modal-center bd-example-modal-lm forgot" id="deletesalefile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >

    <div class="modal-dialog modal-lm" role="document">

        <div class="modal-content" style="width: 470px;">

            <div class="modal-body" style="padding: 15px 15px 0px;">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">&times;</span>

                 </button>

                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                                <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zM9 17H7v-7h2v7zm4 0h-2V7h2v10zm4 0h-2v-4h2v4z"/>

                                <path d="M0 0h24v24H0z" fill="none"/>

                            </svg> Client File </h2>

                 

                 <h6>Are you want to delete this file?</h6>

                       <form class="login_modal forgot_password" action="{{url('/agent/client_filedelete')}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}



                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">

                            <input type="hidden" name="fileid" value="{{$filedata->id}}">

                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">close</button>

                              <button type="submit" class="custom-btn mr15">Submit</button>

                          </div>



                      </form>

            </div>



      <div class="clearfix"></div><hr class="fline"><p style="text-align: center;"><a class="close" data-dismiss="modal" aria-label="Close" style="cursor: pointer;" >Back to sale page</a></p>

        </div>

    </div>

</div><!--End picture modal -->





                                        

                                        <a href="{{URL::asset('file/'.$filedata->file)}}" class="pdfvew" target="_blank"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                                            <path d="M0 0h24v24H0z" fill="none"/>

                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>

                                        </svg> View</a>

                                        <div class="pdf-file">

                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">

                                                    <path fill="none" d="M0 0h24v24H0z"/>

                                                    <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/>

                                                </svg>

                                            <span class="head">{{$filedata->file}}</span>

                                            <span class="upcname"><i>Uploaded by:</i> {{$filedata->username->name}}</span>

                                            <span class="upcdate"><i>Uploaded on:</i> {{date('h:i a, dM',strtotime($filedata->created_at))}}</span>

                                        </div>

                                    </li>

                                    @endforeach

                                    @endif



                                </ul>

                            </div>

                        </div>

                    </div>

            </div>

        </div>

    </div>

                    

                                 

@section('js')

<script>

        $(document).ready(function() {

            $(".qualified-radio input[type='radio']").on("change", function() {

                if ($(this).val() == "Qualified") {

                    $("#qualified").show();

                    $("#Non-Qualified").hide();

                } else {

                    $("#Non-Qualified").show();

                    $("#qualified").hide();

                }

            });

            $(".sales-view-tab-navi li a").on("click", function(event) {

                event.preventDefault();

                var hashidn = $(this).attr('href');

                $(".sales-view-tab-navi li a").removeClass("active");

                $(".sales-view-tab-container").hide();

                $(this).addClass("active");

                $(hashidn + ".sales-view-tab-container").show();

            });

        });

    </script> 



<script src="{{URL::asset('/theme/datatables.net/js/jquery.dataTables.min.js')}}"></script>



<script src="{{URL::asset('/theme/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>



<!-- <script src="{{URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script> -->



<script>



  $(function () {



    $('#example1').DataTable()



    $('#example2').DataTable({



      'paging'      : true,



      'lengthChange': false,



      'searching'   : true,



      'ordering'    : true,



      'info'        : true,



      'autoWidth'   : false



    })



  })



</script>



@endsection

@endsection