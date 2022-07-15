<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Journals Galleries') }}
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
                          {{ __('A new Journal gallery has been added successful.') }}
                      </div>
                       @endif
                      <div class="card-header">
<strong>Add New Image Gallery</strong> </div>
                        <div class="card-body">
                        <form method="POST" action="{{ route('addImage.category') }}" enctype="multipart/form-data">
                          @csrf
                           
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="journal_image" class="form-label">Journal Image</label>
                            <input type="file" class="form-control" id="journal_image" name="image[ ]" class="form-control" multiple="">
                          </div></div>
                         
                           
                          <div class="col-12">
                            <label for="" class="form-label"></label>
                              <button type="submit" class="btn btn-primary">Add New Images</button>
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
                  <div class="col-md-8">
        <h1>Journal Galleries</h1>
                    <div class="card-group">
                       
                    
                     
                    
                            @foreach($images as $multimg)
                            <div class="col-md-4 mt-5">

                              <div class="card">
                               <img src="{{asset($multimg->image)}}" alt="">
                              </div></div>
                           
                            @endforeach
                         
                    </div>
                    </div>
                
          </div>
      </div>
  </div>



  <!-- Trash Part -->
  <!--- Next Row -->
  
</x-app-layout>
