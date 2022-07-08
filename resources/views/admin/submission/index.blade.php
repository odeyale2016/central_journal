<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Add New Submission') }}
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
<strong>Add New Submission</strong> </div>
                      <div class="card-body">
                      <form method="POST" action="{{ route('store.submission') }}">
                        @csrf
                        <div class="col-md-6">
                          <label for="title" class="form-label">Title</label>
                          <input type="text" class="form-control" id="title" name="title">
                        </div>
                        <div class="col-md-6">
                          <label for="author" class="form-label">Author</label>
                          <input type="text" class="form-control" id="author" name="author" >
                        </div>
                        <div class="col-6">
                          <label for="pages" class="form-label">Pages</label>
                          <input type="text" class="form-control" id="pages" name="pages" >
                        </div>
                        <div class="col-6">
                        <div class="mb-3">
                          <label for="abstract" class="form-label">Abstract</label>
                          <textarea class="form-control" id="abstract" rows="5" name="abstract"></textarea>
                        </div>
                      </div>
                        <div class="col-6">
                          <label for="keywords" class="form-label">Keywords</label>
                          <input type="text" class="form-control" id="keywords" name="keywords" >
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
                        <label for="issue" class="form-label">Issue</label>
                      <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="issue">
                        <option selected>Select Issue</option>
                        @foreach ($issues as $issue)
                        <option value="{{ $issue->id }}">{{ $issue->title }}</option>
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
                    <h2> List of Submissions</h2>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Journal</th>
                            <th scope="col">Issue</th>
                            <th scope="col">Pages</th>
                            <th scope="col">Author</th>
                            <th scope="col">Abstract</th>
                            <th scope="col">Keywords</th>
                            <th scope="col">Date Published</th>
                            <th scope="col">Date Created</th>
                           <th>Action</th>
                           <th></th>                 
                          </tr>
                        </thead>
                        <tbody>
                          @php ($k = 1 )
                  
                          @foreach($submissions as $submission)
                          <tr>
                            <th scope="row">{{ $k++ }}</th>
                            <td> {{ $submission->title}}</td>
                            <td>{{ $submission->cat->cat_name}}</td>
                            <td>{{ $submission->iss->title}}</td>
                            <td>{{ $submission->pages}}</td>
                            <td>{{ $submission->author}}</td>
                            <td>{{ $submission->abstract}}</td>
                            <td>{{ $submission->keywords}}</td>
                            <td>{{ $submission->created_at->diffForHumans()}}</td>
                            <td><a href="{{url('submission/edit/'.$submission->id)}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#000046; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Edit</span></a> </td>
                            <td> <a href="{{url('softdelete/submission/'.$submission->id)}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#990000; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Del</span></a>

                          </tr>
                          
                             
                         
                          @endforeach
                        </tbody>
                      </table>
                      {{$submissions->links()}}
                  </div>
                  </div>
              
        </div>
    </div>
</div>
</x-app-layout>
