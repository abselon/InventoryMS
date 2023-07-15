<?php

namespace App\Http\Livewire;

use App\Models\Manufacturemodel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Manufacture extends Component
{
    use LivewireAlert;

    public $delete_id;

    protected $listeners = ['deleteConfirmed' => 'deleteManufacture'];

    protected $rules = [
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'address' => 'required|string',
        'phone' => 'required|string',

        ];
    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteManufacture()
    {
        $manufacture = Manufacturemodel::where('id', $this->delete_id)->first();
        $manufacture->delete();

        $this->dispatchBrowserEvent('manufactureDeleted');
    }
    // public function delete($id)
    // {
    //     $category = Category::where('id', $id)->first();
    //     $category->delete();

    //     $this->toast('Deleted', 'success', 'Category deleted successfully');
    // }
    public function render()
    {
        $manufacturers = Manufacturemodel::all();
        return view('livewire.manufacture', ['manufacturers'=>$manufacturers]);
    }

    public function toast($heading, $type, $text )
    {
        $this->alert($type, $heading, [
            'position' =>  'top-end',
            'timer' =>  '3000',
            'toast' =>  true,
            'text' =>  $text,
        ]);
    }

    public $name, $description, $manufacture_id, $address, $phone;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'description' => 'required',
            'name' => 'required',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);
    }


    public function storeManufacture()
    {
        $this->validate([
            'description' => 'required',
            'name' => 'required',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);


        $manufacture = new Manufacturemodel();


        $manufacture->description = $this->description;
        $manufacture->name = $this->name;
        $manufacture->address = $this->address;
        $manufacture->phone = $this->phone;



        $manufacture->save();


        $this->toast('Added', 'success', 'Manufacturer Added');


        $this->description = '';
        $this->name = '';
        $this->address = '';
        $this->phone = '';

        $this->dispatchBrowserEvent('close-model');
    }

    public function  editManufacture($manufacture_id = null)
    {
        $manufacture = Manufacturemodel::find($manufacture_id);
        if($manufacture)
        {
            $this->manufacture_id = $manufacture->id;
            $this->name = $manufacture->name;
            $this->description = $manufacture->description;
            $this->address = $manufacture->address;
            $this->phone = $manufacture->phone;

            $this->dispatchBrowserEvent('show-edit-manufacture-modal');

        }
    }

    public function closeModal()
    {
        $this->description = '';
        $this->name = '';
        $this->address = '';
        $this->phone = '';
    }

    public function updateManufacture()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
        ]);
        Manufacturemodel::where('id', $this->manufacture_id)->update(
            [
                'name'=>$validatedData['name'],
                'description' => $validatedData['description'],
                'address' => $validatedData['address'],
                'phone' => $validatedData['phone'],
            ]
        );

        $this->toast('Updated', 'success', 'Manufacturer Updated');


        $this->description = '';
        $this->name = '';
        $this->address = '';
        $this->phone = '';

        $this->dispatchBrowserEvent('close-model');
    }

}
