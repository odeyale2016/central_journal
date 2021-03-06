<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Journals') }}
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
                      <div class="mb-4 font-medium text-sm text-green-600">
                          {{ __('A new Journal has been created successful.') }}
                      </div>
                       @endif
                      <div class="card-header">
<strong>Add New Journal</strong> </div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('store.category') }}" enctype="multipart/form-data">
                          @csrf
                          <div class="col-md-6">
                            <label for="journalName" class="form-label">Journal Name</label>
                            <input type="text" class="form-control" id="cat_name" name="cat_name">
                          </div>
                          <div class="col-md-6">
                            <label for="issn" class="form-label">ISSN</label>
                            <input type="text" class="form-control" id="issn" name="issn">
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="journal_image" class="form-label">Journal Image</label>
                            <input type="file" class="form-control" id="journal_image" name="journal_image" class="form-control">
                          </div></div>
                          <div class="col-6">
                            <label for="description" class="form-label">Description</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="">
                          </div>
                          <div class="col-6">
                            <label for="status" class="form-label">Status</label>
                          <select class="form-select form-select-lg mb-3" aria-label=".form-select-sm example" name="status">
                            <option selected>Select Status</option>
                            <option >Published</option>
                            <option  >Unpublished</option>
                             
                          </select>
                        </div>    
                           
                          <div class="col-12">
                            <label for="" class="form-label"></label>
                              <button type="submit" class="btn btn-primary">Add New Journal</button>
                            </div>
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
                              <th scope="col">Category  </th>
                              <th scope="col">Cover Image</th>
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
                              <td> <img src="{{ $category->journal_image}}" width="100px" height="40px"></td>
                              <td>{{ $category->user->name}}</td>
                              <td>{{ $category->issn}}</td>
                              <td>{{ $category->description}}</td>
                              <td>{{ $category->status}}</td>
                              <td>{{ $category->created_at->diffForHumans()}}</td>
                             <td><a href="{{url('category/edit/'.$category->id)}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#000046; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Edit</span></a> </td>
                              <td> <a href="{{url('softdelete/category/'.$category->id)}}" onclick="return confirm('Are you sure you want to delete the journal')"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#990000; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Del</span></a>
 
                               
                                 </td>

                            </tr>
                            
                               
                           
                            @endforeach
                          </tbody>
                        </table>
                        {{$categories->links()}}
                    </div>
                    </div>
                
          </div>
      </div>
  </div>



  <!-- Trash Part -->
  <!--- Next Row -->
  
</x-app-layout>
