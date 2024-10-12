<?php

namespace App\Http\Middleware;

use App\Models\Billboard;
use App\Models\Room;
use App\Models\Seat;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SeatSaleAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $billboard = Billboard::find($request->billboard_id);
        foreach($request->seat_id as $seat){
            $seatId = Seat::find($seat);
            if($seatId->room_id !== $billboard->room_id){
                return new JsonResponse(['The chair does '.$seatId->id.' not belong in the room']);
            }
        
        }

        return $next($request);
    }
}
