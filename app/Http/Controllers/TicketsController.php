<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Tickets;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TicketsController extends Controller
{
    public function generateTicketCode() {
        $dateTimeNow = Carbon::now();
        $time = $dateTimeNow->format('His');
        $randomString = strtoupper(Str::random(2));

        $ticketCode = 'TCKT-' .$time . '-' . $randomString;

        return $ticketCode;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'ticket_type_id' => 'required|exists:ticket_types,id',
            'concert_id' => 'required|exists:concerts,id',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $customers = New Customers();
        $customers->name = $request->name;
        $customers->email = $request->email;
        $customers->phone = $request->phone;
        $customers->save();

        $ticket = new Tickets();
        $ticket->ticket_code = $this->generateTicketCode();
        $ticket->customers_id = $customers->id;
        $ticket->concerts_id = $request->concert_id;
        $ticket->ticket_types_id = $request->ticket_type_id;
        $ticket->save();


        return response()->json(['message' => 'Ticket successfully booked', 'ticket_code' => $ticket->ticket_code], 201);
    }

    public function checkin($code){
        Tickets::where('ticket_code', $code)->update([
            'status' => 'checked-in',
            'check_in_at'  => now()
        ]);

        return redirect()->back();
    }
}
