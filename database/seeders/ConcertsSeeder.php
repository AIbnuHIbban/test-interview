<?php

namespace Database\Seeders;

use App\Models\Concerts;
use App\Models\TicketTypes;
use Illuminate\Database\Seeder;

class ConcertsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $concerts = [
            [
                'name' => 'DIGILAND 2023',
                'date' => '2023-12-01',
                'time_start' => '19:00:00',
                'time_end' => '22:00:00',
                'venue' => 'Digiland 2023',
                'thumbnail' => 'https://s3-ap-southeast-1.amazonaws.com/loket-production-sg/images/banner/20230704120118.jpeg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut metus mollis, iaculis purus a, congue magna. Cras varius vehicula orci, eu fermentum ante.',
                'created_at' => now()
            ],
            [
                'name' => 'Ghostival by MoT',
                'date' => '2023-12-10',
                'time_start' => '18:00:00',
                'time_end' => '22:00:00',
                'venue' => 'Stadium B',
                'thumbnail' => 'https://s3-ap-southeast-1.amazonaws.com/loket-production-sg/images/banner/20230531034629.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut metus mollis, iaculis purus a, congue magna. Cras varius vehicula orci, eu fermentum ante.',
                'created_at' => now()
            ],
            [
                'name' => 'Bebaskan Energimu Konser - Sidoarjo',
                'date' => '2023-12-20',
                'time_start' => '20:00:00',
                'time_end' => '23:00:00',
                'venue' => 'Stadium C',
                'thumbnail' => 'https://s3-ap-southeast-1.amazonaws.com/loket-production-sg/images/banner/20230614121204.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut metus mollis, iaculis purus a, congue magna. Cras varius vehicula orci, eu fermentum ante.',
                'created_at' => now()
            ],
            [
                'name' => 'DEWA 19 Live In Concert - Bengkel Space',
                'date' => '2023-12-25',
                'time_start' => '21:00:00',
                'time_end' => '01:00:00',
                'venue' => 'Stadium D',
                'thumbnail' => 'https://s3-ap-southeast-1.amazonaws.com/loket-production-sg/images/banner/20230611113342.jpg',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis ut metus mollis, iaculis purus a, congue magna. Cras varius vehicula orci, eu fermentum ante.',
                'created_at' => now()
            ]
        ];

        foreach ($concerts as $concertData) {
            $concert = Concerts::create($concertData);

            for ($i = 'A'; $i < 'C'; $i++) {
                TicketTypes::create([
                    'name' => 'Ticket Type ' . ($i++),
                    'price' => random_int(50000, 150000),
                    'concerts_id' => $concert->id,
                    'created_at' => now(),
                ]);

                TicketTypes::create([
                    'name' => 'Ticket Type ' . ($i++),
                    'price' => random_int(150000, 1000000),
                    'concerts_id' => $concert->id,
                    'created_at' => now(),
                ]);
            }
        }
    }
}
