<?php
declare(strict_types=1);
namespace Airship\Cabin\Bridge\Filter\Blog;

use Airship\Engine\Security\Filter\{
    ArrayFilter,
    IntFilter,
    InputFilterContainer,
    StringFilter,
    WhiteList
};

/**
 * Class NewSeriesFilter
 * @package Airship\Cabin\Bridge\Filter\Account
 */
class NewSeriesFilter extends InputFilterContainer
{
    /**
     * NewSeriesFilter constructor.
     */
    public function __construct()
    {
        $this
            ->addFilter(
                'name',
                (new StringFilter())
                    ->addCallback([StringFilter::class, 'nonEmpty'])
            )
            ->addFilter('author', new IntFilter())
            ->addFilter('preamble', new StringFilter())
            ->addFilter('format',
                (new WhiteList(
                    'HTML',
                    'Markdown',
                    'Rich Text',
                    'RST'
                ))->setDefault('Rich Text')
            )
            ->addFilter('config', new ArrayFilter())
            ->addFilter('items', new StringFilter());
    }
}
