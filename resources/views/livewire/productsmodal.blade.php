
<div>
    <!-- Modal -->
 <div wire:ignore.self class="modal fade" id="productsModal" tabindex="-1" aria-labelledby="productsModalLabel" aria-hidden="true">
     <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent = "storeProducts">
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
               <input type="text" wire:model.defer="description" class="form-control">
               @error('description')
                   <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
               @enderror
           </div>

           <div class="mb-3">
            <label for="">Manufacturer</label>
            <select wire:model="selectedmanufacture" id="selectedmanufacture" class="form-control">
                <option value="">Select Manufacturer</option>
                @foreach($manufacture as $mn)
                    <option value="{{ $mn->id }}">{{ $mn->name }}</option>
                @endforeach
            </select>
               @error('selectedmanufacture')
                   <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
               @enderror
           </div>

           
        <div class="mb-3">
            <label for="">Quantity</label>
            <input type="text" wire:model.defer="quantity" class="form-control">
            @error('quantity')
                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Restock Threshold</label>
            <input type="text" wire:model.defer="restock_threshold" class="form-control">
            @error('restock_threshold')
                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Expiry Date</label>
            <input type="date" wire:model.defer="expiry_date" class="form-control">
            @error('expiry_date')
                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Wholesale Price</label>
            <input type="text" wire:model.defer="wholesale_price" class="form-control">
            @error('wholesale_price')
                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Selling Price</label>
            <input type="text" wire:model.defer="selling_price" class="form-control">
            @error('selling_price')
                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
            @enderror
        </div>

           <div class="mb-3">
            <label for="category">Category</label>
            <select wire:model="selectedcategories" id="selectedcategories" class="form-control">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
               @error('selectedcategories')
                   <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
               @enderror
           </div>

           @if(!is_null($subcategories))
           <div class="mb-3">
            <label for="subcategory">Subcategory</label>
            <select wire:model="selectedsubcategories" id="subcategories" class="form-control">
                <option value="">Select Subcategory</option>
                @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                @endforeach
            </select>            
            @error('selectedsubcategories')
                <span class="text-danger" style="font-size: 12.5px;">{{ $message }}</span>
            @enderror
        </div>

         </div>
         @endif
         <div class="modal-footer">
           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Save changes</button>
         </div>
         </form>
       </div>
     </div>
   </div>  
 </div>