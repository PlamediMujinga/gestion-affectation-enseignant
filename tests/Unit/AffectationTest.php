<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Ecole;
use App\Models\Enseignant;
use App\Services\AffectationService;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AffectationTest extends TestCase
{
    use RefreshDatabase;

    protected $affectationService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->affectationService = app(AffectationService::class);
    }

    /** @test */
    public function on_peut_affecter_un_enseignant_a_une_ecole()
    {
        $enseignant = Enseignant::factory()->create([
            'ecole_id' => null
        ]);

        $ecole = Ecole::factory()->create();

        $affectation = $this->affectationService->affecterEnseignant([
            'enseignant_id' => $enseignant->id,
            'ecole_id' => $ecole->id,
            'type' => 'affectation'
        ], 1);

        $this->assertNotNull($affectation);
        $this->assertEquals($ecole->id, $enseignant->fresh()->ecole_id);
    }

    /** @test */
    public function un_enseignant_deja_affecte_ne_peut_pas_etre_reaffecte()
{
    $ecole = \App\Models\Ecole::factory()->create();

    $enseignant = \App\Models\Enseignant::factory()->create([
        'ecole_id' => $ecole->id
    ]);

    $this->expectException(\Exception::class);

    $this->affectationService->affecterEnseignant([
        'enseignant_id' => $enseignant->id,
        'ecole_id' => \App\Models\Ecole::factory()->create()->id,
        'type' => 'affectation'
    ], 1);
}

    /** @test */
    public function une_affectation_met_a_jour_l_ecole_de_l_enseignant()
    {
        $enseignant = Enseignant::factory()->create([
            'ecole_id' => null
        ]);

        $ecole = Ecole::factory()->create();

        $this->affectationService->affecterEnseignant([
            'enseignant_id' => $enseignant->id,
            'ecole_id' => $ecole->id,
            'type' => 'affectation'
        ], 1);

        $this->assertEquals($ecole->id, $enseignant->fresh()->ecole_id);
    }
}