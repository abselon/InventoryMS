<?php

namespace App\Http\Livewire;

use App\Models\Manufacturemodel;
use Livewire\Component;
use App\Models\Category;
use App\Models\Productsmodel;
use App\Models\Subcategorymodel;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Products extends Component
{
    use LivewireAlert;

    public $categories, $delete_id;
    public $selectedcategories = null;
    public $selectedsubcategories = null;

    public $selectedmanufacture = null;

    public $subcategories, $manufacture;
    public $name, $description, $quantity; 
    public $products_id;
    protected $listeners = ['deleteConfirmed' => 'deleteProduct'];

    // $categories_id, $subcategories_id;

    protected $rules = [
        'selectedcategories' => 'required|integer',
        'selectedsubcategories' => 'required|integer',
        'selectedmanufacture' => 'required|integer',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'categories' => 'required',
        'quantity' => 'required|integer',
    ];
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'description' => 'required',
            'name' => 'required',
            'quantity' => 'required|integer',
            'selectedcategories' => 'required|exists:categories,id', // ensure the category exists
            'selectedsubcategories' => 'required|exists:subcategories,id', // ensure the subcategory exists
            'selectedmanufacture' => 'required|exists:subcategories,id', // ensure the manufacture exists
        ]);
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->manufacture = Manufacturemodel::all();
        // $this->subcategories = Subcategorymodel::where('categories_id', $this->categories_id)->get();
        // $this->subcategories = Subcategorymodel::all();
    }


    public function render()
    {
        $products = Productsmodel::all();
        return view('livewire.products', ['products'=>$products]);
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

    public function storeProducts()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|integer',
            'selectedcategories' => 'required|exists:categories,id',
            'selectedsubcategories' => 'required|exists:subcategories,id',
            'selectedmanufacture' => 'required|exists:manufacture,id',
        ]);

        $products = new Productsmodel();

        $products->name = $this->name;
        $products->description = $this->description;
        $products->quantity = $this->quantity;
        $products->categories_id = $this->selectedcategories;
        $products->subcategories_id = $this->selectedsubcategories;
        $products->manufacture_id = $this->selectedmanufacture;

        $products->save();

        $this->toast('Added', 'success', 'Product Added');

        $this->name = '';
        $this->description = '';
        $this->quantity = null;
        $this->selectedcategories = '';
        $this->selectedsubcategories = '';
        $this->selectedmanufacture = '';
    }

    public function updatedSelectedcategories($categories_id)
    {
        $this->subcategories = Subcategorymodel::where('categories_id', $categories_id)->get();
    }

    public function deleteConfirmation($id)
    {
        $this->delete_id = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteProduct()
    {
        $product = Productsmodel::where('id', $this->delete_id)->first();
        $product->delete();

        $this->dispatchBrowserEvent('productDeleted');
    }

    public function  editProduct($product_id = null)
    {
        $products = Productsmodel::find($product_id);
        if($products)
        {
            $this->products_id = $products->id;
            $this->name = $products->name;
            $this->description = $products->description;
            $this->dispatchBrowserEvent('show-edit-product-modal');
        }
        // else
        // {
        //     return redirect()->to('/subcategory');
        // }
    }

    public function closeModal()
    {
        $this->description = '';
        $this->name = '';
    }

    public function updateProduct()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        Productsmodel::where('id', $this->products_id)->update(
            [
                'name'=>$validatedData['name'],
                'description' => $validatedData['description'],
            ]
        );

        $this->toast('Updated', 'success', 'Product Updated');


        $this->description = '';
        $this->name = '';

        $this->dispatchBrowserEvent('close-model');
    }  
}
