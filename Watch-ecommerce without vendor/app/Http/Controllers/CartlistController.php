<?php

namespace App\Http\Controllers;



use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\ProductModel;
class CartlistController extends Controller{
    private $productModel;
    public function __construct()
    {
        $this->productModel = new ProductModel();
    }
    public function index(Request $request){
        $cart = $request->session()->get('cart', []);
    return view("cartlist",['cart' => $cart]);
    }
    public function addToCart(Request $request, $proId)
    {
        session_start();
        $cart = $request->session()->get('cart', []);

        // Check if the product is already in the cart
        if (!in_array($proId, $cart)) {
            // If not, add it to the cart
            $cart[] = $proId;

            // Update the session with the modified cart
            $request->session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function viewCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
    $cartDetails = [];

    foreach ($cart as $productId) {
        $product = $this->productModel->findProductById($productId);

        if ($product) {
            $cartDetails[] = [
                'id' => $product->proId,
                'name' => $product->proName,
                'price' => $product->proPrice,
                'picture' => asset('uploads/' . $product->Picture),
                // Add more details as needed
            ];
        }
    }

    $totalPrice = array_sum(array_column($cartDetails, 'price'));

    return view('cartlist', ['cartDetails' => $cartDetails, 'totalPrice' => $totalPrice]);
    }
    // CartController.php

public function removeFromCart(Request $request, $productId)
{
    $cart = $request->session()->get('cart', []);

    // Remove the product from the cart
    $cart = array_diff($cart, [$productId]);

    // Update the session with the modified cart
    $request->session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product removed from cart!');
}

}
?>