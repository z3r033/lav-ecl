@if ($paginator->lastPage() > 1)
    <ul class="pagination">
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url(1) }}">Previous</a>
        </li>
        @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->currentPage() + 2, $paginator->lastPage()); $i++)
            <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a href="{{ $paginator->url($paginator->currentPage()+1) }}">Next</a>
        </li>
    </ul>
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination li {
            list-style: none;
            margin-right: 5px;
        }

        .pagination a {
            display: block;
            padding: 5px 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            color: #333;
            text-decoration: none;
        }

        .pagination a:hover {
            background-color: #f9f9f9;
        }

        .pagination .active a {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }

        .pagination .disabled a {
            background-color: #eee;
            border-color: #eee;
            color: #aaa;
            cursor: not-allowed;
        }
    </style>
@endif
