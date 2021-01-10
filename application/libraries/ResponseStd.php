<?php


/**
 * Class ResponseStd.
 *
 * @author Odenktools Technology
 * @license MIT
 * @copyright (c) 2020, Odenktools Technology.
 *
 * @package App\Libraries
 */
class ResponseStd
{
    /**
     * @param $items
     * @param string $messages
     * @param string $method
     * @return array
     */
    public static function ok($items, $messages = 'Success')
    {
        $return = [];
        $return['meta']['code'] = 200;
        $return['meta']['message'] = $messages;

        if ($items instanceof \Illuminate\Database\Eloquent\Model) {
            $return['pageinfo'] = self::emptyPageInfo();
        } elseif (is_array($items)) {
            $return['page_info'] = self::arrayPageInfo($items);
        } else {
            $return['page_info'] = self::emptyPageInfo();
        }
        $return['errors'] = [];
        $return['data']['item'] = (object)[];
        if ($items instanceof \Illuminate\Database\Eloquent\Model) {
            $return['data']['items'] = [new \Illuminate\Database\Eloquent\Collection($items)];
        } elseif (is_array($items)) {
            $return['data']['items'] = $items;
        } else {
            $return['data']['items'] = [$items];
        }

        return $return;
    }

    /**
     * @param array $items
     * @param string $messages
     * @param string $method
     * @return array
     */
    public static function okNoOutput($messages = 'Success')
    {
        $return = [];
        $return['meta']['code'] = 200;
        $return['meta']['message'] = $messages;
        $return['page_info'] = self::emptyPageInfo();
        $return['errors'] = [];
        $return['data']['item'] = (object)[];
        $return['data']['items'] = [];

        return $return;
    }

    /**
     * @param array $items
     * @param string $messages
     * @param string $method
     * @return array
     */
    public static function okSingle($item, $messages = 'Success')
    {
        $return = [];
        $return['meta']['code'] = 200;
        $return['meta']['message'] = $messages;
        $return['page_info'] = self::emptyPageInfo();
        $return['errors'] = [];
        $return['data']['item'] = $item;
        $return['data']['items'] = [];

        return $return;
    }

    /**
     * Jika "last_page > 1" di android harus paging.
     *
     * @param \Illuminate\Pagination\Paginator $paged
     * @param int $countAll
     * @param int $code
     * @return array
     */
    public static function paginated(\Illuminate\Contracts\Pagination\Paginator $paged, int $countAll, int $code = 200)
    {
        $return = [];
        $return['meta']['code'] = $code;
        $return['meta']['message'] = 'Success';
        $return['page_info'] = (object)[
            'total' => $paged->total(),
            'per_page' => $paged->perPage(),
            'current_page' => $paged->currentPage(),
            'last_page' => $paged->lastPage(),
            'next_page_url' => $paged->nextPageUrl(),
            'prev_page_url' => $paged->previousPageUrl(),
            'from' => $paged->firstItem(),
            'count' => $countAll,
            'to' => $paged->lastItem(),
            'pagination' => true,
        ];
        $return['errors'] = [];
        $return['data']['item'] = (object)[];
        $return['data']['items'] = $paged->items();

        return $return;
    }

    public static function pagedFrom($items, \Illuminate\Pagination\Paginator $paged, int $countAll, int $code = 200)
    {
        $return = [];
        $return['meta']['code'] = $code;
        $return['meta']['message'] = 'Success';
        $return['page_info'] = (object)[
            'total' => $paged->total(),
            'per_page' => $paged->perPage(),
            'current_page' => $paged->currentPage(),
            'last_page' => $paged->lastPage(),
            'next_page_url' => $paged->nextPageUrl(),
            'prev_page_url' => $paged->previousPageUrl(),
            'from' => $paged->firstItem(),
            'count' => $countAll,
            'to' => $paged->lastItem(),
            'pagination' => true,
        ];
        $return['errors'] = [];
        $return['data']['item'] = (object)[];
        if (is_array($items)) {
            $return['data']['items'] = $items;
        } elseif (is_object($items)) {
            $return['data']['items'] = (object)($items);
        } else {
            $return['data']['items'] = $items;
        }

        return $return;
    }

    /**
     * Create empty response.
     *
     * @return object
     */
    public static function emptyPageInfo()
    {
        $pageInfo = (object)[
            'total' => -1,
            'per_page' => -1,
            'current_page' => -1,
            'last_page' => -1,
            'next_page_url' => null,
            'prev_page_url' => null,
            'from' => -1,
            'to' => -1,
            'pagination' => false,
        ];

        return $pageInfo;
    }

    /**
     * Jika "total <= per_page" di android tidak perlu paging.
     *
     * @param array $item
     * @return object
     */
    private static function arrayPageInfo(array $item)
    {
        $total = count($item);
        $pageInfo = (object)[
            'total' => $total,
            'per_page' => $total,
            'current_page' => 1,
            'last_page' => 1,
            'next_page_url' => null,
            'prev_page_url' => null,
            'from' => 1,
            'to' => $total,
            'pagination' => false,
        ];

        return $pageInfo;
    }

    /**
     * @param $errors
     * @param int $code
     * @param string $messages
     * @return array
     */
    public static function fail($errors, $code = 400, $messages = 'Error')
    {
        $return = [];
        $return['meta']['code'] = $code;
        $return['meta']['message'] = $messages;
        $return['page_info'] = self::emptyPageInfo();
        if (is_array($errors)) {
            $return['meta']['errors'] = $errors;
        } else {
            $errors = [
                ['errors' => $errors],
            ];
            $return['meta']['errors'] = [$errors];
        }
        $return['data']['items'] = [];
        $return['data']['item'] = (object)[];

        return $return;
    }
}
