<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
         
    </x-slot>
    <div class="d-flex">
      <div class="p-2 bg-info flex-fill" align="center">  <strong>Total Journals Uploaded:</strong> <span class="badge bg-danger">  {{ $categories->count() }} </span></div>
      <div class="p-2 bg-warning flex-fill" align="center">  <strong>Total Issues Uploaded:</strong> <span class="badge bg-dark">  {{ $issues->count() }}  </span></div>
      <div class="p-2 bg-primary flex-fill" align="center"><strong>Total Submissions Uploaded: <span class="badge bg-danger"> {{ $submissions->count() }} </span></div>
    </div>
 
 
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div class="row">
                      <div class="container">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                          <div class="col">
                            
                            <div class="card h-100">
                              <img src="{{asset('assets/images/back3.png')}}" class="card-img-top" alt="Our Journal">
                             
                              <div class="card-body">
                   
                                  <x-jet-nav-link href="{{ route('index.category') }}" :active="request()->routeIs('index.category')">  <h5 class="card-title"> {{ ('Add New Journal') }}
                                  </h5> </x-jet-nav-link>
                                <p class="card-text">Our Academic Journal provides information on the latest emerging trends and developments in these ever-expanding subjects.</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="{{asset('assets/images/back2.png')}}" class="card-img-top" alt="Our Journal">
                              <div class="card-body">
                                <h5 class="card-title"> <x-jet-nav-link href="{{ route('index.issue') }}" :active="request()->routeIs('index.issue')">
                                  {{ ('Add New Issues') }}
                              </x-jet-nav-link></h5>
                                <p class="card-text">Central Journal is a Complete Package for Academic Journal and Article Publisher. It comes with a Management System to help the chief Editor manage the Publications, Articles, Reviewers, Volumes and present the information </p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                          <div class="col">
                            <div class="card h-100">
                              <img src="{{asset('assets/images/back1.png')}}" class="card-img-top" alt="Our Journal">
                              <div class="card-body">
                                <h5 class="card-title"> <x-jet-nav-link href="{{ route('index.submission') }}" :active="request()->routeIs('index.submission')">
                                  {{ ('New Submission') }}
                              </x-jet-nav-link></h5>
                                <p class="card-text">Central Journal is a Complete Package for Academic Journal and Article Publisher. It comes with a Management System to help the chief Editor manage the Publications, Articles, Reviewers, Volumes and present the information .</p>
                              </div>
                              <div class="card-footer">
                                <small class="text-muted">Last updated 3 mins ago</small>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
            </div>
        </div>
    </div>
      <!--- Next Row -->
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
              <div class="container">
                  <div class="row">
                  
                    <div class="card">
                       
                      <div class="card-body"><h2>List of Journals</h2></div> 
                       
                    </div>
                  </div>
                    @if (session('success'))
                    <div class="alert alert-success  alert-dismissible fadeIn show" role="alert">
                       <strong> {{ session('success')  }}</strong>
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                       </button>
                    </div>
                     @endif
                      
                      <div class="card-body">
                         
                      
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">UserName</th>
                                <th scope="col">ISSN</th>
                                <th scope="col">Description</th>
                                <th scope="col">Status</th>
                                <th scope="col">Date</th>
                                 
                               <th>Action</th>
                               <th> </th>                  
                              </tr>
                            </thead>
                            <tbody>
                              @php ($k = 1 )
                      
                              @foreach($categories as $category)
                              <tr>
                                <th scope="row">{{ $k++ }}</th>
                                <td> {{ $category->cat_name}}</td>
                                <td>{{ $category->user->name}}</td>
                                <td>{{ $category->issn}}</td>
                                <td>{{ $category->description}}</td>
                                <td>{{ $category->status}}</td>
                                <td>{{ $category->created_at->diffForHumans()}}</td>
                               <td><a href="{{url('category/edit/'.$category->id)}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#000046; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Edit</span></a> </td>
                                <td> <a href="{{url('softdelete/category/'.$category->id)}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#990000; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Del</span></a>
   
                                 
                                   </td>
  
                              </tr>
                              
                                 
                             
                              @endforeach
                            </tbody>
                          </table>
                          {{$pages->links()}}
                      </div>
                      </div>
                  
            </div>
        </div>
    </div>
  
    <div class="jumbotron text-center" style="margin-bottom:0">
      <p>&copy; Copyright 2022 Central Journal. All Right Reserved </p>
    </div>
</x-app-layout>
