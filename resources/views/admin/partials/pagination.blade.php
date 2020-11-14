<?php
// config
$link_limit = 10; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>
@if ($paginator->lastPage() > 1)
    <nav id="stickyblock-end" class="text-center" aria-label="Page Navigation">
        <ul class="list-inline">
            <li class="list-inline-item float-left g-hidden-xs-down {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                <a class="u-pagination-v1__item u-pagination-v1-4 g-brd-gray-light-v3 g-brd-primary--hover g-rounded-50 g-pa-7-16"
                   href="{{ $paginator->url(1) }}" aria-label="Previous">
                    <span aria-hidden="true">
                      <i class="fa fa-angle-left g-mr-5"></i> Previous
                    </span>
                    <span class="sr-only">Previous</span>
                </a>
            </li>
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <?php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links) {
                    $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
                ?>
                @if ($from < $i && $i < $to)
                    <li class="list-inline-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                        <a class="u-pagination-v1__item u-pagination-v1-4 u-pagination-v1-4--active g-rounded-50 g-pa-7-14"
                           href="{{ $paginator->url($i) }}">{{$i}}</a>
                    </li>
                @endif
            @endfor
            <li class="list-inline-item float-right g-hidden-xs-down {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                <a class="u-pagination-v1__item u-pagination-v1-4 g-brd-gray-light-v3 g-brd-primary--hover g-rounded-50 g-pa-7-16"
                   href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-label="Next">
                    <span aria-hidden="true">
                      Next <i class="fa fa-angle-right g-ml-5"></i>
                    </span>
                    <span class="sr-only">Next</span>
                </a>
            </li>
        </ul>
    </nav>
@endif