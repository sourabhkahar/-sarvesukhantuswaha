<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use App\Models\HtmlBlock;

class HtmlBlockForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
    #[Validate('required|string')]
    public string $blockname = '';
    #[Validate('required')]
    public $pageId = '';
    public $status;

    /**
     * Attempt to authenticate the request's credentials.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(): void
    {
        $Ordno = HtmlBlock::where(['pagecode'=> $this->pageId,
        'taxonmycode'=>1])->max('ordno');
        $Ordno = empty($Ordno)? 1 : ++$Ordno;

        $htmlBlock = new HtmlBlock();
        $htmlBlock->blockname = $this->title;
        $htmlBlock->htmlblock = $this->blockname;
        $htmlBlock->pagecode = $this->pageId;
        $htmlBlock->categorycode = 0;
        $htmlBlock->taxonmycode = 1;
        $htmlBlock->status = 'Y';
        $htmlBlock->ordno = $Ordno;
        $htmlBlock->save();
        $this->title = '';
        $this->blockname = '';
    }

    public function edit($id): void
    {
        $htmlBlock = HtmlBlock::find($id);
        $htmlBlock->blockname = $this->title;
        $htmlBlock->htmlblock = $this->blockname;
        $htmlBlock->save();
        $this->title = '';
        $this->blockname = '';
    }

    public function resetForm(){
        $this->reset();
    }

    public function updateStatus($id){
        $htmlBlock = HtmlBlock::find($id);
        $htmlBlock->status = $htmlBlock->status == 'Y'?'N':'Y';
        $htmlBlock->save();
    }
}
