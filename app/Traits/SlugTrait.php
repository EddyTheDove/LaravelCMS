<?php
namespace App\Traits;

use DB;

trait SlugTrait
{
    /**
     * Get unique slug
     * @param  String $slug  The url to be made unique
     * @param  String $table The table to check in
     * @return String $slug  The unique url 
     */
    public function getUniqueSlug($slug, $table)
    {
        $exists = DB::table($table)
        ->where('slug', '=', $slug)
        ->first();

        if ( $exists ) {
            $i = 1;
            $isDuplicate = true;

            while ( $isDuplicate ) {
                if ( $i == 1) {
                    $slug = $slug. '-1';
                } else {
                    $n = $i > 10 ? 2 : 1; //how many digits to replace
                    $slug = substr($slug, -$n) . $i;
                }

                $stillExists = DB::table($table)
                ->where('slug', '=', $slug)
                ->first();

                if ( !$stillExists ) {
                    $isDuplicate = false;
                }

                $i++;
            }

        }

        return $slug;
    }
}
