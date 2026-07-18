<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medecin;

class MedecinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medecins = [
            ['nom' => 'Dr ORIOL Ramos', 'specialite' => 'ORL'],
            ['nom' => 'Dr ABENG Minouche', 'specialite' => 'Généraliste'],
            ['nom' => 'Dr BELLA SAFIOU Nouratou A', 'specialite' => 'Dermatologue'],
            ['nom' => 'Dr BOUSSENGUE NZE Thibau Dan Chantrel', 'specialite' => 'Généraliste'],
            ['nom' => 'Dr CAMARA Ibrahima', 'specialite' => 'Neurologue'],
            ['nom' => 'Dr DIDJA Dorca', 'specialite' => 'Généraliste'],
            ['nom' => 'Dr ENGONE N\'NAH Edouard', 'specialite' => 'Pédiatre'],
            ['nom' => 'Dr EYOUGA Elie', 'specialite' => 'Généraliste'],
            ['nom' => 'Dr HOUNKPATIN NGOMBA Ngoussi Brunette', 'specialite' => 'Gynécologue'],
            ['nom' => 'Dr JEPANG Alain', 'specialite' => 'Généraliste'],
            ['nom' => 'Dr KAINE Jean Luc', 'specialite' => 'Anesthésiste Réanimateur'],
            ['nom' => 'Dr KONE Issa', 'specialite' => 'Gynécologue'],
            ['nom' => 'Dr KWETE Alain', 'specialite' => 'Pédiatre'],
            ['nom' => 'Dr LEMBOUMBA L\'OKINDA Jean Pierre', 'specialite' => 'Radiologue'],
            ['nom' => 'Dr MABANDA Christie', 'specialite' => 'Radiologue'],
            ['nom' => 'Dr MBA ELLA Martial', 'specialite' => 'Radiologue'],
            ['nom' => 'Dr MBA NDONG Norbert', 'specialite' => 'Chirurgien'],
            ['nom' => 'Dr MBOUNGOU Rebecca', 'specialite' => 'Généraliste'],
            ['nom' => 'Dr MIKALA MOUSTINGA Henriette', 'specialite' => 'Pédiatre'],
            ['nom' => 'Dr MISSANDA Joel', 'specialite' => 'Gastroentérologue'],
            ['nom' => 'Dr NGOUABE Herbert', 'specialite' => 'Chirurgien orthopediste'],
            ['nom' => 'Dr NZAMBA Ghislain', 'specialite' => 'Urologue'],
            ['nom' => 'Dr OBONE NZE Pélagie', 'specialite' => 'Gynécologue'],
            ['nom' => 'Dr OGNAGNA Arlette', 'specialite' => 'Pédiatre'],
            ['nom' => 'Dr PAMBO MOUMBA Yolène Treycia', 'specialite' => 'Endocrinologue'],
            ['nom' => 'Dr PEUWO ZEFACK Alain P', 'specialite' => 'Gynécologue'],
            ['nom' => 'Dr SONON Aurèle', 'specialite' => 'Gynécologue'],
            ['nom' => 'Dr SOULEIMAN', 'specialite' => 'Ophtalmologue'],
            ['nom' => 'Dr TARHINI Ali', 'specialite' => 'Chirurgien'],
        ];

        foreach ($medecins as $medecin) {
            Medecin::create([
                'nom'        => $medecin['nom'],
                'specialite' => $medecin['specialite'],
                'actif'      => true,
            ]);
        }
    }
}