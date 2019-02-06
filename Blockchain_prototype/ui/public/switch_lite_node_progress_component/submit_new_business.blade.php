@extends('agent.layout.app')

@section('css')

  <link rel="stylesheet" href="{{URL::asset('/dist/datepicker.css')}}">

@endsection

@section('content')

<div class="center-wrapper">

            <div class="center-inner">

                <h2 class="heading withicon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="icon">

                    <path fill="none" d="M0 0h24v24H0zm10 5h4v2h-4zm0 0h4v2h-4z"/>

                    <path d="M10 16v-1H3.01L3 19c0 1.11.89 2 2 2h14c1.11 0 2-.89 2-2v-4h-7v1h-4zm10-9h-4.01V5l-2-2h-4l-2 2v2H4c-1.1 0-2 .9-2 2v3c0 1.11.89 2 2 2h6v-2h4v2h6c1.1 0 2-.9 2-2V9c0-1.1-.9-2-2-2zm-6 0h-4V5h4v2z"/>

                </svg> Submit New Sales </h2>

                <ul class="switch-tab clearfix">

                    <li>

                        <a href="javascript:void(0)" data-target="tab_1" class="active"><span>1</span>  Add New Client  </a>

                    </li>

                    <li>

                        <a href="javascript:void(0)" data-target="tab_2"><span>2 </span> Sales Information </a>

                    </li>

                    <li>

                        <a href="javascript:void(0)" data-target="tab_3"><span> 3</span> Upload Documents </a>

                    </li>

                </ul>

                <!--  switch-tab end -->

                @php

                $id=rand(100000,999999);

                @endphp

                <div class="form-wrapper">

                    <div class="row tabs-container" id="tab_1" style="display:block">

                        <form action="{{route('agent.business')}}" id="business" method="post">

                            {{csrf_field()}}

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">First Name :</span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text"  name="name" id="name" class="input-class">

                                        <input type="hidden"  name="id" id="id" value={{$id}} class="input-class">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Middle Name :</span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text"  name="middlename" id="middlename" class="input-class">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Last Name :</span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text"  name="lastname" id="lastname" class="input-class">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Suffix :</span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text"  name="suffix" id="suffix" class="input-class">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Social Security Number :</span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="social" id="social" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Phone :</span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="phone" id="phone" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Alternate Phone : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="phone1" id="phone1" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Email : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="email" name="email" id="email" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Alternate Email : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="email1" id="email1" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Date Of Birth : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" class="input-class" name="birthday" id="birthday" data-toggle="datepicker">

                                        <!-- <input type="text" class="input-class input-calendar" placeholder="MM/DD/YYYY" id="datepicker" name="birthday" id="birthday"> -->

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Address 1 : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="address" id="address" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Address 2 : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="address1" id="address1" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">City : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="city" id="city" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">State/Province : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                    <input type="text" name="state" id="state" class="input-class">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Postal Code : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="pincode" id="pincode" class="input-class">

                                        <input type="hidden" name="userid" id="userid" value="{{ucfirst(Auth::guard('agent')->user()->id)}}">

                                        <input type="hidden" name="usertype" id="usertype" value="agent">

                                    </div>

                                </div>

                            </div>



                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">Country : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <input type="text" name="country" id="country" class="input-class">

                                    </div>

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-xs-12 col-sm-3"> <span class="element-name">How does the client wish to receive correspondence? : </span></div>

                                <div class="col-xs-12 col-sm-5">

                                    <div class="input-wrap">

                                        <select name="correspondence" id="correspondence" class="selectpicker">

                                                    <option value="">Select an option</option>

                                                    <option value="1"> Mail </option>

                                                    <option value="2"> Email </option>

                                                    <option value="3"> Both </option>

                                        </select>

                                    </div>

                                    <span id="correspondenceerror" style="color:red;"></span>

                                </div>

                            </div>

                            <div class="clearfix"></div>

                            <div class="btn-wrap col-sm-12">

                                <a href="{{route('agent.sales')}}"><button type="button" class="custom-btn mr15 btn-right-space">Cancel</button></a>

                                <button type="button" class="custom-btn fillgray arrow">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

                                        <path d="M0 0h24v24H0z" fill="none"/>

                                        <path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/>

                                    </svg>                                        

                                </button>

                                <button type="submit" class="custom-btn fill arrow btn-left-space">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">

                                      <path d="M0 0h24v24H0z" fill="none"/>

                                      <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/>

                                    </svg>

                                </button>

                            </div>

                        </form>

                    </div>

                    <!-- tabs _ 3-->

                </div>

                <!--  form-wrapper -->

            </div>

            <!--  center-inner -->

        </div>

        <!--  center-wrapper -->

@section('js')

<script>



             $(document).ready(function(){



$("#phone").on("change", function() {



var valuephone=document.getElementById('phone').value;

console.log(valuephone.length);



if(valuephone.length <= '10') 

{

var phone=$(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{3})/,'$1-$2-$3'));

}

else if(valuephone.length > '10')

{

var phone=$(this).val($(this).val().replace(/(\d{3})\-?(\d{4})\-?(\d{4})/,'$1-$2-$3'));

}



});



$("#phone1").on("change", function() {



var valuephone1=document.getElementById('phone1').value;

console.log(valuephone1.length);



if(valuephone1.length <= '10') 

{

var phone1=$(this).val($(this).val().replace(/(\d{3})\-?(\d{3})\-?(\d{3})/,'$1-$2-$3'));

}

else if(valuephone1.length > '10')

{

var phone1=$(this).val($(this).val().replace(/(\d{3})\-?(\d{4})\-?(\d{4})/,'$1-$2-$3'));

}



});


$("#social").on("change", function() {

var social=document.getElementById('social').value;

var social=$(this).val($(this).val().replace(/(\d{3})\-?(\d{2})\-?(\d{4})/,'$1-$2-$3'));

});


$.validator.addMethod("custom_number", function(value, element) {

    return this.optional(element) || value === "NA" ||

        value.match(/^[0-9,\+-]+$/);

}, "Please enter a valid number");



$('#birthday').keyup(function(){

var birthday=$(this).val($(this).val().replace(/(\d{2})\/?(\d{2})\/?(\d{4})/,'$1/$2/$3'));

});

$.validator.addMethod("custom_birthday", function(value, element) {

    return this.optional(element) || value === "NA" ||

        value.match(/^[0-9,\/]+$/) && value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);

}, "Please enter a valid date of birthday");



$.validator.addMethod("custom_email", function(value, element) {

    return this.optional(element) || value === "NA" ||

    value.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/);

}, "Please enter a valid email address");





$('form').submit(function () {



    // Get the Login Name value and trim it

    if(document.getElementById('correspondence').value == '')

    {

        document.getElementById('correspondenceerror').innerHTML="This is field required";   

        return false;

    }

});

$("#correspondence").on("change", function() {

    if(document.getElementById('correspondence').value != '')

    {

        document.getElementById('correspondenceerror').innerHTML="";

    }

});





                $('#business').validate({



                    rules: {                       



                        

                        name:{

                            minlength : 2,

                            required: true,

                        },

                        lastname:{

                            minlength : 2,

                            required: true,

                        },

                        social:{

                            required: true,  
                            minlength:9,
                            maxlength:11,

                        },

                        phone:

                        {

                            required: true,

                            minlength:9,

                            maxlength:15,

                            custom_number: true  

                        },

                        phone1:

                        {

                           minlength:9,

                              maxlength:15,

                              custom_number: true 

                        },

                        email:{

                        	custom_email:true,

                            email:true,  

                        },

                        email1:{

                        	custom_email:true,

                            email:true,  

                        },

                        birthday:{

                            custom_birthday:true,

                            required: true,

                        },

                        address:{

                            required: true,  

                        },

                        city:{

                            required: true,  

                        },

                        pincode:{

                            required: true,  

                        },

                        state:{

                            required: true,  

                        },

                        country:{

                            required: true,  

                        },

                        correspondence:{

                          required: true,  

                      },



                    }



                });

                });





        </script>

<script src="{{URL::asset('/dist/datepicker.js')}}"></script>

  <script>

    $(function() {

      $('[data-toggle="datepicker"]').datepicker({

        autoHide: true,

        zIndex: 2048,

      });

    });

  </script>

@endsection

@endsection