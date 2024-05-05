<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Supplier;
use App\Models\User;
use App\Models\Cart;
use App\Models\Receipt;

class ItemController extends Controller
{
    public function addPage(){
        $categories = Category::All();

        return view('Item.add',compact('categories'));
    }

    public function viewPage(){
        $items = Item::all();
        $categories=Category::all();
        $suppliers = Supplier::all();
        // return view('Item.View',compact('items'));
        return view('Item.View')->with('items',$items)->with('category',$categories)->with('suppliers',$suppliers);
    }

    public function store(Request $request){

        $request->validate([
            'product_name' => 'required|min:5|max:80',
            'price'=>'required',
            'stock'=>'required',
            'product_photo'=>'required|file|mimes:jpeg,png,jpg'
        ]);

        
        
        $fileName = $request->name.'-'.$request->origin.'-'.$request->file('product_photo')->getClientOriginalName();
        $request->file('product_photo')->storeAs('/public/product_photo',$fileName);

        Item::create([
            'product_name'=>$request->input('product_name'),
            'category_id'=>$request->input('category'),
            'price'=>$request->input('price'), 
            'stock'=>$request->input('stock'),
            'product_photo'=>$fileName,
        ]);


        return redirect(route('viewPage'));
    }

    public function editPage($id){
        $items = Item::findorFail($id);

        return view('Item.Edit')->with('item',$items);
    }

    public function updateItem($id, Request $request){

        $request->validate([
            'product_name' => 'required|string|min:5|max:80',
            'price'=>'required|integer',
            'stock'=>'required|integer',
            'product_photo'=>'required|file|mimes:jpeg,png,jpg'
        ]);

        // if($product_photo->image){
        //     Storage::delete('/public/product_photo/'.$item->image);
        // }

            $fileName = $request->name.'-'.$request->origin.'-'.$request->file('product_photo')->getClientOriginalName();
            $request->file('product_photo')->storeAs('/public/product_photo',$fileName);

            Item::findorFail($id)->update([
                'product_name'=>$request->product_name,
                'price'=>$request->price,
                'stock'=>$request->stock,
                'product_photo'=>$fileName
            ]);
            return redirect(route('viewPage'));
    }

    public function deleteItem($id){
        Item::destroy($id);

        return redirect(route('viewPage'));
    }

    public function add_supplier_page($id){
        $item = Item::findOrFail($id);
        $suppliers = Supplier::all();

        return view('Item.AddSupplier')->with('item',$item)->with('suppliers',$suppliers);
    }

    public function add_supplier(Request $request, $id){
        $item = Item::with('supplier')->findOrFail($id);
        $item->supplier()->attach($request->supplier);

        return redirect(route('viewPage'));

    }

    public function delete_image($id){
        $item = Item::findOrFail($id);

        if($item->image){
            Storage::delete('/public/product_photo/'.$item->image);
        }
        return redirect(route('viewPage'));
    }

    public function catalogue(){
        $name = session('name');
        $items = Item::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
    
        return view('catalogue')->with('name', $name)->with('items', $items)->with('categories', $categories)->with('suppliers', $suppliers);
    }

    public function add_cart(Request $request,$id){
        if(Auth::id()){
            $user = Auth::user();
            $item=Item::find($id);
            $cart = new Cart;
            $cart->username = $user->name;
            $cart->product_name = $item->product_name;
            $cart->category_id = $item->category_id;
            $cart->quantity = $request->quantity;
            $cart->price = $item->price;
            $cart->save();
            return redirect()->back()->with('success', 'Item added to cart successfully.');
        }

    }

    public function myreceipt(){
        $username = Auth::user()->name;
        $cart = Cart::where('username', $username)->get();
        $items = Item::all();
        $categories = Category::all();
        $suppliers = Supplier::all();

        return view('myreceipt',compact('cart'));
    }

    public function finalize(){
        $username = Auth::user()->name;
        $cart = Cart::where('username', $username)->get();
        $items = Item::all();
        $categories = Category::all();
        $suppliers = Supplier::all();
        $receipt = Receipt::all();
        return view('finalize',compact('receipt','cart'));
    }

    public function finalOrder(Request $request)
{
    if (Auth::check()) {
        $user = Auth::user();
        $username = $user->name;
        $cart = Cart::where('username', $username)->get();

        $total_price = 0;
    

        foreach ($cart as $c) {
            $total_price += $c->price * $c->quantity;
        }
        $receipt = new Receipt;
        $receipt->username = $username;
        $receipt->product_name = $c->product_name;
        $receipt->quantity = $c->quantity;
        $receipt->total_price = $total_price;
        $receipt->address = $request->address;
        $receipt->postal_code = $request->postal_code;

        $receipt->save();

        // Cart::where('username', $username)->delete();

        return redirect(route('finalize'),compact('receipt'));

    }
}


    
    

}
