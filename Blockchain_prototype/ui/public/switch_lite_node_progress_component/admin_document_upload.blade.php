@extends('admin.layout.app')

@php

Session::forget('cart');
Session::forget('cart1');

@endphp

@section('content')

        <div class="center-wrapper">

            <div class="center-inner">

                <h2 class="heading withicon"><img class="icon" src="{{URL::asset('theme/assets/images/briefcase.svg')}}" alt=""> Upload Files </h2>

                <!--  switch-tab end -->

                <div class="form-wrapper">

                    <!-- tabs _ 1-->

                    <!-- tabs _ 2-->

                    <div class="row tabs-container" id="tab_3" style="display:block">

                        <span class="heads" style="margin:15px;font-size: 16px;font-weight: bold;" >Choose Folder</span>

                        <div class="changesale-status-select" style="width:50%; margin:15px;">

                            <select name="categoryvalue" class="selectpicker" id="categoryvalue" >

                                    @foreach($folders as $folder)

                                    <option value="{{$folder->id}}"> {{ucfirst($folder->name)}} </option>

                                    @endforeach

                                </select>

                        </div>



                        <div id="dropzone">

                            <form action="{{route('admin.admin_submit_salematerial')}}" class="dropzone needsclick" id="uploadfiles" method="post">

                                {{csrf_field()}}



                                <input type="hidden" name="categoryname" id="categoryname">

                                <div class="dz-message needsclick">

                                    <span class="uploadn"><i class="fa fa-cloud-upload"></i> Upload Document</span> <br><br>Drag and drop the files here Or <span class="nmbrs">Browse from computer</span><br />

                                    <span class="note needsclick">Maximum files size is 150MB</span>

                                </div>

                        </div>



                            <input type="hidden" name="id" id="id" value="">

                                    <div class="clearfix"></div>

                                    <div class="btn-wrap col-sm-12">

                                        <a href="javascript:history.go(-1)"><button type="button" class="custom-btn mr15">Cancel</button></a>

                                        <button type="submit" onclick="setValue()" class="custom-btn fill">Upload Files</button>

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

$("#categoryvalue").change(function() {

            var categoryvalue= document.getElementById("categoryvalue").value

            document.getElementById("categoryname").value  = categoryvalue;

        });



</script>



<script>

    function setValue() {

        var categoryvalue= document.getElementById("categoryvalue").value;

        document.getElementById("categoryname").value  = categoryvalue;

        document.getElementById('id').value = "1";

    }

</script>
<script>
  Dropzone.options.myAwesomeDropzone = {
    maxFilesize: 500,
    init: function() {
      this.on("uploadprogress", function(file, progress) {
        console.log("File progress", progress);
      });
    }
  }
</script>



@endsection

@endsection