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
<strong>Add New Journal</strong> - <a href="{{route('index.category')}}"><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#000046; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">View Journals</span></a> </div>
                          <div class="card-body">
                          <form method="POST" action="{{ route('store.category') }}">
                            @csrf
                            <div class="col-md-6">
                              <label for="journalName" class="form-label">Journal Name</label>
                              <input type="text" class="form-control" id="cat_name" name="cat_name">
                            </div>
                            <div class="col-md-6">
                              <label for="issn" class="form-label">ISSN</label>
                              <input type="text" class="form-control" id="issn" name="issn">
                            </div>
                            <div class="col-6">
                              <label for="description" class="form-label">Description</label>
                              <input type="text" class="form-control" id="description" name="description" placeholder="">
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
                    
        
                    <div class="card-body">
                      
                    </div>
                    </div>
                
          </div>
      </div>
  </div>
</x-app-layout>
