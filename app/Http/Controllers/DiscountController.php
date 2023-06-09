<?php

namespace App\Http\Controllers;

use App\Models\Concept;
use App\Models\Reservation;
use App\Models\ReservationDiscount;

class DiscountController extends Controller
{
    public function calculate()
    {
        $discounts            = [];
        $discountData         = [];
        $totalDiscount        = 0;
        $totalDiscountedTotal = 0;
        $reservations         = Reservation::with(['hotel'])->get();
        if ($reservations) {
            foreach ($reservations as $reservation) {
                if ($reservation->total_price >= 20000) {
                    $discount             = $reservation->total_price * 0.10;
                    $total                = $reservation->total_price - $discount;
                    $totalDiscount        += $discount;
                    $totalDiscountedTotal += $total;

                    ReservationDiscount::create([
                        'reservation_id'        => $reservation->id,
                        'discount_amount'       => $discount,
                        'discount_rate'         => 10,
                        'amount_after_discount' => $total
                    ]);

                    $discountData[] = [
                        'discount_reason' => '10_PERCENT_OVER_20000',
                        'discountAmount'  => $discount,
                        'subTotal'        => $total
                    ];
                }

                if ($reservation->hotel->district_id == 1 && $reservation->total_nights >= 7) {
                    ReservationDiscount::create([
                        'reservation_id' => $reservation->id,
                        'free_nights'    => 1
                    ]);

                    $discountData[] = [
                        'discount_reason' => 'BUY_7_GET_1',
                        'free_nights'     => 1
                    ];
                }

                if ($reservation->hotel->district_id == 2 && $reservation->total_nights >= 2) {
                    $cheapestConcept = Concept::where('hotel_id', $reservation->hotel->id)->orderBy('price')->first();
                    if ($cheapestConcept) {
                        $discount             = $cheapestConcept->price * 0.25;
                        $total                = $cheapestConcept->price - $discount;
                        $totalDiscount        += $discount;
                        $totalDiscountedTotal += $total;

                        ReservationDiscount::create([
                            'reservation_id'        => $reservation->id,
                            'concept_id'            => $cheapestConcept->id,
                            'discount_rate'         => 25,
                            'discount_amount'       => $discount,
                            'amount_after_discount' => $total
                        ]);

                        $discountData[] = [
                            'discount_reason' => '25_PERCENT_OVER_CHEAPEST_CONCEPT',
                            'discountAmount'  => $discount,
                            'subTotal'        => $total
                        ];
                    }
                }

                if ($reservation->hotel->district_id == 3 && $reservation->total_nights >= 4) {
                    $discount             = $reservation->total_price * 0.10;
                    $total                = $reservation->total_price - $discount;
                    $totalDiscount        += $discount;
                    $totalDiscountedTotal += $total;

                    ReservationDiscount::create([
                        'reservation_id'        => $reservation->id,
                        'discount_amount'       => $discount,
                        'discount_rate'         => 10,
                        'amount_after_discount' => $total
                    ]);

                    $discountData[] = [
                        'discount_reason' => '10_PERCENT_OVER_DISTRICT_3',
                        'discountAmount'  => $discount,
                        'subTotal'        => $total
                    ];
                }
            }

            $discounts[] = [
                'discounts'       => $discountData,
                'totalDiscount'   => $totalDiscount,
                'discountedTotal' => $totalDiscountedTotal
            ];

            return response()->json([
                'status'  => true,
                'message' => 'Discounts were calculated!',
                'data' => $discounts
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'No data has found!'
        ]);
    }
}
