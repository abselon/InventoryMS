<div>

    @include('livewire.addmanufacturemodal')
    @include('livewire.editmanufacturemodal')
    
    <div class="container">
        <br>
        <br>
        <br>
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#manufactureModal">
                    Add Manufacturer
                </button>
                <h5 class="card-title fw-semibold mb-4">Manufacturers</h5>
                <div class="table-responsive">
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">ID</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Name</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Description</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Address</h6>
                        </th>
                        <th class="border-bottom-0">
                          <h6 class="fw-semibold mb-0">Phone Number</h6>
                        </th>
                        <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Actions</h6>
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @if ($manufacturers->count() > 0)
                        @foreach ($manufacturers as $manufacture)
                        <tr>
                            <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $manufacture->id }}</h6></td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{ $manufacture->name }}</h6>                         
                            </td>
                            <td class="border-bottom-0">
                            <p class="mb-0 fw-normal">{{ $manufacture->description }}</p>
                            </td>
                            <td class="border-bottom-0">
                              <p class="mb-0 fw-normal">{{ $manufacture->address }}</p>
                              </td>
                              <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{ $manufacture->phone }}</p>
                                </td>
                            <td class="border-bottom-0">
                            <div class="d-flex align-items-center gap-2">
                                <button type="button" wire:click="editManufacture({{$manufacture->id}})" class="btn btn-info btn-sm float-end" data-bs-target="#editmanufacureModal">
                                    Edit
                                </button>
                                <a href="javascript:void(0)" wire:click.prevent = "deleteConfirmation({{ $manufacture->id }})" class="btn btn-sm btn-danger" style="padding: 1px 8px;">Delete</a>
                            </div>
                        </tr>  
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" style="text-align: center;">No Manufacturers found!</td>
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