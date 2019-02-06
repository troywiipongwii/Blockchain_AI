@extends('admin.layout.app')

@php

Session::forget('cart');
Session::forget('cart1');

@endphp

@section('content')

        <div class="center-wrapper">

            <div class="center-inner">

                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> Submit</h2>

                <!--  switch-tab end -->

                <div class="form-wrapper">

                    <!-- tabs _ 1-->

                    <!-- tabs _ 2-->

                    <div class="row tabs-container" id="tab_3" style="display:block">

                        <div id="dropzone">

                            <form action="{{route('admin.submit_salematerial')}}" class="dropzone needsclick" id="uploadfiles" method="post">

                                {{csrf_field()}}

                                <div class="dz-message needsclick">

                                    <span class="uploadn"><i class="fa fa-cloud-upload"></i> Upload Document</span> <br><br>Drag and drop the files here Or <span class="nmbrs">Browse from computer</span><br />

                                    <span class="note needsclick">Maximum files size is 150MB</span>

                                </div>

                                <input type="hidden" name="id" id="id" value="">

                                <input type="hidden" name="lastid"  value="{{Request::segment('3')}}">

                        </div>

                        <div class="clearfix"></div>

                        <div class="btn-wrap col-sm-12">

                            <a href="javascript:history.go(-1)"><button type="button" class="custom-btn mr15">Cancel</button></a>

                            <button type="submit" onclick="setValue()" class="custom-btn fill">Submit Sales Materials File</button>

                        </div>

                    </div>

                            </form>

                    <!-- tabs _ 3-->

                </div>

                <!--  form-wrapper -->

            </div>

            <!--  center-inner -->

        </div>

        <!--  center-wrapper -->

@section('js')

<script>

    function setValue() {

        document.getElementById('id').value = "1";

    }

</script>

@endsection

@endsection