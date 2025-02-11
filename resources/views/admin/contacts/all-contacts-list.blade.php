@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h2 class="mb-3">All Contacts List</h2>
            </div>
            <!--start responses-->
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
            <!--start responses-->
         </div>
         <div class="row">
            <div class="col-12">
               <div class="card">
                  <div class="card-body">
                     <!--start table-->
                     <table class="table table-head-fixed text-nowrap" id="slider_id">
                        <thead>
                           <tr>
                              <th>Sr. No</th>
                              <th>Email</th>
                              <th>Message</th>
                              <th>Created Date</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($all_contacts) >= 1)
                           @php $count = 1; @endphp
                           @foreach($all_contacts as $contact)
                           <tr>
                              <td>{{ $count }}.</td>
                              <td>{{ $contact->email }}</td>
                              <td>{{ $contact->message }}</td>
                              <td>{{ \Carbon\Carbon::parse($contact->created_at)->format('j M Y') }}</td>
                              <td class="project-actions text-left">
                                <!--<a class="btn btn-info btn-sm" href="{{ url('admin/edit-contact',$contact->id) }}"><i class="fas fa-pencil-alt"></i>Edit</a> -->
                                 <a class="btn btn-danger btn-sm delete_contacty_record" data-contact_id="{{ $contact->id }}"><i class="fas fa-trash" aria-hidden="true"></i>Delete</a>
                              </td>
                           </tr>
                           @php $count++; @endphp
                           @endforeach
                           @endif
                        </tbody>
                     </table>
                     <!--end table-->
                  </div>
               </div>
            </div>
         </div>
      </div>
</div>
</section>
</div>
@endsection