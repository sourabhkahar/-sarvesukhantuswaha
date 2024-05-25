<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\HtmlBlock;

class HtmlSubBlockForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
    #[Validate('required|string')]
    public string $blockname = '';
    #[Validate('required')]
    public $pageId = '';
    #[Validate('required')]
    public $taxonomy = '';
    public $status;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): void
    {
        $Ordno = HtmlBlock::where('categorycode',$this->pageId,)->where('taxonmycode',$this->taxonomy)->max('ordno');
        $Ordno = empty($Ordno)? 1 : ++$Ordno;

        $htmlBlock = new HtmlBlock();
        $htmlBlock->blockname = $this->title;
        $htmlBlock->htmlblock = $this->blockname;
        $htmlBlock->pagecode = $this->pageId;
        $htmlBlock->categorycode = $this->pageId;
        $htmlBlock->taxonmycode = $this->taxonomy;
        $htmlBlock->status = 'Y';
        $htmlBlock->ordno = $Ordno;
        $htmlBlock->save();
        $this->title = '';
        $this->blockname = '';
        $this->taxonomy = '';
    }

    public function edit($id): void
    {
        $htmlBlock = HtmlBlock::find($id);
        $htmlBlock->blockname = $this->title;
        $htmlBlock->htmlblock = $this->blockname;
        $htmlBlock->taxonmycode = $this->taxonomy;
        $htmlBlock->save();
        $this->title = '';
        $this->blockname = '';
        $this->taxonomy = '';
    }

    public function resetForm()
    {
        $this->reset();
    }

    public function updateStatus($id)
    {
        $htmlBlock = HtmlBlock::find($id);
        $htmlBlock->status = $htmlBlock->status == 'Y' ? 'N' : 'Y';
        $htmlBlock->save();
    }
}
