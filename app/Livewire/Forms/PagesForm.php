<?php

namespace App\Livewire\Forms;

use App\Models\Page;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PagesForm extends Form
{
    #[Validate('required|string')]
    public string $title = '';
    #[Validate('required')]
    public string $taxonnomyCode = '';

    public function store(): void
    {

        $Pages = Page::where('pagename', $this->title)->get();
        $MaxPageCode = Page::where('id','<', '1000')->max('id');

        if(count($Pages)>0)
            {
                    $i=1;
                    $Duplicate_Page = $this->title;
                   while(1)
                   {
                     $CheckDuplicaterec = Page::where('pagename',  $Duplicate_Page.$i)->first();
                     if(!$CheckDuplicaterec)
                     {
                        $PageName = $Duplicate_Page.$i;
                        break;
                     }
                     $i++;
                   }
            }
            else
            {
                
                $PageName = $this->title;
               
            }
          
        
        Page::create([
            'id' => ++$MaxPageCode,
            'pagename' => $PageName,
            'categoryCode' => 0,
            'title' => ($PageName),
            'taxonomycode' => $this->taxonnomyCode,
            'status'    => 'Y'
        ]);
       
        $this->title = '';
        $this->taxonnomyCode = '';
    }

    public function edit($id): void
    {  
        Page::where('id', $id)->update(['pagename' =>$this->title,'taxonomycode' => $this->taxonnomyCode]);
        $this->reset();
    }

    public function resetForm(){
        $this->reset();
    }
}
