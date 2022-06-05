<x-app-layout>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('Success'))
              <div class="alert alert-success" style="width: fit-content" role="alert">
                {{session('Success')}}
              </div>
              @endif
            </div>
            <div class="col-md-4">
              {{-- input data --}}
              <div class="coverdiv p-5">
                <form action="{{url('brand/update/'.$brands->id)}}" method="POST" enctype="multipart/form-data">
                  @csrf
                  {{-- hidden fild --}}
                  <input type="hidden" name="old_image" value="{{$brands->brand_image}}">
                  <div class="mb-3">
                    <label for="brand_name" class="form-label">Brand Name</label>
                    <input type="text" name="brand_name" value="{{$brands->brand_name}}" class="form-control" id="brand_name">
                    @error('brand_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="mb-3">
                    <img src="{{asset($brands->brand_image)}}" alt="photo" width="100px">
                  </div>
                  <div class="mb-3">
                    <label for="brand_image" class="form-label">Update Brand Image</label>
                    <input type="file" name="brand_image" class="form-control" id="brand_image" value="{{$brands->brand_image }}">
                    @error('brand_image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                  <button type="submit" class="btn btn-primary">Update Brand</button>
                </form>
              </div>
            </div>
        </div>
    </div>




</x-app-layout>


