<?php

namespace App\Contracts;

interface DemandeRepositoryInterface
{
    public function create(array $data);
    public function findById($id);
    public function getPending();
    public function updateStatus($id, $status);
    public function getById($id, $type);
    public function getCount($id, $type);
    public function getLast($id, $type, $nb);
}