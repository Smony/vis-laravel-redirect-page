<?php

namespace Smony\LaravelRedirectPage;

use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    protected $table = 'vis_redirects';

    protected $fillable = [
        'title',
        'old_url',
        'new_url',
        'status',
    ];

    /**
     * @param $path
     * @return mixed
     */
    public function findRedirectPage($path)
    {
        return $this->where('old_url', $path === '/' ? $path : trim($path, '/'))
            ->whereNotNull('new_url')
            ->whereIn('status', $this->getCodeKeys())
            ->whereIsActive(1)
            ->first();
    }

    /**
     * @return array
     */
    protected function getCodeKeys(): array
    {
        $codes = config('vis-redirect-page.redirect_codes', []);

        return array_keys((array)$codes);
    }
}
