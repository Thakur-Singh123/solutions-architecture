@extends('admin.layouts.master')
@section('content')
<style>
   .arctles {
   display: flex;
   justify-content: space-between; 
   align-items: center; 
   width: 100%;
   padding: 10px 0;
   }
   .arctles h3 {
   margin: 0;
   text-align: left;
   font-size: 17px;
   font-weight: revert;
   }
   .back-button {
   display: inline-block;
   background-color: #007bff;
   color: #fff;
   padding: 8px 15px;
   border-radius: 8px;
   font-size: 12px;
   }
   .back-button:hover {
   background-color:rgb(104, 199, 135); 
   }
   .text-center {
   color: red;
   font-weight: normal;
   }
</style>
<div class="content-wrapper">
   <section class="content">
      <div class="container-fluid">
         <div class="arctles">
            <h3>Blog Details:-</h3>
            <a href="{{ url('admin/all-blogs-list') }}" class="back-button">Back to Articles List</a>
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
         <!--end responses-->
         <div class="row">
            <div class="col-md-12">
               <div class="card">
                  <div class="card-body">
                     <table class="table table-bordered">
                        <!--check if blog exists or not-->
                        @if (count($single_blog) >= 1)
                        <!--get blog detail-->
                        @foreach ($single_blog as $blog)
                        <tr>
                           <th>Blog Name:</th>
                           <td>{{ $blog['title'] }}</td>
                        </tr>
                        <tr>
                           <th>Slug:</th>
                           <td>{{ $blog['slug'] }}</td>
                        </tr>
                        <tr>
                           <th>Description:</th>
                           <td>{{ $blog['desc'] }}</td>
                        </tr>
                        <tr>
                           <th>Categories:</th>
                           <td>
                              <!--check if blog exists or not-->
                              @if (isset($blog['category_details']))
                                 <!--get categories-->
                                 @foreach (($blog['category_details']) as $category)
                                    {{ $category->name }} @if (!$loop->last), @endif
                                 @endforeach
                              @endif
                           </td>
                        </tr>
                        <tr>
                           <th>Created Date:</th>
                           <td>{{ \Carbon\Carbon::parse($blog['date'])->format('j M Y') }}</td>
                        </tr>
                        <tr>
                           <th>Image:</th>
                           <td>
                              @if ($blog['image'])
                              <img src="{{ asset('public/uploads/blogs/' . $blog['image']) }}" style="max-width: 150px; height: auto; border: 1px solid #ddd; padding: 5px;">
                              @else
                              No Image
                              @endif
                           </td>
                        </tr>
                        <tr>
                           <th>Status:</th>
                           <td>
                              @if ($blog['status'] == 'Active')
                              <span class="badge badge-success">Active</span>
                              @elseif ($blog['status'] == 'Pending')
                              <span class="badge badge-danger">Pending</span>
                              @elseif ($blog['status'] == 'Suspend')
                              <span class="badge badge-warning">Suspend</span>
                              @elseif($blog['status'] == 'Approved')
                              <span class="badge badge-info">Approved</span>
                              @else
                              <span class="badge badge-secondary">Unknown</span>
                              @endif
                           </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                           <td colspan="10" class="text-center">No articles are available on our db for this slug.</td>
                        </tr>
                        @endif
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection