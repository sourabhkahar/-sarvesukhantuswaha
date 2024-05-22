<?php

namespace App\Livewire\Forms;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Taxonomy;
use RamonRietdijk\LivewireTables\Livewire\LivewireTable;

class TaxonomyForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): void
    {
        $taxonomy = new Taxonomy();
        $taxonomy->title = $this->title;
        $taxonomy->save();
        $this->title = '';
    }
}
