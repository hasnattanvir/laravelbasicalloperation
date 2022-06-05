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
                <h3>All Brand</h3>
                {{-- success messate --}}
              @if(session('Success'))
              <div class="alert alert-success" style="width: fit-content" role="alert">
                {{session('Success')}}
              </div>
              @endif

              </div>
              <table class="table">
                <thead>  
                  <tr>
                    <th scope="col">SL No</th>
                    <th scope="col">Brand Name</th>
                    <th scope="col">Brand Image</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($brands as $item)
                  <tr>
                    <th scope="row">{{$brands->firstItem()+$loop->index}}</th>
                    <td>{{$item->brand_name}}</td>
                    <td>
                      <img src="{{asset($item->brand_image)}}" alt="Photo" style="width:100px; max-width:100%; ">
                    </td>
                   
                    <td>
                      @if($item->created_at == NULL)
                      <span class="text-danger">No Date Set</span>
                      @else
                      {{Carbon\Carbon::parse($item->created_at)->diffForHumans()}}
                      @endif
                    </td>
                    <td>
                      <a href="{{url('/brand/edit/'.$item->id)}}" class="btn btn-info">Edit</a>
                      {{-- soft delete  --}}
                      <a href="{{url('/brand/delete/'.$item->id)}}" onclick="return confirm('Are You Sure to delete')" class="btn btn-danger">Delete</a>
                    </td>
                    
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{ $brands->links() }}
            </div>
            <div class="col-md-4">
              {{-- input data --}}

              <div class="coverdiv p-5">
                <form action="{{route('store.brand')}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="mb-3">
                    <label for="brand_name" class="form-label">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control" id="brand_name">

                    @error('brand_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                  </div>

                  <div class="mb-3">
                    <label for="brand_image" class="form-label">Brand Image</label>
                    <input type="file" name="brand_image" class="form-control" id="brand_image">

                    @error('brand_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                  </div>
                  <button type="submit" class="btn btn-primary">Add Brand</button>
                </form>
              </div>

            </div>
        </div>
    </div>




</x-app-layout>


