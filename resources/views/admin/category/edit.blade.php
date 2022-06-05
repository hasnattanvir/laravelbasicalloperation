<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between">
          <p>Edit Category<b> </b></p>
          <p style="background-color: green; color:#fff; padding:4px; border-radius:3px;"></p>
        </div>
    </x-slot>


    <div class="container">
        <div class="row">
            <div class="col-md-4">
              <div class="coverdiv p-5">
                <form action="{{url('category/update/'.$category->id)}}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="category" class="form-label">Update Category Name</label>
                    <input type="text" name="category_name" class="form-control" id="category" value="{{$category->category_name}}">

                    @error('category_name')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                    
                  </div>
                  <button type="submit" class="btn btn-primary">Update Category</button>
                </form>
              </div>

            </div>
        </div>
    </div>
</x-app-layout>


