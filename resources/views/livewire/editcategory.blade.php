<div>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title" style="float: left;">Edit Category</h5>
                        <a href="/categories" class="btn btn-sm btn-primary" style="float: right;">All Categories</a>
                    </div>
                    <div class="card-body">
                        {{-- @if (session()->has('message'))
                            <div class="alert alert-success text-center">{{ session('message') }}</div>
                        @endif --}}


                        <form wire:submit.prevent="updateCategory">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" wire:model="name" autocomplete="off" />
                                {{-- for validation --}}
                                @error('name')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" wire:model="description" autocomplete="off" />
                                {{-- for validation --}}
                                @error('description')
                                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary btn-sm w-50">Update Category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>