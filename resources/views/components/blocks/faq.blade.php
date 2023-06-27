<x-blocks.layout title="FAQ"
                 :$block
                 :inputs="[
    ['type'=>'image','label'=>'Image'],
    ['type'=>'input','label'=>'Image Alt'],
    ['type'=>'input','label'=>'Title'],
    ['type'=>'input','label'=>'Span'],

]"
   :subBlocks="[
                ['type'=>'input','label'=>'Question'],
                ['type'=>'text','label'=>'Answer'],
   ]"
   :sub="$sub"
></x-blocks.layout>