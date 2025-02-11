@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
            </div>
         </div>
      </div>
   </section>
   <section class="content">
      <div class="row">
         <div class="col-md-12">
            <!--start response-->
            @if (Session::has('success')) 
            <div class="notifaction-green">
               <p>{{ Session::get('success') }}</p>
            </div>
            @endif 
            @if (Session::has('unsuccess')) 
            <div class="notifaction-red">
               <p> {{ Session::get('unsuccess') }}</p>
            </div>
            @endif 
            <!--end response-->
            <div class="card card-secondary add-new-employee">
               <div class="card-header">
                  <h3 class="card-title">Add New Article</h3>
               </div>
               <div class="card-body">
                  <form action="{{ route('admin.submit.article') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Enter title" required>
                     </div>
                     <div class="form-group">
                        <label>Categories</label>
                        <select name="category_name[]" id="category_id" class="form-control select2" multiple="multiple" data-placeholder="Select Categories" required>
                           <option value="">Select Categories</option>
                           <!--Get categories-->
                           @foreach($all_categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                           @endforeach
                        </select>
                     </div>
                     <div class="form-group">
                        <label for="desc">Description</label>
                        <textarea id="description" name="desc" class="form-control" rows="4"></textarea>
                     </div>
                     <div class="form-group">
                        <label>Date</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                           <input type="text" class="form-control datetimepicker-input" name="date" data-target="#reservationdate" value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" />
                           <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="exampleInputFile">Choose File</label>
                        <div class="input-group">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" name="image" id="exampleInputFile" onchange="previewImage(event)">
                              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                           </div>
                           <div class="input-group-append">
                              <span class="input-group-text">Upload</span>
                           </div>
                        </div>
                     </div>
                     <div id="imagePreviewContainer" style="margin-top: 20px;">
                        <img id="imagePreview" src="" alt="Selected Image" style="display: none; max-width: 150px; height: auto; border: 1px solid #ddd; padding: 5px;"/>
                     </div>
                     <br>
                     <div class="form-group">
                        <label>Status</label>
                        <select class="custom-select" name="status">
                           <option value="" disabled selected>Select Status</option>
                           <option value="Active">Active</option>
                           <option value="Pending">Pending</option>
                           <option value="Suspend">Suspend</option>
                           <option value="Approved">Approved</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection