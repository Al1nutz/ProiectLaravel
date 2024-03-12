<?php

namespace App\Http\Controllers;

use App\Models\Bilet; // Update the model reference
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session as StripeSession;
use Stripe\Stripe;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Bilet::with('event') // Update the model reference
        ->where('id_user', auth()->id())
            ->orderByDesc('id_blt')
            ->get();

        $totalAmount = $tickets->where('tip_bilete', '!=', 'purchased')->sum('pret');

        return view('tickets.index', compact('tickets', 'totalAmount'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'id_eve' => 'required|exists:events,id_eve',
            'tip_bilete' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'pret' => 'required|numeric|min:0',
        ]);

        $totalPrice = $request->input('pret');
        $quantity = $request->input('quantity');
        $pricePerTicket = $totalPrice / $quantity;

        // Create tickets based on quantity
        for ($i = 0; $i < $quantity; $i++) {
            Bilet::create([
                'id_eve' => $request->input('id_eve'),
                'tip_bilete' => $request->input('tip_bilete'),
                'id_user' => auth()->id(),
                'pret' => $pricePerTicket,
            ]);
        }

        return redirect()->route('tickets.index')->with('success', 'Tickets purchased successfully!');
    }

    public function destroy(Bilet $bilet) // Update the model reference
    {
        $bilet->delete(); // Update the model reference

        return back()->with('success', 'Ticket deleted successfully!');
    }
    public function createCheckoutSession(Request $request)
    {
        // Set your secret key. Remember to switch to your live secret key in production.
        Stripe::setApiKey(env('STRIPE_SECRET'));

        // Calculate the total amount again or pass it securely from the front end
        $amount = $request->amount; // This should be in the smallest currency unit

        $checkout_session = StripeSession::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Total Bilet Payment',
                    ],
                    'unit_amount' => $amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => url('/success'),
            'cancel_url' => url('/cancel'),
        ]);

        return response()->json(['id' => $checkout_session->id]);
    }

    public function paymentSuccess(Request $request)
    {
        DB::beginTransaction();

        try {
            // Perform your logic here, e.g., update payment status, send email, etc.
            // Update the tickets status to 'purchased'
            Bilet::where('id_user', auth()->id())
                ->where('tip_bilete', '!=', 'purchased')
                ->update(['tip_bilete' => 'purchased']);

            DB::commit();

            return redirect()->route('tickets.index')->with('success', 'Payment successful! Thank you for your purchase.');
        } catch (\Exception $e) {
            DB::rollback();
            // Handle exceptions, perhaps log them and show an error message to the user
            return redirect()->route('tickets.index')->with('error', 'An error occurred during the purchase process.');
        }
    }

    public function paymentCancel()
    {
        return redirect()->route('tickets.index')->with('error', 'Payment was cancelled.');
    }
}
