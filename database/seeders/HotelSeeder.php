<?php

namespace Database\Seeders;

use App\Models\Concept;
use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Database\Seeder;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hotel1 = Hotel::create([
            'name'        => 'May Thermal Resort Spa',
            'district_id' => 1
        ]);

        $room1 = Room::create([
            'hotel_id' => $hotel1->id,
            'name'     => 'Deluxe Oda'
        ]);

        Concept::create([
            'hotel_id'      => $hotel1->id,
            'room_id'       => $room1->id,
            'price'         => 500.10,
            'name'          => 'Sadece Oda',
            'open_for_sale' => '1'
        ]);

        Concept::create([
            'hotel_id'      => $hotel1->id,
            'room_id'       => $room1->id,
            'price'         => 600.50,
            'name'          => 'Oda Kahvaltı',
            'open_for_sale' => '0'
        ]);

        Concept::create([
            'hotel_id'      => $hotel1->id,
            'room_id'       => $room1->id,
            'price'         => 700,
            'name'          => 'Yarım Pansiyon',
            'open_for_sale' => '1'
        ]);

        Concept::create([
            'hotel_id'      => $hotel1->id,
            'room_id'       => $room1->id,
            'price'         => 800,
            'name'          => 'Tam Pansiyon',
            'open_for_sale' => '1'
        ]);

        $room2 = Room::create([
            'hotel_id' => $hotel1->id,
            'name'     => 'Superior Oda'
        ]);

        Concept::create([
            'hotel_id'      => $hotel1->id,
            'room_id'       => $room2->id,
            'price'         => 700,
            'name'          => 'Oda Kahvaltı',
            'open_for_sale' => '1'
        ]);

        Concept::create([
            'hotel_id'      => $hotel1->id,
            'room_id'       => $room2->id,
            'price'         => 800,
            'name'          => 'Tam Pansiyon',
            'open_for_sale' => '1'
        ]);

        Room::create([
            'hotel_id' => $hotel1->id,
            'name'     => 'Family Oda'
        ]);

        $hotel2 = Hotel::create([
            'name'        => 'Susesi Luxury Resort',
            'district_id' => 2
        ]);

        $room4 = Room::create([
            'hotel_id' => $hotel2->id,
            'name'     => 'Deluxe Oda Kara Manzara'
        ]);

        Concept::create([
            'hotel_id'      => $hotel2->id,
            'room_id'       => $room4->id,
            'price'         => 100,
            'name'          => 'Sadece Oda',
            'open_for_sale' => '1'
        ]);

        $room5 = Room::create([
            'hotel_id' => $hotel2->id,
            'name'     => 'Deluxe Oda Deniz Manzara'
        ]);

        Concept::create([
            'hotel_id'      => $hotel2->id,
            'room_id'       => $room5->id,
            'price'         => 200,
            'name'          => 'Tam Pansiyon',
            'open_for_sale' => '1'
        ]);


        $room6 = Room::create([
            'hotel_id' => $hotel2->id,
            'name'     => 'Klasik Oda Şehir Manzaralı'
        ]);

        Concept::create([
            'hotel_id'      => $hotel2->id,
            'room_id'       => $room6->id,
            'price'         => 5000,
            'name'          => 'Herşey Dahil',
            'open_for_sale' => '1'
        ]);

        $hotel3 = Hotel::create([
            'name'        => 'Swissotel Büyük Efes İzmir',
            'district_id' => 3
        ]);

        $room7 = Room::create([
            'hotel_id' => $hotel3->id,
            'name'     => 'Şehir Manzaralı Oda'
        ]);

        Concept::create([
            'hotel_id'      => $hotel3->id,
            'room_id'       => $room7->id,
            'price'         => 1500,
            'name'          => 'Tam Pansiyon Plus',
            'open_for_sale' => '1'
        ]);
    }
}
