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
                  <h3 class="card-title">Add New Category</h3>
               </div>
               <div class="card-body">
                  <form action="{{ route('admin.submit.category') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required>
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