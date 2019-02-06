@extends('admin.layout.app')

@section('content') 

        <div class="center-wrapper">

            <div class="center-inner">

                <h2 class="heading withicon">

                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                            <path d="M0 0h24v24H0z" fill="none"/>

                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>

                        </svg> Sales Documents 

                        <a href="{{route('admin.add_salefolder')}}"><button type="button" class="btn custom-btn pull-right fill editsale">Add New Folder</button>

                        </a>

                        <a href="{{route('admin.admin_sales_material')}}"><button type="button" class="btn custom-btn pull-right editsale" style="margin-right: 10px;">Upload Files</button></a></h2>

                <!--  switch-tab end -->

                <ul class="materials-forms-list clearfix">

                    <li>

                        <a href="#meterialsall" class="active">All <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

                            <path d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"/>

                            <path d="M0 0h24v24H0z" fill="none"/>

                        </svg>

                        </a>

                    </li>



                    @foreach($folders as $folder)

                    <li>

                        <a href="#{{$folder->id}}">{{ucfirst($folder->name)}} <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

                                <path d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"/>

                                <path d="M0 0h24v24H0z" fill="none"/>

                            </svg>

                            </a>

                    </li>

                    @endforeach



                </ul>

                <div class="row sales-view-details">

                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <div id="meterialsall" class="meterial-forms-tab-wrap clearfix" style="display:block;">

                            <ul class="sale-pdf-list pp-docwrap no-mrg">

                                @foreach($data as $d)

                                <li>

                                    <a href="{{url('admin/download/'.$d->file)}}" class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn"> 

                                            <path d="M5 4v2h14V4H5zm0 10h4v6h6v-6h4l-7-7-7 7z"/>

                                            <path d="M0 0h24v24H0z" fill="none"/>

                                        </svg>

                                         Download</a>

                                        <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#adminsalefiledelete{{$d->id}}" class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn normal">

                                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>

                                                    <path d="M0 0h24v24H0z" fill="none"/>

                                                </svg>                                       

                                                 Delete</a>

                                    <a href="{{url('file/'.$d->file)}}" target="_blank" class="pdfvew"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                                            <path d="M0 0h24v24H0z" fill="none"/>

                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>

                                        </svg> View</a>





<!-- for delete bank detail -->

<div class="modal fade modal-center bd-example-modal-lm forgot" id="adminsalefiledelete{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >

    <div class="modal-dialog modal-lm" role="document">

        <div class="modal-content" style="width: 470px;">

            <div class="modal-body" style="padding: 15px 15px 0px;">


                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon" style="top:28% !important;">

                            <path d="M0 0h24v24H0z" fill="none"/>

                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>

                        </svg> Delete File <br>
                        <span style="font-size: 14px;"> {{$d->file}} </span>

                </h2>

                

                 

                 <h6>Are you sure you want to delete this file?</h6>

                       <form class="login_modal forgot_password" action="{{route('admin.sales_material_delete')}}" method="post" enctype="multipart/form-data">

                        {{csrf_field()}}



                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">

                            <input type="hidden" name="saleid" value="{{$d->id}}">

                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">Cancel</button>

                              <button type="submit" class="custom-btn mr15">Delete</button>

                          </div>



                      </form>

            </div>



      <div class="clearfix"></div>
        </div>

    </div>

</div><!--End picture modal -->





                                    <div class="pdf-file">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">

                                                    <path fill="none" d="M0 0h24v24H0z"/>

                                                    <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/>

                                                </svg>

                                        <span class="head">{{$d->file}}</span>

                                        <span class="upcname"><i>Uploaded by:</i> {{$d->username($d->usertype,$d->userid)}}</span>

                                        <span class="upcdate"><i>Date Uploaded:</i> {{

                                            date('n-j-Y, g:ia' , strtotime($d->created_at))}}</span>

                                    </div>

                                </li>

                                @endforeach

                            </ul>

                        </div>



                        @php

                        count($folders);

                        @endphp

                        @foreach($folders as $folder)

                        <div id="{{$folder->id}}" class="meterial-forms-tab-wrap clearfix">

                            <ul class="sale-pdf-list pp-docwrap no-mrg">


                                @foreach($data as $d)

                            @if($d->categoryname == $folder->id)

                                <li>

                                    <a href="{{url('admin/download/'.$d->file)}}" class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn"> 

                                            <path d="M5 4v2h14V4H5zm0 10h4v6h6v-6h4l-7-7-7 7z"/>

                                            <path d="M0 0h24v24H0z" fill="none"/>

                                        </svg>

                                         Download</a>

                                    <a href="{{url('file/'.$d->file)}}" target="_blank" class="pdfvew"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                                            <path d="M0 0h24v24H0z" fill="none"/>

                                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>

                                        </svg> View</a>

                                    <div class="pdf-file">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="pdfico">

                                                    <path fill="none" d="M0 0h24v24H0z"/>

                                                    <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-8.5 7.5c0 .83-.67 1.5-1.5 1.5H9v2H7.5V7H10c.83 0 1.5.67 1.5 1.5v1zm5 2c0 .83-.67 1.5-1.5 1.5h-2.5V7H15c.83 0 1.5.67 1.5 1.5v3zm4-3H19v1h1.5V11H19v2h-1.5V7h3v1.5zM9 9.5h1v-1H9v1zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm10 5.5h1v-3h-1v3z"/>

                                                </svg>

                                        <span class="head">{{$d->file}}</span>

                                        <span class="upcname"><i>Uploaded by:</i> {{ucfirst($d->username($d->usertype,$d->userid))}}</span>

                                        <span class="upcdate"><i>Date Uploaded:</i> {{

                                            date('n-j-Y, g:i:a' , strtotime($d->created_at))}}</span>

                                    </div>

                                </li>

                            @endif

                            @endforeach

                            

                            </ul>

                        </div>

                        @endforeach

                        

                        

                            </ul>

                        </div> 

                    </div>

                </div>

            </div>

            <!--  center-inner -->

        </div>

        <!--  center-wrapper -->

@section('js')

 <script>

        $(document).ready(function() {

            $(".materials-forms-list li a").on("click", function(event) {

                event.preventDefault();

                var hashidn = $(this).attr('href');

                $(".materials-forms-list li a").removeClass("active");

                $(".meterial-forms-tab-wrap").hide();

                $(this).addClass("active");

                $(hashidn + ".meterial-forms-tab-wrap").show();

            });

        });

    </script>

@endsection

@endsection