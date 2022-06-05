<x-app-layout>
    {{-- <x-slot name="header">
        <div class="d-flex justify-content-between">
          <p>All Category<b> </b></p>
          <p style="background-color: green; color:#fff; padding:4px; border-radius:3px;"></p>
        </div>
    </x-slot> --}}

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
              <div class="Title">
                <h3>All Category</h3>
                {{-- success messate --}}
              @if(session('Success'))
              <div class="alert alert-success" style="width: fit-content" role="alert">
                {{session('Success')}}
              </div>
              @endif

              </div>
              <table class="table">
                {{-- @php($i =1) --}}
               
                <thead>
                  <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">User</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($category as $item)
                  <tr>
                    {{-- <th scope="row">{{$i++}}</th> --}}
                    <th scope="row">{{$category->firstItem()+$loop->index}}</th>

                    <td>{{$item->category_name}}</td>
                    {{-- <th scope="row">{{$item->user_id}}</th> --}}
                    <th scope="row">{{$item->user->name}}</th>
                    {{-- <th scope="row">{{$item->name}}</th> --}}
                   
                    <td>
                      @if($item->created_at == NULL)
                      <span class="text-danger">No Date Set</span>
                      @else
                      {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                      @endif
                    </td>
                    <td>
                      <a href="{{url('category/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
                      {{-- soft delete  --}}
                      <a href="{{url('softdelete/category/'.$item->id)}}" class="btn btn-danger">Delete</a>
                    </td>
                    
                  </tr>
                  @endforeach

                </tbody>
              </table>
              {{ $category->links() }}
            </div>
            <div class="col-md-4">
              

              <div class="coverdiv p-5">
                <form action="{{route('store.category')}}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="category" class="form-label">Category Name</label>
                    <input type="text" name="category_name" class="form-control" id="category">

                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                  </div>
                  <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
              </div>

            </div>
        </div>
    </div>

    <div class="container mt-5 pt-5">
      <div class="row">
          <div class="col-md-8">
            <h6>Trash List</h6>
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">SL No</th>
                  <th scope="col">Category Name</th>
                  <th scope="col">User</th>
                  <th scope="col">Create Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($trachCat as $item)
                <tr>
                  {{-- <th scope="row">{{$i++}}</th> --}}
                  <th scope="row">{{$category->firstItem()+$loop->index}}</th>

                  <td>{{$item->category_name}}</td>
                  {{-- <th scope="row">{{$item->user_id}}</th> --}}
                  <th scope="row">{{$item->user->name}}</th>
                  {{-- <th scope="row">{{$item->name}}</th> --}}
                 
                  <td>
                    @if($item->created_at == NULL)
                    <span class="text-danger">No Date Set</span>
                    @else
                    {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                    @endif
                  </td>
                  <td>
                    {{-- hard delete  --}}
                    <a href="{{url('category/restore/'.$item->id)}}" class="btn btn-primary">Restore</a>
                    <a href="{{url('remove/category/'.$item->id)}}" class="btn btn-danger">Remove</a>
                  </td>
                </tr>
                @endforeach

              </tbody>
            </table>
            {{ $trachCat->links() }}
          </div>
          
      </div>
  </div>


</x-app-layout>


