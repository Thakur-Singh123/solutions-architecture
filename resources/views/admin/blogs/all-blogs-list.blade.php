@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-6">
               <h2 class="mb-3">All Articles List</h2>
            </div>
            <!--start responses-->
            @if (Session::has('success'))
            <div class="notifaction-green">
               <p>{{ Session::get('success') }}</p>
            </div>
            @endif
            @if (Session::has('unsuccess'))
            <div class="notifaction-red">
               <p>{{ Session::get('unsuccess') }}</p>
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
                              <th>Title</th>
                              <th>Description</th>
                              <th>Categories</th>
                              <th>Created Date</th>
                              <th>Image</th>
                              <th>Status</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           @if(count($all_blogs) >= 1)
                           @php $count = 1; @endphp
                           @foreach ($all_blogs as $blog)
                           <tr>
                              <td>{{ $count++ }}.</td>
                              <td>{{ $blog['title'] }}</td>
                              <td class="display_code"><p>{{ $blog['desc'] }}</p></td>
                              <td>
                                 <!--Check if categories exists or not-->
                                 @if (isset($blog['category_details']))
                                   <!--Get categories--> 
                                    @foreach ($blog['category_details'] as $category)   
                                       {{ $category->name }} @if (!$loop->last), @endif
                                    @endforeach
                                 @endif
                              </td>
                              <td>{{ \Carbon\Carbon::parse($blog['date'])->format('j M Y') }}</td>
                              <td>
                                 @if ($blog['image']) 
                                    <img src="{{ asset('public/uploads/blogs/' . $blog['image']) }}" style="max-width: 80px; height: auto; border: 1px solid #ddd; padding: 2px;">
                                 @endif
                              </td>
                              @if ($blog['status'] == 'Active')
                              <td class="lights-green-color"><span>Active</span></td>
                                 @elseif ($blog['status'] == 'Pending')
                              <td class="lights-red-color"><span>Pending</span></td>
                                 @elseif ($blog['status'] == 'Suspend')
                              <td class="lights-yellow-color"><span>Suspend</span></td>
                                 @elseif ($blog['status'] == 'Approved')
                              <td class="lights-pink-color"><span>Approved</span></td>
                              @else
                              <td></td>
                              @endif
                              <td class="project-actions text-left">
                                 <a class="btn btn-info btn-sm" href="{{ url('admin/edit-article', $blog['id']) }}"><i class="fas fa-pencil-alt"></i></a>
                                 <a class="btn btn-danger btn-sm delete_blog_record" data-blog_id="{{ $blog['id'] }}"><i class="fas fa-trash" aria-hidden="true"></i></a>
                              </td>
                           </tr>
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
   </section>
</div>
@endsection