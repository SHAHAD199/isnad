<?php 


namespace App\Helpers;


class MergeBlocks 
{
    public static function merge($request)
    {
         return array_merge($request->all(), [
             'title'  =>
             ($request->section_id == 1) ? 'm'.$request->block_number.'-'.$request->number 
             : (($request->section_id == 2) ? 'A'. $request->block_number.'-'.$request->number
             : (($request->section_id == 3) ? 'Q' . $request->block_number.'-'.$request->number
             :  'J' . $request->block_number.'-'.$request->number         
            )),
           'block' => 
            ($request->section_id == 1) ? 'm'.$request->block_number 
            : (($request->section_id == 2) ? 'A'. $request->block_number
            : (($request->section_id == 3) ? 'Q' . $request->block_number
            :  'J' . $request->block_number      
            )),                          
        ]);
    }


    public static function mergeUpdate($request, $block)
    {
        return array_merge($request->all(), [
            'title'  => ($request->number) ? 'block'.$request->number.'_section'.$block->section_id 
           : (($request->section_id) ? '_section'.$request->section_id .'block'.$block->number
           :  (($request->section_id && $request->number) ? '_section'.$request->section_id . 'block'.$request->number
           : '_section'.$block->section_id . 'block'.$block->number))
             
       ]);
    }
}