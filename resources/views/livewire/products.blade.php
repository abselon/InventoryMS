<div>
    @include ('livewire.productsmodal')
    @include ('livewire.editproductsmodal')
    <div class="container">
        <br>
        <br>
        <br>
        <div class="col-lg-16 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#productsModal">
                    Add Products
                </button>
                <h5 class="card-title fw-semibold mb-4">Products</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">ID</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Category</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Sub-Category</h6>
                          </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Description</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Manufacturer</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Quantity</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Restock Threshold</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Expiry Date</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Wholesale Price</h6>
                        </th>

                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Selling Price</h6>
                        </th>
                        {{-- <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Last Sold Date</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Expiry Date</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Expiry Status</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Restock Threshold</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Discount Type</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Discount</h6>
                        </th> --}}
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Actions</h6>
                        </th>
                      </tr>
                    </thead>
                        <tbody>
                            @if ($products->count() > 0)
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->id }}</h6></td>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->category->name }}</h6></td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">{{ $product->subcategory->name }}</h6>                         
                                        </td>
                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0">{{ $product->name }}</h6>
                                        </td>
                                        <td class="border-bottom-0"><p class="mb-0 fw-normal">{{ $product->description }}</p></td>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->manufacture->name }}</h6></td>

                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->quantity }}</h6></td>
                                        {{-- <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->created_at }}</h6></td> --}}
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->restock_threshold }}</h6></td>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->expiry_date }}</h6></td>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->wholesale_price }}</h6></td>
                                        <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $product->selling_price }}</h6></td>



                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <!-- Additional actions or buttons can be added here -->
                                                <button type="button"  wire:click="editProduct({{$product->id}})" class="btn btn-info btn-sm float-end" data-bs-target="#editproductsModal">
                                                    Edit
                                                </button>
                                                <a href="javascript:void(0)" wire:click.prevent = "deleteConfirmation({{ $product->id }})" class="btn btn-sm btn-danger" style="padding: 1px 8px;">Delete</a>
                                            </div>
                                        </td>
                                    </tr>  
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" style="text-align: center;">No Products found!</td>
                                </tr> 
                            @endif            
                        </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
    </div>
    </div>