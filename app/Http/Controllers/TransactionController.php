<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transactions\AddToChartRequest;
use App\Http\Requests\Transactions\StoreTransactionRequest;
use App\Http\Requests\Transactions\UpdateTransactionRequest;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionDetails = TransactionDetail::with('product')
            ->whereNotNull('transaction_id')
            ->latest()
            ->paginate(10);
        return view('pages.transactions.index', [
            'transactionDetails' => $transactionDetails,
        ]);
    }

    public function search(Request $request)
    {
        $transactionDetails = TransactionDetail::with('product')
            ->whereNotNull('transaction_id')
            ->whereBetween('created_at', [$request->start_date, $request->end_date])
            ->latest()
            ->paginate(10);
        return view('pages.transactions.index', [
            'transactionDetails' => $transactionDetails,
        ]);
    }

    public function addToChart(AddToChartRequest $request)
    {
        $filter = $request->validated();
        $product = Product::where('code', $filter['code'])->first();

        TransactionDetail::create([
            'product_id' => $product->id,
            'quantity' => $filter['product_quantity'],
            'price' => $product->price * $filter['product_quantity'],
            'created_by_id' => auth()->id(),
        ]);

        return redirect()->route('transactions.create');
    }

    public function removeFromChart(TransactionDetail $transactionDetail)
    {
        $transactionDetail->delete();

        return redirect()->route('transactions.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $transactionDetails = TransactionDetail::with('product')
            ->whereNull('transaction_id')
            ->where('created_by_id', auth()->id())
            ->latest()
            ->paginate(10);

        $total = $transactionDetails->sum('price');

        return view('pages.transactions.create', [
            'transactionDetails' => $transactionDetails,
            'total' => $total,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request)
    {
        $data = $request->validated();
        $transaction = Transaction::create([
            'quantity' => $data['quantity'],
            'total_price' => $data['total_price'],
            'paid' => $data['paid'],
            'change' => $data['change'],
            'created_by_id' => auth()->id(),
        ]);

        TransactionDetail::whereNull('transaction_id')
            ->where('created_by_id', auth()->id())
            ->update([
                'transaction_id' => $transaction->id,
            ]);

        $pdf = PDF::loadView('pages.transactions.struk', [
            'transaction' => $transaction
        ]);

        return $pdf->download('struk-' . $transaction->id . '.pdf')->header('Location', route('transactions.index'));
    }

    public function print(Transaction $transaction)
    {
        $pdf = PDF::loadView('pdf.barang', [
            'transaction' => $transaction,
        ]);

        return $pdf->stream('transaction-' . $transaction->id . '.pdf');
    }
}
