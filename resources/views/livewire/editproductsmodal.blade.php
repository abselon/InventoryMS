<div>

    <!-- Modal -->
    <div wire.ignore.self class="modal fade" id="editproductsModal" tabindex="-1" aria-labelledby="editproductsModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Product</h1>
            <button wire:click = "closeModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form wire:submit.prevent="editProduct">
          <div class="modal-body">
            <div class="mb-3">
                <label for="">Name</label>
                <input type="text" wire:model.defer="name" class="form-control">
                @error('name')
                  <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="">Description</label>
                <input type="text" wire:model.defer = "description" class="form-control">
                @error('description')
                    <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
              <label for="">Wholesale Price</label>
              <input type="text" wire:model.defer = "wholesale_price" class="form-control">
              @error('wholesale_price')
                  <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
              @enderror
          </div>

          <div class="mb-3">
            <label for="">Selling Price</label>
            <input type="text" wire:model.defer = "selling_price" class="form-control">
            @error('selling_price')
                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
            @enderror
        </div>
            
          </div>
          <div class="modal-footer">
            <button wire:click = "closeModal" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button wire:click = "updateProduct" type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
        </div>
      </div>
    </div>

  </div>