@extends('admin.layout.app')

@section('content')
<div class="center-wrapper">
            <div class="center-inner">
                <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                    <path d="M0 0h24v24H0z" fill="none"/>
                    <path d="M15 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm-9-2V7H4v3H1v2h3v3h2v-3h3v-2H6zm9 4c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                </svg> Add Folder </h2>
                <!--  switch-tab end -->
                <div class="form-wrapper">
                    <!-- tabs _ 1-->
                    <div class="row tabs-container" id="tab_2" style="display:block">
                <!-- Login form start here -->
                <form role="form" method="POST" action="{{ url('/admin/submit_folder') }}" class="referal">
                    {{csrf_field()}}

                     <div class="form-group">
                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Folder Name :</span></div>
                                <div class="col-xs-12 col-sm-5">
                                    <div class="input-wrap">
                                        <input type="text"  name="name"  id="name" class="input-class">
                    <input type="hidden" name="userid" id="userid" value="{{Auth::guard('admin')->user()->id}}">
                                    </div>
                                </div>
                    </div>
                    <div class="clearfix"></div>
                            <div class="btn-wrap col-sm-3">
                                <button type="button" id="reset-form" class="custom-btn mr15">Clear</button>
                                <button type="submit" class="custom-btn fill">Submit</button>
                            </div>
                </form>
                <!-- Login form end here -->
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                    <hr class="fline">
                                </div>
                                <div class="row sales-view-details">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <label class="headblc">Folder</label>
                                    </div>
                                    @foreach($data as $d)
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
                                        <ul class="sale-pdf-list pp-docwrap no-mrg">
                                            
                                            <li>
                                                <a href="#" data-toggle="modal" data-dismiss= "modal" data-target="#adminsalefiledelete{{$d->id}}" class="pdfdwn"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="dwn normal">
                                                    <path d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z"/>
                                                    <path d="M0 0h24v24H0z" fill="none"/>
                                                </svg>                                       
                                                 Delete</a>
                                                 <!-- for delete bank detail -->
<div class="modal fade modal-center bd-example-modal-lm forgot" id="adminsalefiledelete{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lm" role="document">
        <div class="modal-content" style="width: 470px;">
            <div class="modal-body" style="padding: 15px 15px 0px;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                 </button>
                 <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">
                            <path d="M0 0h24v24H0z" fill="none"/>
                            <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/>
                        </svg> Delete Folder </h2>
                 
                 <h6>Are you sure you want to delete this folder, if you delete this folder then related files are also deleted?</h6>
                       <form class="login_modal forgot_password" action="{{route('admin.salefolder_delete')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                           <div class="btn-wrap col-sm-12" style="justify-content: center;display: flex;float: none!important;">
                            <input type="hidden" name="saleid" value="{{$d->id}}">
                              <button type="button" class="custom-btn mr15" data-dismiss="modal" aria-label="Close">Cancel</button>
                              <button type="submit" class="custom-btn mr15">Delete</button>
                          </div>

                      </form>
            </div>
        </div>
    </div>
</div>
                                                <div class="pdf-file">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z"/>
                                    <path d="M0 0h24v24H0z" fill="none"/>
                                </svg>
                                                    <span class="head">{{$d->name}}</span>
                                                    <span class="upcname"><i>Made by:</i> {{ucfirst($d->username->name)}}</span>
                                                    <span class="upcdate"><i>Uploaded on:</i> {{date('h:i a, m/d/Y',strtotime($d->created_at))}}</span>
                                                </div>
                                                </li>
                                            </ul>
                                                </div>
                                            @endforeach
                                    </div>
                                </div>
        </div>
    </div>
</div>

@section('js')
<script>

             $(document).ready(function(){


                $('.referal').validate({

                    rules: {                       
                        name:{
                            required : true,
                        },
                        lastname:{
                            required : true,
                        },
                        email:{
                            required : true,
                        },
                        password:{
                            required : true,
                        },
                        managerid:{
                            required : true,
                        },


                    }

                });

                $('#reset-form').on('click', function()
    {
        $(".referal").trigger("reset");
    });

                });


        </script>

<script>
    $(document).ready(function() {
        var ran = Math.floor(Math.random() * 10000);
        $('#generate').click(function(){
        document.getElementById("error23").innerHTML="";
        var firstname = document.getElementById("fname").value;
        var fname = firstname.slice(0, 1);
        var lastname = document.getElementById("lname").value;
        var lname = lastname.slice(0, 1);

        if((fname && lname) != '')
        {

                document.getElementById("managerid").value=fname + lname + ran ;
                $('#managerid').focus();
                document.getElementById('managerid').readOnly = false;
                $(this).parent().addClass("active");
        }
        else
        {
            document.getElementById("error23").innerHTML="Please fill in First Name and Last Name." ;
           
        }
         });

    });
</script>

@endsection
@endsection