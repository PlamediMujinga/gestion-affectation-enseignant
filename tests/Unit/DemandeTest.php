<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ecole;
use App\Models\Enseignant;
use App\Services\DemandeService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DemandeTest extends TestCase
{
    use RefreshDatabase;

    protected $demandeService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->demandeService = app(DemandeService::class);
    }

    /** @test */
    public function une_ecole_peut_creer_une_demande()
    {
        $ecole = Ecole::factory()->create();

        $demande = $this->demandeService->creerDemandeEcole($ecole, [
            'type_demande' => 'manque_enseignant',
            'specialite' => 'Math',
            'nombre' => 2,
            'description' => 'Besoin urgent'
        ]);

        $this->assertNotNull($demande);
        $this->assertEquals('ecole', $demande->emetteur_type);
    }

    /** @test */
    public function un_enseignant_peut_creer_une_demande()
    {
        $enseignant = Enseignant::factory()->create();

        $demande = $this->demandeService->creerDemandeEnseignant($enseignant, [
            'type_demande' => 'demande_transfert',
            'description' => 'Mutation souhaitée'
        ]);

        $this->assertNotNull($demande);
        $this->assertEquals('enseignant', $demande->emetteur_type);
    }

    /** @test */
    public function une_demande_est_en_attente_par_defaut()
    {
        $ecole = Ecole::factory()->create();

        $demande = $this->demandeService->creerDemandeEcole($ecole, [
            'type_demande' => 'manque_enseignant'
        ]);

        $this->assertEquals('en_attente', $demande->statut);
    }

    /** @test */
    public function on_peut_traiter_une_demande()
    {
        $ecole = Ecole::factory()->create();

        $demande = $this->demandeService->creerDemandeEcole($ecole, [
            'type_demande' => 'manque_enseignant'
        ]);

        $this->demandeService->traiterDemande($demande->id, 'validee');

        $this->assertEquals('validee', $demande->fresh()->statut);
    }
}