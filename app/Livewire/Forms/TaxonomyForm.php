<?php

namespace App\Livewire\Forms;
use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\Taxonomy;
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

    public function edit($id): void
    {
        $taxonomy = Taxonomy::find($id);
        $taxonomy->title = $this->title;
        $taxonomy->save();
        $this->title = '';
    }

    public function resetForm(){
        $this->reset();
    }
}
