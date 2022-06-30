<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Issues') }}
        </h2>
         
    </x-slot>
    
    

    <!--- Next Row -->
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="container">
                <div class="row">
                    
        
                    <div class="card-body">
                      <table class="table">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">issue Name</th>
                              <th scope="col">UserName</th>
                              <th scope="col">ISSN</th>
                              <th scope="col">Description</th>
                              <th scope="col">Date</th>
                               
                             <th>Action</th>
                                                
                            </tr>
                          </thead>
                          <tbody>
                            @php ($k = 1 )
                    
                            @foreach($issues as $issue)
                            <tr>
                              <th scope="row">{{ $k++ }}</th>
                              <td> {{ $issue->cat_name}}</td>
                              <td>{{ $issue->user_id}}</td>
                              <td>{{ $issue->issn}}</td>
                              <td>{{ $issue->description}}</td>
                              <td>{{ $issue->created_at->diffForHumans()}}</td>
                              <td><a href=""><span class="alert alert-primary" style="padding-top:5px; padding-bottom:5px; background-color:#000046; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">Edit</span></a>
             
                                <div style="height:25px;"></div>
                              <form class="form-group pull-right" method="post" action="/admin/issues/{{$issue->id}}">
                                 {{csrf_field()}}
                                 <input type="hidden" name="_method" value="DELETE">
                             <input type="submit" value="Delete" class="btn btn-danger" style="padding-top:5px; padding-bottom:5px; background-color:#990000; border-bottom:thick solid #000022; border-radius:2px;color:#fff;">
                                 </form> 
                                 </td>

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
