<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Issues') }}
        </h2>
         
    </x-slot>
    
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="container">
                <div class="row">
                    <div class="card">
                      @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
           </ul>
         </div>
          @endif
          @if (session('success'))
          <div class="alert alert-success  alert-dismissible fadeIn show" role="alert">
             <strong> {{ session('success')  }}</strong>
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
             </button>
          </div>
           @endif
                      <div class="card-header">
<strong>Add New Issue</strong> </div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('store.issue') }}">
                          @csrf
                          <div class="col-md-6">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                          </div>
                          <div class="col-md-6">
                            <label for="volume" class="form-label">Volume</label>
                            <input type="text" class="form-control" id="volume" name="volume" placeholder="e.g 1">
                          </div>
                          <div class="col-6">
                            <label for="number" class="form-label">Number</label>
                            <input type="text" class="form-control" id="number" name="number" placeholder="e.g 2">
                          </div>
                          <div class="col-6">
                            <label for="year" class="form-label">Year</label>
                            <input type="text" class="form-control" id="year" name="year" placeholder="e.g 2007">
                          </div>
                          <div class="col-6">
                            <label for="date" class="form-label">Date Published</label>
                            <input type="date" class="form-control" id="date" name="startDate" placeholder="">
                          </div>
                          <div class="col-6">
                            <label for="journal" class="form-label">Journal</label>
                          <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="journal">
                            <option selected>Select Journal</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                            @endforeach
                          </select>
                        </div>
                        
                          
                           <div class="col-6">
                            <label for="status" class="form-label">Status</label>
                          <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="status">
                            <option selected>Select Status</option>
                            <option >Published</option>
                            <option  >Unpublished</option>
                             
                          </select>
                        </div>                                         
                         
                          <div class="col-6">
                            <div class="form-check">
                              
                              <button type="submit" class="btn btn-primary">Add New Issue</button>
                            </div>
                          </div>
                          <div class="col-12">
                         
                          </div>
                        </form>
                    </div>
                </div></div>
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
                    
                  
                    <div class="card-body">
                      <h2> List of Issues</h2>
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Title</th>
                              <th scope="col">Journal</th>
                              <th scope="col">Volume</th>
                              <th scope="col">Number</th>
                              <th scope="col">Year</th>
                              <th scope="col">Status</th>
                              <th scope="col">Date Published</th>
                              <th scope="col">Date Created</th>
                             <th>Action</th>
                             <th></th>                 
                            </tr>
                          </thead>
                          <tbody>
                            @php ($k = 1 )
                    
                            @foreach($issues as $issue)
                            <tr>
                              <th scope="row">{{ $k++ }}</th>
                              <td> {{ $issue->title}}</td>
                              <td>{{ $issue->cat->cat_name}}</td>
                              <td>{{ $issue->volume}}</td>
                              <td>{{ $issue->number}}</td>
                              <td>{{ $issue->year}}</td>
                              <td>{{ $issue->status}}</td>
                              <td>{{ $issue->startDate}}</td>
                              <td>{{ $issue->created_at->diffForHumans()}}</td>
                              <td><a href="{{url('issue/edit/'.$issue->id)}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#000046; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Edit</span></a> </td>
                              <td> <a href="{{url('softdelete/issue/'.$issue->id)}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#990000; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Del</span></a>

                            </tr>
                            
                               
                           
                            @endforeach
                          </tbody>
                        </table>
                        {{$issues->links()}}
                    </div>
                    </div>
                
          </div>
      </div>
  </div>
</x-app-layout>
